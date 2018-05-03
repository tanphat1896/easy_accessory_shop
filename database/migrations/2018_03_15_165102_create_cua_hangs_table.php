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
            $table->increments('id');
            $table->string('ten_cua_hang',100);
            $table->string('email',100);
            $table->string('so_dien_thoai',11);
            $table->string('dia_chi',255);
            $table->string('logo',100);
            $table->enum('chat_plugin', ['fb', 'tawkto'])->default('fb');
            $table->text('link_fb')->nullable();
            $table->text('link_tawkto')->nullable();
            $table->string('baokim_email')->nullable();
            $table->string('nganluong_email')->nullable();
            $table->integer('wide_menu');
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
        Schema::dropIfExists('cua_hangs');
    }
}
