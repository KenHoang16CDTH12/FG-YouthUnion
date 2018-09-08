<?php

use Illuminate\Database\Seeder;

class UserHoatDongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userhoatdongs = factory(App\Models\UserHoatDong::class, 20)->create();
    }
}
