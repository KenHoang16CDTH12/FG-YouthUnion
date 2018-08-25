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
              'type' => 'ADMIN'
          ],
          [
              'id' => 2,
              'type' => 'STUDENT'
          ],
          [
              'id' => 3,
              'type' => 'CLIENT'
          ]
        ];
        DB::table('roles')->insert($roles);
    }
}
