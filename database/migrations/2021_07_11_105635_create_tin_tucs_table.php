<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinTucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_tucs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tieude');
            $table->string('slug');
            $table->string('hinhanh');
            $table->longText('noidung');
            $table->boolean('trangthai')->default(0);
            $table->string('tacgia');
            $table->integer('luotxem')->index();
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
        Schema::dropIfExists('tin_tucs');
    }
}
