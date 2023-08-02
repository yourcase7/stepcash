<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BonusRepositoryInterface;
use App\Repositories\BonusHistoryRepositoryInterface;
use App\Repositories\CoinRateRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class BonusController extends Controller
{
    protected $bonusRepository, $bonusHistoryRepository, $userRepository, $coinRateRepository;

    public function __construct(
        BonusRepositoryInterface $bonusRepository,
        BonusHistoryRepositoryInterface $bonusHistoryRepository,
        UserRepositoryInterface $userRepository,
        CoinRateRepositoryInterface $coinRateRepository,
    ) {
        $this->bonusRepository = $bonusRepository;
        $this->bonusHistoryRepository = $bonusHistoryRepository;
        $this->userRepository = $userRepository;
        $this->coinRateRepository = $coinRateRepository;
    }

    public function index()
    {
        $data = $this->bonusRepository->getAll();

        return view('bonus', compact('data'));
    }

    public function view($id)
    {
        $result = $this->bonusRepository->getById($id);

        return view('bonus-view', compact('result'));
    }

    public function submit($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();

            $ads = $this->bonusRepository->getById($id);
            $this->bonusHistoryRepository->create($ads, $user, [
                'description' => "Account IG :" . $request->ig
            ]);
            $this->userRepository->addCoin($user, $ads->reward_coin);
            $this->coinRateRepository->cutCoin(1, $ads->reward_coin);

            DB::commit();
            return redirect('/bonus')->with('success', 'Berhasil mendapatkan koin tambahan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('');
        }
        dd($request->all());
    }
}
