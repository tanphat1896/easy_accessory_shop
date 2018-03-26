<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhAnhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinh_anhs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('san_pham_id')->unsigned();
            $table->string('liet_ket',255);
            $table->foreign('san_pham_id','fk_ha_sp')->references('id')->on('san_phams');
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
        Schema::dropIfExists('hinh_anhs');
    }
}
