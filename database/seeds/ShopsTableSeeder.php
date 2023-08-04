<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            'name' => '店名１',
            'adress' => '新宿〇-〇-〇',
            'comment' => '店舗紹介・メニュー紹介',
            'image' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            //リレーション　シーディング
            //https://zenn.dev/aono/articles/e73c6c3f6be836
        ]);
    }
}
