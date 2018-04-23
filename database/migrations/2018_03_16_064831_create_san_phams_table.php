<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_san_pham',255);
            $table->integer('so_luong')->default(0);
            $table->longText('mo_ta')->nullable();
            $table->float('diem_danh_gia')->default(0.0);
            $table->integer('loai_san_pham_id')->unsigned();
            $table->integer('thuong_hieu_id')->unsigned();
            $table->string('slug');
            $table->dateTime('ngay_tao');
            $table->dateTime('ngay_cap_nhat');
            $table->tinyInteger('tinh_trang')->default(1);
            $table->string('anh_dai_dien');
            $table->foreign('loai_san_pham_id','fk_sp_lsp')->references('id')->on('loai_san_phams');
            $table->foreign('thuong_hieu_id','fk_sp_th')->references('id')->on('thuong_hieus');
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
        Schema::dropIfExists('san_phams');
    }
}
