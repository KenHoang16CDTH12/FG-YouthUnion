<?php

use Illuminate\Database\Seeder;

class HocKyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hocky = factory(App\HocKy::class, 100)->create();
    }
}
