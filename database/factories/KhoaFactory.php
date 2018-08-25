<?php

use Faker\Generator as Faker;

$factory->define(App\Khoa::class, function (Faker $faker) {
    return [
        $lcdoans = App\LCDoan::pluck('id')->toArray(),
        'lcdoans_id' => $faker->randomElement($lcdoans),
        'name' => $faker->name,
        'desc' => $faker->paragraph
    ];
});
