<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuBaoHanhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_bao_hanhs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_chitietdonhang')->index();
            $table->unsignedBigInteger('id_sanpham')->index();
            $table->string('serial')->unique();
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
        Schema::dropIfExists('phieu_bao_hanhs');
    }
}
