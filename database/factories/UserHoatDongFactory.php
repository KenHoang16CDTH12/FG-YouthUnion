<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UserHoatDong::class, function ($faker) {
    return [
        'user_id' => factory(App\Models\User::class)->create()->id,
        'hoatdong_id' => factory(App\Models\HoatDong::class)->create()->id,
    ];
});
