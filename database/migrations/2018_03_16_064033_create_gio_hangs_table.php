<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGioHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tai_khoan_id')->unsigned();
            $table->foreign('tai_khoan_id','fk_gh_tk')->references('id')->on('tai_khoans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gio_hangs');
    }
}
