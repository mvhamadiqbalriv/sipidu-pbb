<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFasilitasBangunanIdToJbpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jbp', function (Blueprint $table) {
            $table->unsignedBigInteger('fasilitas_bangunan_id');
            $table->foreign('fasilitas_bangunan_id')->references('id')->on('fasilitas_bangunan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jbp', function (Blueprint $table) {
            //
        });
    }
}
