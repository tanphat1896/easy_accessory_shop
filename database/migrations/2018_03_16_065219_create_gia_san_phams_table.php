<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gia_san_phams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('san_pham_id')->unsigned();
            $table->dateTime('ngay_cap_nhat');
            $table->double('gia');
            $table->boolean('active')->default(true);
            $table->foreign('san_pham_id','fk_gsp_sp')->references('id')->on('san_phams');
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
        Schema::dropIfExists('gia_san_phams');
    }
}
