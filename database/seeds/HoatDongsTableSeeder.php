<?php

use Illuminate\Database\Seeder;

class HoatDongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hoatdongs = factory(App\HoatDong::class, 100)->create();
    }
}
