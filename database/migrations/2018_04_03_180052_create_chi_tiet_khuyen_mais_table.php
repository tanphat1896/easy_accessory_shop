<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietKhuyenMaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_khuyen_mais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('khuyen_mai_id')->unsigned();
            $table->integer('san_pham_id')->unsigned();
            $table->foreign('san_pham_id','fk_ctkm_sp')->references('id')->on('san_phams');
            $table->foreign('khuyen_mai_id','fk_ctkm_km')->references('id')->on('khuyen_mais');
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
        Schema::dropIfExists('chi_tiet_khuyen_mais');
    }
}
