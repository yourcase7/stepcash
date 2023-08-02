<?php

namespace App\Http\Controllers;

use App\Notifications\ClaimRewardNotification;
use App\Repositories\CoinActivityRepositoryInterface;
use App\Repositories\RewardRepository;
use App\Repositories\RewardRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RewardsController extends Controller
{
    protected $rewardRepository, $userRepository, $coinActivityRepository;

    public function __construct(
        RewardRepositoryInterface $rewardRepository,
        UserRepositoryInterface $userRepository,
        CoinActivityRepositoryInterface $coinActivityRepository,
    ) {
        $this->rewardRepository = $rewardRepository;
        $this->userRepository = $userRepository;
        $this->coinActivityRepository = $coinActivityRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rewards = $this->rewardRepository->getAll();
        return view('rewards', compact('rewards'));
    }

    public function claim(string $id)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();
            $reward = $this->rewardRepository->getById($id);

            if ($user->coin <= $reward->coin) {
                DB::rollBack();
                return redirect()->route('rewards.index')->with('error', 'Koin tidak mencukupi');
            }

            if ($reward->stock === 0) {
                DB::rollBack();
                return redirect()->route('rewards.index')->with('error', 'Stok tidak mencukupi');
            }

            $this->userRepository->cutCoin($user, $reward->coin);
            $this->rewardRepository->update([
                'stock' => $reward->stock - 1
            ], $reward->id);
            $this->coinActivityRepository->create($user, [
                'coin' => $reward->coin,
                'type' => 'cut',
                'description' => "Penukaran koin ke hadiah " . $reward->title
            ]);

            $user->notify(new ClaimRewardNotification($reward));

            DB::commit();
            return redirect()->route('rewards.index')->with('success', 'Berhasil mengklaim hadiah, silahkan cek inbox mail anda');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
