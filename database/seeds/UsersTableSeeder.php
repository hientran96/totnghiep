<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	  DB::table('users')->truncate();
        App\User::create([
        	'name' => 'Triệu Đình Huy',
        	'email' =>'huy@gmail.com',
        	'password' => bcrypt('huy123')
        	]);
        //
    }
}
