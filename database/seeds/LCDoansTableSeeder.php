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
        $lcdoans = factory(App\Models\LCDoan::class, 20)->create();
    }
}
