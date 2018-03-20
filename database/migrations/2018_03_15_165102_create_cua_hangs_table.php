<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuaHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cua_hangs', function (Blueprint $table) {
            $table->string('ten_cua_hang',100);
            $table->string('email',100);
            $table->string('so_dien_thoai',11);
            $table->string('dia_chi',255);
            $table->string('logo',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cua_hangs');
    }
}
