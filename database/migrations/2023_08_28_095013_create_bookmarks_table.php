<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('shop_id');
 
            $table->timestamps();

            //https://qiita.com/xiaomi05/items/e034a3444b1f5518669b
            //usersテーブルの外部キー設定
            //userテーブルのidカラムを参照するconstrainedメソッド
            //削除時のオプション
            // $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
            // $table->foreign('shop_id')->references('id')->on('shops')->cascadeOnDelete();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
}
