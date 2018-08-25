<?php

use Faker\Generator as Faker;

$factory->define(App\Khoa::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'desc' => $faker->paragraph,
        'lcdoans_id' => function () {
            return factory(App\LCDoan::class)->create()->id;
        },
    ];
});
