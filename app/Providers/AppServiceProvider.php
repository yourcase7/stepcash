<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\TokenRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\StepHistoryRepository;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\TokenRepositoryInterface;
use App\Repositories\StepHistoryRepositoryInterface;

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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
