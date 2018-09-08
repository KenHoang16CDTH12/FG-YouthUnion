<?php

use Faker\Generator as Faker;


$factory->define(App\Models\LCDoanHoatDong::class, function ($faker) {
    return [
        'lcdoan_id' => factory(App\Models\LCDoan::class)->create()->id,
        'hoatdong_id' => factory(App\Models\HoatDong::class)->create()->id,
    ];
});


