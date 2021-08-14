<html>
    <style>
        table, th, td {
          border-collapse: collapse;
        }
        th, td {
          padding: 5px;
          text-align: left;    
        }
        </style>
<head>
    <title>TEST</title>
</head>
<body>
    <table style="width:100%">
        <tbody>
        <tr style="padding-bottom:5px">
            <td><img src="{{asset('assets/images/sumedang.png')}}" width="100px" alt=""></td>
            <td colspan="4"><h2>PERHITUNGAN FORMULIR JBP</h2></td>
        </tr>
        <tr style="border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black">
            <td><b>Nomor Objek Pajak</b></td>
            <td colspan="3"><b>: 721937123123123</b></td>
        </tr>
        <tr style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black">
            <td>Jenis Penggunaan</td>
            <td>: 721937123123123</td>
            <td>Nomor Bangunan</td>
            <td colspan="2">: 721937123123123</td>
        </tr>
        <tr>
            <td>I. AC CENTRAL JPB</td>
            <td>Bangunan Lain</td>
            <td id="i_bangunan_lain_satuan">{{$detail->i_bangunan_lain_satuan}}</td>
            <td id="i_bangunan_lain_harga">Rp. {{number_format($detail->i_bangunan_lain_harga)}}</td>
            <td id="i_bangunan_lain_total">Rp. {{number_format($detail->i_bangunan_lain_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Kamar</td>
            <td id="i_kamar_satuan"></td>
            <td id="i_kamar_harga">Rp.</td>
            <td id="i_kamar_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Ruangan Lain</td>
            <td id="i_ruangan_lain_satuan"></td>
            <td id="i_ruangan_lain_harga">Rp.</td>
            <td id="i_ruangan_lain_total">Rp.</td>
        </tr>
        <tr>
            <td>II. Lift</td>
            <td>Penumpang</td>
            <td id="ii_penumpang_satuan"></td>
            <td id="ii_penumpang_harga">Rp.</td>
            <td id="ii_penumpang_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Barang</td>
            <td id="ii_barang_satuan"></td>
            <td id="ii_barang_harga">Rp.</td>
            <td id="ii_barang_total">Rp.</td>
        </tr>
        <tr>
            <td>III. Escalator</td>
            <td>Lebar < 0,8 m</td>
            <td id="iii_lebar_kurang_satuan"></td>
            <td id="iii_lebar_kurang_harga">Rp.</td>
            <td id="iii_lebar_kurang_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Lebar > 0,8 m</td>
            <td id="iii_lebar_lebih_satuan"></td>
            <td id="iii_lebar_lebih_harga">Rp.</td>
            <td id="iii_lebar_lebih_total">Rp.</td>
        </tr>
        <tr>
            <td>IV. Pagar</td>
            <td>Batako</td>
            <td id="iv_batako_satuan"></td>
            <td id="iv_batako_harga">Rp.</td>
            <td id="iv_batako_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Bata</td>
            <td id="iv_bata_satuan"></td>
            <td id="iv_bata_harga">Rp.</td>
            <td id="iv_bata_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Beton Pracetak</td>
            <td id="iv_beton_pracetak_satuan"></td>
            <td id="iv_beton_pracetak_harga">Rp.</td>
            <td id="iv_beton_pracetak_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Besi</td>
            <td id="iv_besi_satuan"></td>
            <td id="iv_besi_harga">Rp.</td>
            <td id="iv_besi_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>BRC</td>
            <td id="iv_brc_satuan"></td>
            <td id="iv_brc_harga">Rp.</td>
            <td id="iv_brc_total">Rp.</td>
        </tr>
        <tr>
            <td>V. Proteksi Api</td>
            <td>Hydrant</td>
            <td id="v_hydrant_satuan"></td>
            <td id="v_hydrant_harga">Rp.</td>
            <td id="v_hydrant_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Sprinkler</td>
            <td id="v_sprinkler_satuan"></td>
            <td id="v_sprinkler_harga">Rp.</td>
            <td id="v_sprinkler_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Alarm</td>
            <td id="v_alarm_satuan"></td>
            <td id="v_alarm_harga">Rp.</td>
            <td id="v_alarm_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Intercom</td>
            <td id="v_intercom_satuan"></td>
            <td id="v_intercom_harga">Rp.</td>
            <td id="v_intercom_total">Rp.</td>
        </tr>
        <tr>
            <td colspan="2">VI. Ganset</td>
            <td id="vi_ganset_satuan"></td>
            <td id="vi_ganset_harga">Rp.</td>
            <td id="vi_ganset_total">Rp.</td>
        </tr>
        <tr>
            <td colspan="2">VII. PABX</td>
            <td id="vii_pabx_satuan"></td>
            <td id="vii_pabx_harga">Rp.</td>
            <td id="vii_pabx_total">Rp.</td>
        </tr>
        <tr>
            <td colspan="2">VII. PABX</td>
            <td id="vii_pabx_satuan"></td>
            <td id="vii_pabx_harga">Rp.</td>
            <td id="vii_pabx_total">Rp.</td>
        </tr>
        <tr>
            <td colspan="2">VIII. Sumur artesis</td>
            <td id="viii_sumur_artesis_satuan"></td>
            <td id="viii_sumur_artesis_harga">Rp.</td>
            <td id="viii_sumur_artesis_total">Rp.</td>
        </tr>
        <tr>
            <td colspan="2">IX. Sistem air panas</td>
            <td id="ix_sistem_air_panas_satuan"></td>
            <td id="ix_sistem_air_panas_harga">Rp.</td>
            <td id="ix_sistem_air_panas_total">Rp.</td>
        </tr>
        <tr>
            <td colspan="2">X. Penangkal petir</td>
            <td id="x_penangkal_petir_satuan"></td>
            <td id="x_penangkal_petir_harga">Rp.</td>
            <td id="x_penangkal_petir_total">Rp.</td>
        </tr>
        <tr>
            <td colspan="2">XI. Sistem pengolahan limbah</td>
            <td id="xi_sistem_pengolahan_limbah_satuan"></td>
            <td id="xi_sistem_pengolahan_limbah_harga">Rp.</td>
            <td id="xi_sistem_pengolahan_limbah_total">Rp.</td>
        </tr>
        <tr>
            <td colspan="2">XII. Sistem tata suara</td>
            <td id="xii_sistem_tata_suara_satuan"></td>
            <td id="xii_sistem_tata_suara_harga">Rp.</td>
            <td id="xii_sistem_tata_suara_total">Rp.</td>
        </tr>
        <tr>
            <td colspan="2">XIII. Video intercom</td>
            <td id="xiii_video_intercom_satuan"></td>
            <td id="xiii_video_intercom_harga">Rp.</td>
            <td id="xiii_video_intercom_total">Rp.</td>
        </tr>
        <tr>
            <td colspan="2">XIV. Reservoir</td>
            <td id="xiv_reservoir_satuan"></td>
            <td id="xiv_reservoir_harga">Rp.</td>
            <td id="xiv_reservoir_total">Rp.</td>
        </tr>
        <tr>
            <td>XV. Televisi (TV)</td>
            <td>MATV</td>
            <td id="xv_matv_satuan"></td>
            <td id="xv_matv_harga">Rp.</td>
            <td id="xv_matv_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>CCTV</td>
            <td id="xv_cctv_satuan"></td>
            <td id="xv_cctv_harga">Rp.</td>
            <td id="xv_cctv_total">Rp.</td>
        </tr>
        <tr>
            <td>XVI. Kolam Renang</td>
            <td>Plester</td>
            <td id="xvi_plester_satuan"></td>
            <td id="xvi_plester_harga">Rp.</td>
            <td id="xvi_plester_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Pelapis</td>
            <td id="xvi_pelapis_satuan"></td>
            <td id="xvi_pelapis_harga">Rp.</td>
            <td id="xvi_pelapis_total">Rp.</td>
        </tr>
        <tr>
            <td>XVII. Perkerasan</td>
            <td>Ringan</td>
            <td id="xvii_ringan_satuan"></td>
            <td id="xvii_ringan_harga">Rp.</td>
            <td id="xvii_ringan_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Sedang</td>
            <td id="xvii_sedang_satuan"></td>
            <td id="xvii_sedang_harga">Rp.</td>
            <td id="xvii_sedang_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Keras</td>
            <td id="xvii_keras_satuan"></td>
            <td id="xvii_keras_harga">Rp.</td>
            <td id="xvii_keras_total">Rp.</td>
        </tr>
        <tr>
            <td>XVIII. Lapangan Tenis</td>
            <td colspan="1" style="border-top: 3px solid black;border-bottom: 3px solid black">Dengan Lampu</td>
        </tr>
        <tr>
            <td></td>
            <td>Beton</td>
            <td id="xviii_dengan_beton_satuan"></td>
            <td id="xviii_dengan_beton_harga">Rp.</td>
            <td id="xviii_dengan_beton_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Aspal</td>
            <td id="xviii_dengan_aspal_satuan"></td>
            <td id="xviii_dengan_aspal_harga">Rp.</td>
            <td id="xviii_dengan_aspal_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Tanah Liat</td>
            <td id="xviii_dengan_tanah_liat_satuan"></td>
            <td id="xviii_dengan_tanah_liat_harga">Rp.</td>
            <td id="xviii_dengan_tanah_liat_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="1" style="border-top: 3px solid black;border-bottom: 3px solid black">Tanpa Lampu</td>
        </tr>
        <tr>
            <td></td>
            <td>Beton</td>
            <td id="xviii_tanpa_beton_satuan"></td>
            <td id="xviii_tanpa_beton_harga">Rp.</td>
            <td id="xviii_tanpa_beton_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Aspal</td>
            <td id="xviii_tanpa_aspal_satuan"></td>
            <td id="xviii_tanpa_aspal_harga">Rp.</td>
            <td id="xviii_tanpa_aspal_total">Rp.</td>
        </tr>
        <tr>
            <td></td>
            <td>Tanah Liat</td>
            <td id="xviii_tanpa_tanah_liat_satuan"></td>
            <td id="xviii_tanpa_tanah_liat_harga">Rp.</td>
            <td id="xviii_tanpa_tanah_liat_total">Rp.</td>
        </tr>
        <tr>
            <td colspan="3" class="text-center"><h4>Jumlah Fasilitas</h4></td>
            <td>Rp.</td>
            <td id="jumlah_fasilitas"><h4><u></u></h4> </td>
        </tr>
        </tbody>
    </table>
</body>
</html>