<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\AuthRepository;
use App\Repositories\Contracts\AuthRepositoryEloquent;
use App\Repositories\Contracts\BaseRepository;
use App\Repositories\Contracts\BaseRepositoryEloquent;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\UserRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * Register any application services.
         * */
        $this->app->bind(BaseRepository::class,BaseRepositoryEloquent::class);
        $this->app->bind(UserRepository::class,UserRepositoryEloquent::class);
        $this->app->bind(AuthRepository::class,AuthRepositoryEloquent::class);
    }
}
