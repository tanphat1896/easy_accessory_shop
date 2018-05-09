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
            $table->date('ngay_nhap')->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->string('ten_nhan_vien', 50)->nullable();
            $table->integer('nha_cung_cap_id')->unsigned()->nullable();
            $table->integer('so_san_pham')->nullable()->default(0);
            $table->boolean('da_cap_nhat')->default(true);
            $table->integer('phieu_nhap_id')->unsigned()->nullable();
            $table->foreign('nha_cung_cap_id','fk_pn_ncc')->references('id')->on('nha_cung_caps');
            $table->foreign('phieu_nhap_id','fk_pn_pn')->references('id')->on('phieu_nhaps');
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
