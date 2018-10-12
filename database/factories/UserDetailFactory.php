<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UserDetail::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->name,
        'last_name' => $faker->lastname,
        'gender' => $faker->randomElement([0,1]),
        'date_of_birth' => $faker->dateTime,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'photo' => null,
        'code' => $faker->postcode,
        'user_id' => factory(App\Models\User::class)->create()->id,
        'lop_id' => factory(App\Models\Lop::class)->create()->id,
    ];
});
