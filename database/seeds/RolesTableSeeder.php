<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
          [
              'id' => 1,
              'type' => 'Admin'
          ],
          [
              'id' => 2,
              'type' => 'Editor'
          ]
        ];
        DB::table('roles')->insert($roles);
    }
}
