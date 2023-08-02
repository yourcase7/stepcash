<?php

namespace App\Providers;

use App\Services\GoogleApiService;
use App\Repositories\UserRepository;
use App\Repositories\TokenRepository;
use App\Repositories\RewardRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\StepHistoryRepository;
use App\Repositories\CoinActivityRepository;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\TokenRepositoryInterface;
use App\Repositories\RewardRepositoryInterface;
use App\Repositories\StepHistoryRepositoryInterface;
use App\Repositories\CoinActivityRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TokenRepositoryInterface::class, TokenRepository::class);
        $this->app->bind(StepHistoryRepositoryInterface::class, StepHistoryRepository::class);
        $this->app->bind(CoinActivityRepositoryInterface::class, CoinActivityRepository::class);
        $this->app->bind(RewardRepositoryInterface::class, RewardRepository::class);

        $this->app->bind(GoogleApiService::class, function($app){
            return new GoogleApiService($app->make(TokenRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
