<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietGioHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_gio_hangs', function (Blueprint $table) {
            $table->integer('gio_hang_id')->unsigned();
            $table->integer('san_pham_id')->unsigned();
            $table->integer('so_luong');
            $table->primary(['gio_hang_id','san_pham_id'],'pk_ghsp_gh_sp');
            $table->foreign('gio_hang_id','fk_ctgh_gh')->references('id')->on('gio_hangs');
            $table->foreign('san_pham_id','fk_ctgh_sp')->references('id')->on('san_phams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_gio_hangs');
    }
}
