<?php

namespace App\Providers;

use App\Repositories\ApiGitHubRepository;
use App\Repositories\Interfaces\IApiGItHubRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IApiGItHubRepository::class, ApiGitHubRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
