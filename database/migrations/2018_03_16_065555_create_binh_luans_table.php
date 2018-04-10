<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhLuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->string('noi_dung',500);
            $table->integer('san_pham_id')->unsigned();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->boolean('approved')->default(false);
            $table->foreign('customer_id','fk_bl_tk')->references('id')->on('customers');
            $table->foreign('san_pham_id','fk_bl_sp')->references('id')->on('san_phams');
            $table->foreign('parent_id','fk_bl_blc')->references('id')->on('binh_luans')
                ->onDelete('cascade');
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
        Schema::dropIfExists('binh_luans');
    }
}
