<?php

use Faker\Generator as Faker;

$factory->define(App\Models\LCDoan::class, function (Faker $faker) {
    return [
       'name' => $faker->jobTitle,
       'desc' => $faker->paragraph
    ];
});
