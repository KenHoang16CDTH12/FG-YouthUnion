<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\AuthRepository;
use App\Repositories\AuthRepositoryEloquent;
use App\Repositories\Contracts\BaseRepository;
use App\Repositories\BaseRepositoryEloquent;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\Contracts\HoatDongRepository;
use App\Repositories\HoatDongRepositoryEloquent;
use App\Repositories\Contracts\HoatDongTypeRepository;
use App\Repositories\HoatDongTypeRepositoryEloquent;
use App\Repositories\Contracts\KhoaRepository;
use App\Repositories\KhoaRepositoryEloquent;
use App\Repositories\Contracts\LCDoanHoatDongRepository;
use App\Repositories\LCDoanHoatDongRepositoryEloquent;
use App\Repositories\Contracts\LCDoanRepository;
use App\Repositories\LCDoanRepositoryEloquent;
use App\Repositories\Contracts\NotificationRepository;
use App\Repositories\NotificationRepositoryEloquent;
use App\Repositories\Contracts\RoleRepository;
use App\Repositories\RoleRepositoryEloquent;
use App\Repositories\Contracts\UserHoatDongRepository;
use App\Repositories\UserHoatDongRepositoryEloquent;

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
        $this->app->bind(BaseRepository::class, BaseRepositoryEloquent::class);
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(AuthRepository::class, AuthRepositoryEloquent::class);
        $this->app->bind(HoatDongRepository::class, HoatDongRepositoryEloquent::class);
        $this->app->bind(HoatDongTypeRepository::class, HoatDongTypeRepositoryEloquent::class);
        $this->app->bind(KhoaRepository::class, KhoaRepositoryEloquent::class);
        $this->app->bind(LCDoanHoatDongRepository::class, LCDoanHoatDongRepositoryEloquent::class);
        $this->app->bind(LCDoanRepository::class, LCDoanRepositoryEloquent::class);
        $this->app->bind(LopRepository::class,
            LopRepositoryEloquent::class);
        $this->app->bind(NotificationRepository::class,
            NotificationRepositoryEloquent::class);
        $this->app->bind(RoleRepository::class,
            RoleRepositoryEloquent::class);
        $this->app->bind(UserHoatDongRepository::class,
            UserHoatDongRepositoryEloquent::class);
    }
}
