<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Lop::class, function ($faker) {
    return [
        'name' => $faker->company,
        'desc' => $faker->paragraph,
        'khoa_id' => factory(App\Models\Khoa::class)->create()->id,
    ];
});
