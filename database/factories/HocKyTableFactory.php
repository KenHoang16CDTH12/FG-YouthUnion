<?php

use Faker\Generator as Faker;

$factory->define(App\HocKy::class, function (Faker $faker) {
    return [
        'hocky' => $faker->randomElement(['I','II']),
        'namhoc_id' => factory(App\NamHoc::class)->create()->id,
    ];
});
