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
        $hockys = factory(App\HocKy::class, 20)->create();
    }
}
