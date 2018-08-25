<?php

use Faker\Generator as Faker;

$factory->define(App\Lop::class, function ($faker) {
    return [
        'name' => $faker->sentence,
        'desc' => $faker->paragraph,
        'khoa_id' => factory(App\Khoa::class)->create()->id,
    ];
});
