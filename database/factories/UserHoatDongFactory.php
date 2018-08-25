<?php

use Faker\Generator as Faker;

$factory->define(App\UserHoatDong::class, function ($faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'hoatdong_id' => factory(App\HoatDong::class)->create()->id,
        'status' => $faker->paragraph,
    ];
});
