<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\GoogleApiService;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\TokenRepositoryInterface;
use App\Repositories\StepHistoryRepositoryInterface;
use App\Repositories\CoinActivityRepositoryInterface;

class ConvertStepsToCoin extends Command
{
    protected $signature = 'app:convert-steps-to-coin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert user steps to coin';

    protected $stepHistoryRepository,
        $tokenRepository,
        $coinActivityRepository,
        $userRepository,
        $googleApiService;

    /**
     * Execute the console command.
     */

    public function __construct(
        StepHistoryRepositoryInterface $stepHistoryRepository,
        TokenRepositoryInterface $tokenRepository,
        UserRepositoryInterface $userRepository,
        CoinActivityRepositoryInterface $coinActivityRepository,
        GoogleApiService $googleApiService,
    ) {
        parent::__construct();
        $this->stepHistoryRepository = $stepHistoryRepository;
        $this->tokenRepository = $tokenRepository;
        $this->coinActivityRepository = $coinActivityRepository;
        $this->userRepository = $userRepository;
        $this->googleApiService = $googleApiService;
    }

    public function handle()
    {
        $this->info('Starting...');

        DB::beginTransaction();
        try {
            $stepsInToday = $this->stepHistoryRepository->getAllTodayNotConvert();

            foreach ($stepsInToday as $step) {
                $user = $step->user;

                // sync data to google fit before
                $this->info('Syncing to Google Fit...');
                $this->googleApiService->syncData($user);

                // convert data to coin
                $this->info('Convert Steps to Coin...');
                $stepCanConvert = $step->steps > $step->user->level->limit_step ? $step->user->level->limit_step : $step->steps;

                $coinGet = ($stepCanConvert / 1000) * 50;

                $this->coinActivityRepository->create($user, [
                    'coin' => $coinGet,
                    'type' => 'add',
                    'description' => "Converted $stepCanConvert steps"
                ]);
                $this->info($this->userRepository->addCoin($user, $coinGet));
                $this->stepHistoryRepository->update([
                    "is_convert" => true
                ], $step->id);
            }

            $this->info('Successfully.');
            DB::commit();
        } catch (\Exception $e) {
            $this->info("ERROR");
            DB::rollback();
            sleep(5);
        }
    }
}
