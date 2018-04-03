<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaiKhoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten',50);
            $table->string('email',100)->unique();
            $table->string('so_dien_thoai',11);
            $table->string('ten_dang_nhap',16)->unique();
            $table->string('mat_khau');
            $table->integer('loai_tk_id')->unsigned();
            $table->rememberToken();
            $table->foreign('loai_tk_id','fk_tk_ltk')->references('id')->on('loai_tai_khoans');
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
        Schema::dropIfExists('tai_khoans');
    }
}
