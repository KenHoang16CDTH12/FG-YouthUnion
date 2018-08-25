<?php

use Faker\Generator as Faker;
use Carbon\Carbon;


$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'desc' => $faker->address,
        'from_date' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = '-1 years', $timezone = null),
        'end_date' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
        'hocky_id' => factory(App\HocKy::class)->create()->id,
        'hoatdong_type_id' => factory(App\HoatDongType::class)->create()->id,
    ];
});
