<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhGiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_gias', function (Blueprint $table) {
            $table->integer('tai_khoan_id')->unsigned();
            $table->integer('san_pham_id')->unsigned();
            $table->integer('diem_danh_gia');
            $table->primary(['tai_khoan_id','san_pham_id'],'pk_tksp_tk_sp');
            $table->foreign('tai_khoan_id','fk_dg_tk')->references('id')->on('tai_khoans');
            $table->foreign('san_pham_id','fk_dg_sp')->references('id')->on('san_phams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danh_gias');
    }
}
