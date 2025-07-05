<?php

namespace App\Providers;

use App\Interfaces\AuthServiceInterface;
use App\Services\AuthService;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    public function boot()
    {
    }
}
