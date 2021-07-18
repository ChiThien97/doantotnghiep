<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tensanpham');
            $table->string('slug');
            $table->string('hinhanh');
            $table->double('gia');
            $table->double('giakhuyenmai');
            $table->longText('mota');
            $table->boolean('trangthai');
            $table->longText('thongso');
            $table->integer('baohanh');
            $table->integer('luotxem')->index();
            $table->integer('id_nhasanxuat');
            $table->integer('id_loaisanpham');
            $table->integer('soluongton')->default(0);
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
        Schema::dropIfExists('sanphams');
    }
}
