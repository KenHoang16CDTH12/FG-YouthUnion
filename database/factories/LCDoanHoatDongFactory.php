<?php

use Faker\Generator as Faker;


$factory->define(App\LCDoanHoatDong::class, function (Faker $faker) {
    return [
        'lcdoan_id' => function () {
            return factory(App\LCDoan::class)->create()->id;
        },
        'hoatdong_id' => function () {
            return factory(App\HoatDong::class)->create()->id;
        },
    ];
});
