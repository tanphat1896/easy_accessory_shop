<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenMaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyen_mais', function (Blueprint $table) {
            $table->increments('id');
            $table->float('gia_tri_km');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->integer('san_pham_id')->unsigned();
            $table->foreign('san_pham_id','fk_km_sp')->references('id')->on('san_phams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyen_mais');
    }
}
