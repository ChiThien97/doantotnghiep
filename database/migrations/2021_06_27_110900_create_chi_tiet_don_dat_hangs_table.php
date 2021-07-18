<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietDonDatHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_don_dat_hangs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('id_donhang')->index();
            $table->unsignedBigInteger('id_sanpham')->index();
            $table->unsignedInteger('soluong');
            $table->decimal('gia', 20, 6);

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
        Schema::dropIfExists('chi_tiet_don_dat_hangs');
    }
}
