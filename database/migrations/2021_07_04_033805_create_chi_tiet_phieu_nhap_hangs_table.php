<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietPhieuNhapHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_phieu_nhap_hangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_phieunhaphang')->index();
            $table->unsignedBigInteger('id_sanpham');
            $table->decimal('gianhap', 20, 6);
            $table->unsignedInteger('soluong');
            $table->foreign('id_phieunhaphang')->references('maphieunhap')->on('phieu_nhap_hangs')->onDelete('cascade');
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
        Schema::dropIfExists('chi_tiet_phieu_nhap_hangs');
    }
}
