<?php

use Faker\Generator as Faker;

$factory->define(App\HoatDongType::class, function (Faker $faker) {
    return [
        'type' => $faker->name
    ];
});
