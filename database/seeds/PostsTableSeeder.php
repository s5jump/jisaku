<?php

use Illuminate\Database\Seeder;

use Cerbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id'=>01,
            'shop_id'=>01,
            'title' => 'タイトル１',
            'review' => 3,
            'image' => '',
            'comment' => '',
            //'created_at' => Carbon::now(),
            //'updated_at' => Carbon::now(),
        ]);
    }
}
