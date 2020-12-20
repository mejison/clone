<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => ''
        ]);

        DB::table('roles')->insert([
            'name' => 'designer',
            'display_name' => 'Designer',
            'description' => ''
        ]);

    	DB::table('roles')->insert([
            'name' => 'subscriber',
            'display_name' => 'Subscriber',
            'description' => ''
        ]);
    }
}
