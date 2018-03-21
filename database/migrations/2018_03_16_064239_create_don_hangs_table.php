<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_nguoi_nhan',50);
            $table->string('email_nguoi_nhan',100);
            $table->string('sdt_nguoi_nhan',11);
            $table->integer('tai_khoan_id')->nullable()->unsigned();
            $table->double('tong_tien');
            $table->string('ghi_chu',500);
            $table->string('tinh_trang',255);
            $table->dateTime('ngay_dat_hang');
            $table->dateTime('ngay_duyet_don');
            $table->string('hinh_thuc_thanh_toan',100);
            $table->foreign('tai_khoan_id','fk_dh_tk')->references('id')->on('tai_khoans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hangs');
    }
}
