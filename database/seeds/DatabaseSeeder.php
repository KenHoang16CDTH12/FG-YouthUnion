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
        $this->call([
            RolesTableSeeder::class,
            NamHocTableSeeder::class,
            HocKyTableSeeder::class,
            HoatDongTypesTableSeeder::class,
            HoatDongTableSeeder::class,
            LCDoansTableSeeder::class,
            KhoasTableSeeder::class,
            ClassesTableSeeder::class,
            UsersTableSeeder::class,
            UserHoatDongsSeeder::class,
            LCDoanHoatDongsTableSeeder::class,
            UserDetailsTableSeeder::class,
        ]);
    }
}
