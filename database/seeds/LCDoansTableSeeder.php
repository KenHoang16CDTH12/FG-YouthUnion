<?php

use Illuminate\Database\Seeder;

class LCDoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lcdoans = factory(App\LCDoan::class, 100)->create();
    }
}
