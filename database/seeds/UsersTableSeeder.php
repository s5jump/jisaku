<?php

use Illuminate\Database\Seeder;

use Cerbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')>insert([
            'name' => 'ユーザー１',
            'email' => 'user1@test.com',
            'password' => Hash::make('password'),
            'image' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
