<?php

namespace App\Providers;

use App\Repositories\CarsRepository;
use App\Repositories\interfaces\ICarsRepository;
use App\Repositories\interfaces\IUserRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IUserRepository::class,UserRepository::class);
        $this->app->bind(ICarsRepository::class,CarsRepository::class);
    }
}
