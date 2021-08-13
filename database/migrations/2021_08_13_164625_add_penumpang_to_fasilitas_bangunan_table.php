<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenumpangToFasilitasBangunanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fasilitas_bangunan', function (Blueprint $table) {
            $table->string('ii_penumpang_satuan',30)->nullable();
            $table->string('ii_penumpang_harga',30)->nullable();
            $table->string('ii_penumpang_total',30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fasilitas_bangunan', function (Blueprint $table) {
            //
        });
    }
}
