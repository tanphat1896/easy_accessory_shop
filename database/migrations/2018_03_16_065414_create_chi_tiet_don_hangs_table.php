<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietDonHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('don_hang_id')->unsigned();
            $table->integer('san_pham_id')->unsigned();
            $table->integer('so_luong');
            $table->double('don_gia');
            $table->integer('giam_gia')->default(0);
            $table->unique(['don_hang_id','san_pham_id']);
            $table->foreign('don_hang_id','fk_ctdh_dh')->references('id')->on('don_hangs')
                ->onDelete('cascade');
            $table->foreign('san_pham_id','fk_ctdh_sp')->references('id')->on('san_phams');
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
        Schema::dropIfExists('chi_tiet_don_hangs');
    }
}
