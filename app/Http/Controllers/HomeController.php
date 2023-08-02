<?php

namespace App\Http\Controllers;

use App\Repositories\StepHistoryRepositoryInterface;
use App\Services\GoogleApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $stepHistoryRepository, $googleApiService;

    public function __construct(
        GoogleApiService $googleApiService,
        StepHistoryRepositoryInterface $stepHistoryRepository
    ) {
        $this->stepHistoryRepository = $stepHistoryRepository;
        $this->googleApiService = $googleApiService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $step = $this->stepHistoryRepository->getInToday($user->id);

        $data = [
            'steps' => $step->steps,
            'calories' => $step->calories,
            'distances' => $step->distances / 100,
            'time_spent' => $step->time_spent,
        ];

        return view('home', compact('data', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sync()
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $googleapi = $this->googleApiService;
            $syncData = $googleapi->syncData($user);

            $getStepToday = $this->stepHistoryRepository->getInToday($user->id);

            $this->stepHistoryRepository->update([
                'steps' => $syncData['steps'],
                'calories' => $syncData['calories'],
                'distances' => $syncData['distances'],
                'time_spent' => $syncData['time_spent'],
            ], $getStepToday->id);

            DB::commit();
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
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
        //
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
