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
        $namhocs = factory(App\Models\NamHoc::class, 20)->create();
    }
}
