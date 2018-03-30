<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanPhamThongSosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham_thong_sos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('san_pham_id')->unsigned();
            $table->integer('thong_so_id')->unsigned();
            $table->string('gia_tri',255)->default('Chưa cập nhật');
            $table->timestamps();
            $table->unique(['san_pham_id','thong_so_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_pham_thong_sos');
    }
}
