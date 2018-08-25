<?php

use Faker\Generator as Faker;

$factory->define(App\Khoa::class, function ($faker) {
    return [
        'name' => $faker->name,
        'desc' => $faker->paragraph,
        'lcdoan_id' => factory(App\LCDoan::class)->create()->id,
    ];
});
