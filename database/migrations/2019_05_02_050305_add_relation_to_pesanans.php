<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationToPesanans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->foreign('menu_id')
             ->references('id')->on('menus')
             ->onDelete('cascade');
            $table->foreign('pelanggan_id')
             ->references('id')->on('pelanggans')
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
        Schema::table('pesanans', function (Blueprint $table) {
            $table->dropForeign('pesanans_menu_id_foreign');
            $table->dropForeign('pesanans_pelanggan_id_foreign');
        });
    }
}
