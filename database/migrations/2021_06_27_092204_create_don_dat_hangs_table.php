<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonDatHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_dat_hangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('madonhang')->unique();

            $table->enum('trangthai', ['Chờ Xử Lý', 'Đang Xử Lý', 'Đã Hoàn Thành', 'Đã Hủy'])->default('Chờ Xử Lý');
            $table->decimal('tongtien', 20, 6);

            $table->boolean('trangthai_thanhtoan')->default(0);

            $table->string('tenkhachhang');
            $table->text('diachi');
            $table->string('email');
            $table->string('sodienthoai')->unique();
            $table->text('ghichu')->nullable();

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
        Schema::dropIfExists('don_dat_hangs');
    }
}
