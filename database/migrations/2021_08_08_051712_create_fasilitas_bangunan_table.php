<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasBangunanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_bangunan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('objek_pajak_id');
            $table->foreign('objek_pajak_id')->references('id')->on('objek_pajak')->onDelete('cascade');
            $table->string('i_bangunan_lain_satuan',30)->nullable();
            $table->string('i_bangunan_lain_harga',30)->nullable();
            $table->string('i_bangunan_lain_total',30)->nullable();
            $table->string('i_kamar_satuan',30)->nullable();
            $table->string('i_kamar_harga',30)->nullable();
            $table->string('i_kamar_total',30)->nullable();
            $table->string('i_ruangan_lain_satuan',30)->nullable();
            $table->string('i_ruangan_lain_harga',30)->nullable();
            $table->string('i_ruangan_lain_total',30)->nullable();
            $table->string('ii_barang_satuan',30)->nullable();
            $table->string('ii_barang_harga',30)->nullable();
            $table->string('ii_barang_total',30)->nullable();
            $table->string('iii_lebar_kurang_satuan',30)->nullable();
            $table->string('iii_lebar_kurang_harga',30)->nullable();
            $table->string('iii_lebar_kurang_total',30)->nullable();
            $table->string('iii_lebar_lebih_satuan',30)->nullable();
            $table->string('iii_lebar_lebih_harga',30)->nullable();
            $table->string('iii_lebar_lebih_total',30)->nullable();
            $table->string('iv_batako_satuan',30)->nullable();
            $table->string('iv_batako_harga',30)->nullable();
            $table->string('iv_batako_total',30)->nullable();
            $table->string('iv_bata_satuan',30)->nullable();
            $table->string('iv_bata_harga',30)->nullable();
            $table->string('iv_bata_total',30)->nullable();
            $table->string('iv_beton_pracetak_satuan',30)->nullable();
            $table->string('iv_beton_pracetak_harga',30)->nullable();
            $table->string('iv_beton_pracetak_total',30)->nullable();
            $table->string('iv_besi_satuan',30)->nullable();
            $table->string('iv_besi_harga',30)->nullable();
            $table->string('iv_besi_total',30)->nullable();
            $table->string('iv_brc_satuan',30)->nullable();
            $table->string('iv_brc_harga',30)->nullable();
            $table->string('iv_brc_total',30)->nullable();
            $table->string('v_hydrant_satuan',30)->nullable();
            $table->string('v_hydrant_harga',30)->nullable();
            $table->string('v_hydrant_total',30)->nullable();
            $table->string('v_sprinkler_satuan',30)->nullable();
            $table->string('v_sprinkler_harga',30)->nullable();
            $table->string('v_sprinkler_total',30)->nullable();
            $table->string('v_alarm_satuan',30)->nullable();
            $table->string('v_alarm_harga',30)->nullable();
            $table->string('v_alarm_total',30)->nullable();
            $table->string('v_intercom_satuan',30)->nullable();
            $table->string('v_intercom_harga',30)->nullable();
            $table->string('v_intercom_total',30)->nullable();
            $table->string('vi_ganset_satuan',30)->nullable();
            $table->string('vi_ganset_harga',30)->nullable();
            $table->string('vi_ganset_total',30)->nullable();
            $table->string('vii_pabx_satuan',30)->nullable();
            $table->string('vii_pabx_harga',30)->nullable();
            $table->string('vii_pabx_total',30)->nullable();
            $table->string('viii_sumur_artesis_satuan',30)->nullable();
            $table->string('viii_sumur_artesis_harga',30)->nullable();
            $table->string('viii_sumur_artesis_total',30)->nullable();
            $table->string('ix_sistem_air_panas_satuan',30)->nullable();
            $table->string('ix_sistem_air_panas_harga',30)->nullable();
            $table->string('ix_sistem_air_panas_total',30)->nullable();
            $table->string('x_penangkal_petir_satuan',30)->nullable();
            $table->string('x_penangkal_petir_harga',30)->nullable();
            $table->string('x_penangkal_petir_total',30)->nullable();
            $table->string('xi_sistem_pengolahan_limbah_satuan',30)->nullable();
            $table->string('xi_sistem_pengolahan_limbah_harga',30)->nullable();
            $table->string('xi_sistem_pengolahan_limbah_total',30)->nullable();
            $table->string('xii_sistem_tata_suara_satuan',30)->nullable();
            $table->string('xii_sistem_tata_suara_harga',30)->nullable();
            $table->string('xii_sistem_tata_suara_total',30)->nullable();
            $table->string('xiii_video_intercom_satuan',30)->nullable();
            $table->string('xiii_video_intercom_harga',30)->nullable();
            $table->string('xiii_video_intercom_total',30)->nullable();
            $table->string('xiv_reservoir_satuan',30)->nullable();
            $table->string('xiv_reservoir_harga',30)->nullable();
            $table->string('xiv_reservoir_total',30)->nullable();
            $table->string('xv_matv_satuan',30)->nullable();
            $table->string('xv_matv_harga',30)->nullable();
            $table->string('xv_matv_total',30)->nullable();
            $table->string('xv_cctv_satuan',30)->nullable();
            $table->string('xv_cctv_harga',30)->nullable();
            $table->string('xv_cctv_total',30)->nullable();
            $table->string('xvi_plester_satuan',30)->nullable();
            $table->string('xvi_plester_harga',30)->nullable();
            $table->string('xvi_plester_total',30)->nullable();
            $table->string('xvi_pelapis_satuan',30)->nullable();
            $table->string('xvi_pelapis_harga',30)->nullable();
            $table->string('xvi_pelapis_total',30)->nullable();
            $table->string('xvii_ringan_satuan',30)->nullable();
            $table->string('xvii_ringan_harga',30)->nullable();
            $table->string('xvii_ringan_total',30)->nullable();
            $table->string('xvii_sedang_satuan',30)->nullable();
            $table->string('xvii_sedang_harga',30)->nullable();
            $table->string('xvii_sedang_total',30)->nullable();
            $table->string('xvii_keras_satuan',30)->nullable();
            $table->string('xvii_keras_harga',30)->nullable();
            $table->string('xvii_keras_total',30)->nullable();
            $table->string('xviii_dengan_beton_liat_satuan',30)->nullable();
            $table->string('xviii_dengan_beton_liat_harga',30)->nullable();
            $table->string('xviii_dengan_beton_liat_total',30)->nullable();
            $table->string('xviii_dengan_aspal_satuan',30)->nullable();
            $table->string('xviii_dengan_aspal_harga',30)->nullable();
            $table->string('xviii_dengan_aspal_total',30)->nullable();
            $table->string('xviii_dengan_tanah_liat_satuan',30)->nullable();
            $table->string('xviii_dengan_tanah_liat_harga',30)->nullable();
            $table->string('xviii_dengan_tanah_liat_total',30)->nullable();
            $table->string('xviii_tanpa_beton_liat_satuan',30)->nullable();
            $table->string('xviii_tanpa_beton_liat_harga',30)->nullable();
            $table->string('xviii_tanpa_beton_liat_total',30)->nullable();
            $table->string('xviii_tanpa_aspal_satuan',30)->nullable();
            $table->string('xviii_tanpa_aspal_harga',30)->nullable();
            $table->string('xviii_tanpa_aspal_total',30)->nullable();
            $table->string('xviii_tanpa_tanah_liat_satuan',30)->nullable();
            $table->string('xviii_tanpa_tanah_liat_harga',30)->nullable();
            $table->string('xviii_tanpa_tanah_liat_total',30)->nullable();
            $table->string('jumlah_fasilitas',30)->nullable();
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('updator_id')->nullable();
            $table->foreign('updator_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasilitas_bangunan');
    }
}
