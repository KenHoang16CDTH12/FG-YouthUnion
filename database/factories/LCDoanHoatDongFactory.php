<?php

use Faker\Generator as Faker;


$factory->define(App\LCDoanHoatDong::class, function ($faker) {
    return [
        'lcdoan_id' => factory(App\LCDoan::class)->create()->id,
        'hoatdong_id' => factory(App\HoatDong::class)->create()->id,
    ];
});
