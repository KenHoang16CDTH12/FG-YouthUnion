<?php

use Illuminate\Database\Seeder;

class LopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lops = factory(App\Models\Lop::class, 20)->create();
    }
}
