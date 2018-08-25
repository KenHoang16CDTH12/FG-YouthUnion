<?php

use Illuminate\Database\Seeder;


class LCDoanHoatDongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lcdoanhoatdongs = factory(App\LCDoanHoatDong::class, 50)->create();
    }
}
