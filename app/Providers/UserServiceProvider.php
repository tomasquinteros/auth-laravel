<?php

namespace App\Providers;

use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserServicesInterface;
use App\Repository\UserRepository;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServicesInterface::class, UserService::class);
    }

    public function boot()
    {
    }
}
