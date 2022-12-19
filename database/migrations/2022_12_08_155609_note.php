<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Note extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // bản hiển thị trạng thái nhập và xuất.
        Schema::create('note', function (Blueprint $table) {
            $table->id();
            $table->text('code');//mã xuất nhập, 1 xuất xuat+4 số random, nhập nhap+4 random
            $table->integer('id_product');//khóa ngoại
            $table->integer('id_user_create');//nhân viên tạo
            $table->integer('id_user_cc');//nhà cung cấp
            $table->integer('amount');// số lượng
            $table->integer('price'); //tổng số tiền
            $table->integer('status')->default(1); //1 là nhập, 2 xuất
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
        Schema::dropIfExists('note');
    }
}
