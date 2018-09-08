<?php

use Faker\Generator as Faker;

$factory->define(App\Models\HoatDongType::class, function (Faker $faker) {
    return [
        'type' => $faker->name
    ];
});
