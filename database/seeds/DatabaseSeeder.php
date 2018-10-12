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
            //RolesTableSeeder::class,
            HoatDongTypesTableSeeder::class,
            HoatDongsTableSeeder::class,
            LCDoansTableSeeder::class,
            KhoasTableSeeder::class,
            LopsTableSeeder::class,
            UsersTableSeeder::class,
            UserHoatDongsTableSeeder::class,
            LCDoanHoatDongsTableSeeder::class,
            UserDetailsTableSeeder::class
        ]);
    }
}
