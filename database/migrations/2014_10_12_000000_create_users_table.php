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
            $table->id();
            $table->string('name');// Tên người dùng
            $table->string('email')->unique();// email
            $table->integer('level');// chức vụ . 1 admin, 2 nhà cung cấp, 3 thủ kho, 4 nhà cung cấp
            $table->string('phone');// số điện thoại
            $table->string('address'); //địa chỉ
            $table->string('birthday');//ngày sinh
            $table->string('username');//tên đăng nhập
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');//
            $table->rememberToken();
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
