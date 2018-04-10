<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhGiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_gias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('san_pham_id')->unsigned();
            $table->integer('diem_danh_gia');
            $table->unique(['customer_id','san_pham_id'],'pk_tksp_tk_sp');
            $table->foreign('customer_id','fk_dg_th')->references('id')->on('customers');
            $table->foreign('san_pham_id','fk_dg_sp')->references('id')->on('san_phams');
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
        Schema::dropIfExists('danh_gias');
    }
}
