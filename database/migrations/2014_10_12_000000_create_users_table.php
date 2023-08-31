<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name','10');
            $table->string('email','30')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password','100');
            $table->string('image','100')->nullable();
            $table->integer('role')->default(0);
            $table->tinyInteger('del_flg')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            //https://loop-never-ends.com/laravel-unique-columns/
            // $table->string('reset_password_access_key','64')->nullable()->unique();
            // $table->timestamp('reset_password_expire_at')->nullable();

            //カラム追加する
            //https://qiita.com/rikako_hira/items/6a0a2b972ddbf638fe
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
