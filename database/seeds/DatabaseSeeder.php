<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HoatDongTypesTableSeeder::class);  
        $this->call(LCDoanHoatDongsTableSeeder::class);
        $this->call(LCDoansTableSeeder::class);
    }
}
