<?php
/*
 * @Description:
 * @Author: LMG
 * @Date: 2020-01-03 20:50:14
 * @LastEditors  : LMG
 * @LastEditTime : 2020-01-03 23:04:53
 */

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
            $table->bigIncrements('id')->comment('主键Id');
            $table->string('name')->comment('用户名称');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('password')->comment('密码');
            $table->text('last_token')->nullable()->comment('登录时的token');
            $table->tinyInteger('status')->default(0)->comment('用户状态 -1代表已删除 0代表正常 1代表冻结');
            $table->timestamp('email_verified_at')->nullable()->comment('是否通过邮箱验证');
            $table->rememberToken()->comment('记住我');
            $table->timestamps();
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