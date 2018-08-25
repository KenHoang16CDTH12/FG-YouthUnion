<?php

use Faker\Generator as Faker;

$factory->define(App\LCDoan::class, function (Faker $faker) {
    return [
       'name' => $faker->sentence,
       'desc' => $faker->paragraph
    ];
});
