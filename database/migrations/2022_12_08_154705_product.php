<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');//tên sản phẩm
            $table->string('code');// Mã sp
            $table->integer('amount');// số lượng
            $table->integer('price'); //giá tiền
            $table->string('size');// list các size implode
            $table->string('color');//list các màu implode
            $table->integer('status')->default(1); //trạng thái sp : mới tạo thì là 1 , chuyển san hàng tồn thì 2
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('product');
    }
}
