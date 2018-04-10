<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToGioHangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gio_hangs', function (Blueprint $table) {
            $table->foreign('customer_id','fk_gh_kh')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gio_hangs', function (Blueprint $table) {
            $table->dropForeign('fk_gh_kh');
        });
    }
}
