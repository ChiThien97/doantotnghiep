<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuNhapHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_nhap_hangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('maphieunhap')->unique();
            $table->unsignedBigInteger('id_nhacungcap');
            $table->decimal('tongtien', 20, 6);

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
        Schema::dropIfExists('phieu_nhap_hangs');
    }
}
