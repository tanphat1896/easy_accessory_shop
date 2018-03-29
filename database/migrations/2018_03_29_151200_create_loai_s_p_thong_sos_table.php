<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiSPThongSosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_s_p_thong_sos', function (Blueprint $table) {
            $table->integer('loai_sp_id')->unsigned();
            $table->integer('thong_so_id')->unsigned();
            $table->timestamps();
            $table->primary(['loai_sp_id','thong_so_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_s_p_thong_sos');
    }
}
