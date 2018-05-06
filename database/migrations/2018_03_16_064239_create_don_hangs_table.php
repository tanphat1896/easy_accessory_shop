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
            $table->string('ma_don_hang')->unique();
            $table->string('ten_nguoi_nhan',50);
            $table->string('email_nguoi_nhan',100);
            $table->string('sdt_nguoi_nhan',11);
            $table->string('dia_chi', 500);
            $table->integer('customer_id')->nullable()->unsigned();
            $table->double('tong_tien');
            $table->double('phi_van_chuyen');
            $table->string('ghi_chu',500)->nullable();
            $table->tinyInteger('tinh_trang')->default(0);
            $table->dateTime('ngay_dat_hang');
            $table->dateTime('ngay_duyet_don')->nullable();
            $table->enum('hinh_thuc_thanh_toan', ['cash', 'baokim', 'nganluong']);
            $table->string('payment_id', 100)->nullable();
            $table->tinyInteger('payment_type')->nullable();
            $table->foreign('customer_id','fk_customer_donhang')
                ->references('id')->on('customers');
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
        Schema::dropIfExists('don_hangs');
    }
}
