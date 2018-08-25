<?php

use Illuminate\Database\Seeder;

class NamHocTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namhocs = factory(App\NamHoc::class, 100)->create();
    }
}
