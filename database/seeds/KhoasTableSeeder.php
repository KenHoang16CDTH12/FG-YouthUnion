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
        $khoas = factory(App\Models\Khoa::class, 20)->create();
    }
}
