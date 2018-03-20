<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongSoKyThuatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_so_ky_thuats', function (Blueprint $table) {
            $table->integer('san_pham_id')->unsigned();
            $table->string('model',50)->nullable();
            $table->string('chuan_giao_tiep',50)->nullable();
            $table->string('kich_thuoc',50)->nullable();
            $table->string('dung_luong',50)->nullable();
            $table->string('toc_do_doc',50)->nullable();
            $table->string('toc_do_ghi',50)->nullable();
            $table->string('khoang_cach',50)->nullable();
            $table->string('trong_luong',50)->nullable();
            $table->string('loai_phu_kien',50)->nullable();
            $table->primary('san_pham_id','pk_sp_sp');
            $table->foreign('san_pham_id','fk_tskt_sp')->references('id')->on('san_phams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thong_so_ky_thuats');
    }
}
