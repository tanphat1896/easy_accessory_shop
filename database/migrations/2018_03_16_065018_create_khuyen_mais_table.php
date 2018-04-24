<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenMaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyen_mais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_km')->nullable();
            $table->integer('gia_tri_km');
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('khuyen_mais')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyen_mais');
    }
}
