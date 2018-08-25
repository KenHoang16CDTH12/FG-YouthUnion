<?php

use Illuminate\Database\Seeder;

class KhoasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $khoas = factory(App\Khoa::class, 100)->create();
    }
}
