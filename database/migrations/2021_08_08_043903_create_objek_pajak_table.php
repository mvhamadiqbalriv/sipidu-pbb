<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjekPajakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objek_pajak', function (Blueprint $table) {
            $table->id();
            $table->string('nop')->unique();
            $table->string('jenis_penggunaan');
            $table->string('wajib_pajak');
            $table->string('alamat_objek_pajak');
            $table->char('district_id');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->char('village_id');
            $table->foreign('village_id')->references('id')->on('villages');
            $table->string('nomor_bangunan')->nullable();
            $table->string('tahun_dibangun')->nullable();
            $table->integer('luas_bangunan');
            $table->integer('luas_basemen')->nullable();
            $table->integer('total_luas_bangunan');
            $table->integer('jumlah_lantai_bangunan');
            $table->integer('jumlah_lantai_basemen')->nullable();
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('updator_id')->nullable();
            $table->foreign('updator_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('objek_pajak');
    }
}
