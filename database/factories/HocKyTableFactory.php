<?php

use Faker\Generator as Faker;

$factory->define(App\Models\HocKy::class, function (Faker $faker) {
    return [
        'hocky' => $faker->randomElement(['I','II']),
        'namhoc_id' => factory(App\Models\NamHoc::class)->create()->id,
    ];
});
