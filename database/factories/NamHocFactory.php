<?php

use Faker\Generator as Faker;

$factory->define(App\Models\NamHoc::class, function (Faker $faker) {
    return [
        'nam_hoc' => $faker->year,
    ];
});
