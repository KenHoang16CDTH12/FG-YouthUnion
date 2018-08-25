<?php

use Illuminate\Database\Seeder;

class HoatDongTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hoatdongtypes = factory(App\HoatDongType::class, 100)->create();
    }
}

