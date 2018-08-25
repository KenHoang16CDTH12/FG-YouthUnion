<?php

use Illuminate\Database\Seeder;

class LCDoanHoatDongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lcdoanhoatdongs = factory(App\LCDoanHoatDong::class, 100)->create();
    }
}
