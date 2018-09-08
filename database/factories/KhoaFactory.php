<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Khoa::class, function ($faker) {
    return [
        'name' => $faker->name,
        'desc' => $faker->paragraph,
        'lcdoan_id' => factory(App\Models\LCDoan::class)->create()->id,
    ];
});
