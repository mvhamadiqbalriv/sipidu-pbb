<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJbpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jbp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('objek_pajak_id');
            $table->foreign('objek_pajak_id')->references('id')->on('objek_pajak')->onDelete('cascade');
            $table->string('i_struktur_utama_satuan',20)->nullable();
            $table->string('i_struktur_utama_harga',20)->nullable();
            $table->string('i_struktur_utama_total',20)->nullable();
            $table->string('i_basemen_satuan',20)->nullable();
            $table->string('i_basemen_harga',20)->nullable();
            $table->string('i_basemen_total',20)->nullable();
            $table->string('iia_struktur_utama_satuan',20)->nullable();
            $table->string('iia_struktur_utama_harga',20)->nullable();
            $table->string('iia_struktur_utama_total',20)->nullable();
            $table->string('iib_batu_satuan',20)->nullable();
            $table->string('iib_batu_harga',20)->nullable();
            $table->string('iib_batu_total',20)->nullable();
            $table->string('iic_dua_lantai_satuan',20)->nullable();
            $table->string('iic_dua_lantai_harga',20)->nullable();
            $table->string('iic_dua_lantai_total',20)->nullable();
            $table->string('iid_dua_lantai_satuan',20)->nullable();
            $table->string('iid_dua_lantai_harga',20)->nullable();
            $table->string('iid_dua_lantai_total',20)->nullable();
            $table->string('iie_dua_lantai_satuan',20)->nullable();
            $table->string('iie_dua_lantai_harga',20)->nullable();
            $table->string('iie_dua_lantai_total',20)->nullable();
            $table->string('iif_penutup_atap_satuan',20)->nullable();
            $table->string('iif_penutup_atap_harga',20)->nullable();
            $table->string('iif_penutup_atap_total',20)->nullable();
            $table->string('iig_dua_lantai_satuan',20)->nullable();
            $table->string('iig_dua_lantai_harga',20)->nullable();
            $table->string('iig_dua_lantai_total',20)->nullable();
            $table->string('iih_super_struktur_satuan',20)->nullable();
            $table->string('iih_super_struktur_harga',20)->nullable();
            $table->string('iih_super_struktur_total',20)->nullable();
            $table->string('iih_basemen_satuan',20)->nullable();
            $table->string('iih_basemen_harga',20)->nullable();
            $table->string('iih_basemen_total',20)->nullable();
            $table->string('iii_fasilitas_pendukung',20)->nullable();
            $table->string('iii_nilai_sebelum_disusutkan',20)->nullable();
            $table->string('iv_nilai_penyusutan_satuan',20)->nullable();
            $table->string('iv_nilai_penyusutan_harga',20)->nullable();
            $table->string('iv_nilai_penyusutan_total',20)->nullable();
            $table->string('iv_nilai_setelah_disusutkan',20)->nullable();
            $table->string('v_daya_listrik_satuan',20)->nullable();
            $table->string('v_daya_listrik_harga',20)->nullable();
            $table->string('v_daya_listrik_total',20)->nullable();
            $table->string('v_ac_split_satuan',20)->nullable();
            $table->string('v_ac_split_harga',20)->nullable();
            $table->string('v_ac_split_total',20)->nullable();
            $table->string('v_ac_window_satuan',20)->nullable();
            $table->string('v_ac_window_harga',20)->nullable();
            $table->string('v_ac_window_total',20)->nullable();
            $table->string('v_ac_floor_satuan',20)->nullable();
            $table->string('v_ac_floor_harga',20)->nullable();
            $table->string('v_ac_floor_total',20)->nullable();
            $table->string('nilai_bangunan',20)->nullable();
            $table->string('nilai_bangunan_m2',20)->nullable();
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
        Schema::dropIfExists('jbp');
    }
}
