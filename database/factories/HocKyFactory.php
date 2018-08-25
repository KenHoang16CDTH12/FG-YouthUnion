<?php

use Faker\Generator as Faker;



$factory->define(App\HocKy::class, function($faker) use ($factory){
    return [
        'hocky' => $factory->
        'namhoc_id' => $factory->create(App\HocKy::class)->id, 
    ]
})
