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
        $hoatdongtypes = factory(App\Models\HoatDongType::class, 20)->create();
    }
}

