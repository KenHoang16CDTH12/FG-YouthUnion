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
        $this->call(KhoasTableSeeder::class);
        $this->call(HocKyTableSeeder::class);
        $this->call(NamHocTableSeeder::class);
        $this->call(HocKyTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call
        (
        HoatDongsTableSeeder::class,
        HocKysTableSeeder::class,
        HoatDongTypesTableSeeder::class
        );

    }
}
