<?php

use Faker\Generator as Faker;

$factory->define(App\UserDetail::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->name,
        'last_name' => $faker->lastname,
        'gender' => $faker->randomElement([0,1]),
        'date_of_birth' => $faker->dateTime,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'photo' => $faker->null,
        'student_code' => $faker->postcode,
        'users_id' => factory(App\User::class)->create()->id,
    ];
});
