<?php

use Faker\Generator as Faker;
use App\LCDoan;
use App\HoatDong;

$factory->define(App\LCDoanHoatDong::class, function (Faker $faker) use ($factory) {
    return [
        'lcdoan_id' => $factory->create(App\LCDoan::class)->id,
        'hoatdong_id' => $factory->create(App\HoatDong::class)->id
    ];
});
