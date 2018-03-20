<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('noi_dung',500);
            $table->string('ten_nguoi_bl',50);
            $table->string('email_nguoi_bl',100);
            $table->integer('tai_khoan_id')->nullable()->unsigned();
            $table->integer('san_pham_id')->unsigned();
            $table->foreign('tai_khoan_id','fk_bl_tk')->references('id')->on('tai_khoans');
            $table->foreign('san_pham_id','fk_bl_sp')->references('id')->on('san_phams');
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
