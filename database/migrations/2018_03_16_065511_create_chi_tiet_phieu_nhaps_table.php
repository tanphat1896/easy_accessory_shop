<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietPhieuNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_phieu_nhaps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phieu_nhap_id')->unsigned();
            $table->integer('san_pham_id')->unsigned();
            $table->integer('so_luong');
            $table->double('don_gia');
            $table->unique(['phieu_nhap_id','san_pham_id']);
            $table->foreign('phieu_nhap_id','fk_ctpn_pn')->references('id')->on('phieu_nhaps');
            $table->foreign('san_pham_id','fk_ctpn_sp')->references('id')->on('san_phams');
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
        Schema::dropIfExists('chi_tiet_phieu_nhaps');
    }
}
