<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_nhaps', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ngay_nhap');
            $table->integer('tai_khoan_id')->unsigned();
            $table->integer('nha_cung_cap_id')->unsigned();
            $table->foreign('tai_khoan_id','fk_pn_tk')->references('id')->on('tai_khoans');
            $table->foreign('nha_cung_cap_id','fk_pn_ncc')->references('id')->on('nha_cung_caps');
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
        Schema::dropIfExists('phieu_nhaps');
    }
}
