<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_sanpham');
            $table->string('username');
            $table->mediumText('noidung');
            $table->string('email');
            $table->string('adminreply');
            $table->boolean('trangthai')->default(0);
            $table->bigInteger('id_admin')->nullable();
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
        Schema::dropIfExists('binh_luans');
    }
}
