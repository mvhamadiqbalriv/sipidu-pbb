<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlumbingToJbpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jbp', function (Blueprint $table) {
            $table->string('iii_super_struktur_satuan',20)->nullable();
            $table->string('iii_super_struktur_harga',20)->nullable();
            $table->string('iii_super_struktur_total',20)->nullable();
            $table->string('iii_basemen_satuan',20)->nullable();
            $table->string('iii_basemen_harga',20)->nullable();
            $table->string('iii_basemen_total',20)->nullable();
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
