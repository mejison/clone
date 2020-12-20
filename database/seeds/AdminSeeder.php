<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::truncate();

        $user = new User;
        $user->first_name = 'Admin';
        $user->last_name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('12345678');
        $user->phone = '';
        $user->email_other = '';
        $user->comment = '';
        $user->avatar = '';
        $user->status = 'active';
        $user->save();

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);
    }
}
