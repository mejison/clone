<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'show_catalog',
            'display_name' => 'Show Catalog',
            'description' => ''
        ]);

    	DB::table('permissions')->insert([
            'name' => 'add_catalog',
            'display_name' => 'Add Catalog',
            'description' => ''
        ]);

        DB::table('permissions')->insert([
            'name' => 'show_analitics',
            'display_name' => 'Show Analitics',
            'description' => ''
        ]);

        DB::table('permissions')->insert([
            'name' => 'add_projects',
            'display_name' => 'Add Projects',
            'description' => ''
        ]);

        DB::table('permissions')->insert([
            'name' => 'remove_projects',
            'display_name' => 'Remove Projects',
            'description' => ''
        ]);
    }
}
