<html>
    <style>
        table, th, td {
          border-collapse: collapse;
        }
        th, td {
          text-align: left;    
        }
        td{
            font-size: 15px;
        }
        .border-b{
            border-bottom: 1px solid black;
        }
        .border-tr{
            border-top: 1px solid black;
            border-right: 1px solid black;
        }
        .border-tl{
            border-top: 1px solid black;
            border-left: 1px solid black;
        }
        .border-br{
            border-bottom: 1px solid black;
            border-right: 1px solid black;
        }
        .border-bl{
            border-bottom: 1px solid black;
            border-left: 1px solid black;
        }
        .border-second{
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }
        .border-tb{
            border-top: 3px solid black;
            border-bottom: 3px solid black
        }
        .center {
            margin-left: auto;
            margin-right: auto;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .padding-5{
            padding:5px;
        }
        </style>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Formulir Fasilitas Bangunan</title>
</head>
<body>
    <table class="center" width="100%">
        <tbody>
        <tr>
            <td>
                <img src="{{asset('assets/images/sumedang.png')}}" width="50px;" alt="">
            </td>
            <td colspan="4">
                <h3>PERHITUNGAN FORMULIR FASILITAS BANGUNAN</h3>
            </td>
        </tr>
        <tr>
            <td class="border-tl"><h4><b>Nomor Objek Pajak</b></h4></td>
            <td class="border-tr" colspan="4"><h4><b>: {{$detail->objek_pajak->nop}}</b></h4></td>
        </tr>
        <tr class="border-second">
            <td class="border-bl">Jenis Penggunaan</td>
            <td class="border-b">: {{$detail->objek_pajak->jenis_penggunaan}}</td>
            <td class="border-b" colspan="2" style="text-align: right">Nomor Bangunan</td>
            <td class="border-br">: {{$detail->objek_pajak->nomor_bangunan}}</td>
        </tr>
        <tr>
            <td style="padding-top:10px;"><h4 style="margin-top:0px;margin-bottom:0px;">I. AC CENTRAL JPB</h4></td>
            <td style="padding-top:10px;">Bangunan Lain</td>
            <td id="i_bangunan_lain_satuan" style="padding-top:10px;">{{$detail->i_bangunan_lain_satuan}} M<sup>2</sup></td>
            <td id="i_bangunan_lain_harga" style="padding-top:10px;">X Rp. {{number_format($detail->i_bangunan_lain_harga)}}</td>
            <td id="i_bangunan_lain_total" style="padding-top:10px;">= Rp. {{number_format($detail->i_bangunan_lain_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Kamar</td>
            <td id="i_kamar_satuan">{{$detail->i_kamar_satuan}} M<sup>2</sup></td>
            <td id="i_kamar_harga">X Rp. {{number_format($detail->i_kamar_harga)}}</td>
            <td id="i_kamar_total">= Rp. {{number_format($detail->i_kamar_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Ruangan Lain</td>
            <td id="i_ruangan_lain_satuan">{{$detail->i_ruangan_lain_satuan}} M<sup>2</sup></td>
            <td id="i_ruangan_lain_harga">X Rp. {{number_format($detail->i_ruangan_lain_harga)}}</td>
            <td id="i_ruangan_lain_total">= Rp. {{number_format($detail->i_ruangan_lain_total)}}</td>
        </tr>
        <tr>
            <td><h4 style="margin-top:0px;margin-bottom:0px;">II. Lift</h4></td>
            <td>Penumpang</td>
            <td id="ii_penumpang_satuan">{{$detail->ii_penumpang_satuan}} Unit</td>
            <td id="ii_penumpang_harga">X Rp. {{number_format($detail->ii_penumpang_harga)}}</td>
            <td id="ii_penumpang_total">= Rp. {{number_format($detail->ii_penumpang_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Barang</td>
            <td id="ii_barang_satuan">{{$detail->ii_barang_satuan}} Unit</td>
            <td id="ii_barang_harga">X Rp. {{number_format($detail->ii_barang_harga)}}</td>
            <td id="ii_barang_total">= Rp. {{number_format($detail->ii_barang_total)}}</td>
        </tr>
        <tr>
            <td><h4 style="margin-top:0px;margin-bottom:0px;">III. Escalator</h4></td>
            <td>Lebar < 0,8 m</td>
            <td id="iii_lebar_kurang_satuan">{{$detail->iii_lebar_kurang_satuan}} Unit</td>
            <td id="iii_lebar_kurang_harga">X Rp. {{number_format($detail->iii_lebar_kurang_harga)}}</td>
            <td id="iii_lebar_kurang_total">= Rp. {{number_format($detail->iii_lebar_kurang_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Lebar > 0,8 m</td>
            <td id="iii_lebar_lebih_satuan">{{$detail->iii_lebar_lebih_satuan}} Unit</td>
            <td id="iii_lebar_lebih_harga">X Rp. {{number_format($detail->iii_lebar_lebih_harga)}}</td>
            <td id="iii_lebar_lebih_total">= Rp. {{number_format($detail->iii_lebar_lebih_total)}}</td>
        </tr>
        <tr>
            <td><h4 style="margin-top:0px;margin-bottom:0px;">IV. Pagar</h4></td>
            <td>Batako</td>
            <td id="iv_batako_satuan">{{$detail->iv_batako_satuan}} M<sup>1</sup></td>
            <td id="iv_batako_harga">X Rp. {{number_format($detail->iv_batako_harga)}}</td>
            <td id="iv_batako_total">= Rp. {{number_format($detail->iv_batako_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Bata</td>
            <td id="iv_bata_satuan">{{$detail->iv_bata_satuan}} M<sup>1</sup></td>
            <td id="iv_bata_harga">X Rp. {{number_format($detail->iv_bata_harga)}}</td>
            <td id="iv_bata_total">= Rp. {{number_format($detail->iv_bata_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Beton Pracetak</td>
            <td id="iv_beton_satuan">{{$detail->iv_beton_satuan}} M<sup>1</sup></td>
            <td id="iv_beton_harga">X Rp. {{number_format($detail->iv_beton_harga)}}</td>
            <td id="iv_beton_total">= Rp. {{number_format($detail->iv_beton_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Besi</td>
            <td id="iv_besi_satuan">{{$detail->iv_besi_satuan}} M<sup>1</sup></td>
            <td id="iv_besi_harga">X Rp. {{number_format($detail->iv_besi_harga)}}</td>
            <td id="iv_besi_total">= Rp. {{number_format($detail->iv_besi_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>BRC</td>
            <td id="iv_brc_satuan">{{$detail->iv_brc_satuan}} M<sup>1</sup></td>
            <td id="iv_brc_harga">X Rp. {{number_format($detail->iv_brc_harga)}}</td>
            <td id="iv_brc_total">= Rp. {{number_format($detail->iv_brc_total)}}</td>
        </tr>
        <tr>
            <td><h4 style="margin-top:0px;margin-bottom:0px;">V. Proteksi Api</h4></td>
            <td>Hydrant</td>
            <td id="v_hydrant_satuan">{{$detail->v_hydrant_satuan}} M<sup>2</sup></td>
            <td id="v_hydrant_harga">X Rp. {{number_format($detail->v_hydrant_harga)}}</td>
            <td id="v_hydrant_total">= Rp. {{number_format($detail->v_hydrant_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Sprinkler</td>
            <td id="v_sprinkler_satuan">{{$detail->v_sprinkler_satuan}} M<sup>2</sup></td>
            <td id="v_sprinkler_harga">X Rp. {{number_format($detail->v_sprinkler_harga)}}</td>
            <td id="v_sprinkler_total">= Rp. {{number_format($detail->v_sprinkler_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Alarm</td>
            <td id="v_alarm_satuan">{{$detail->v_alarm_satuan}} M<sup>2</sup></td>
            <td id="v_alarm_harga">X Rp. {{number_format($detail->v_alarm_harga)}}</td>
            <td id="v_alarm_total">= Rp. {{number_format($detail->v_alarm_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Intercom</td>
            <td id="v_intercom_satuan">{{$detail->v_intercom_satuan}} M<sup>2</sup></td>
            <td id="v_intercom_harga">X Rp. {{number_format($detail->v_intercom_harga)}}</td>
            <td id="v_intercom_total">= Rp. {{number_format($detail->v_intercom_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"><h4 style="margin-top:0px;margin-bottom:0px;">VI. Ganset</h4></td>
            <td id="vi_ganset_satuan">{{$detail->vi_ganset_satuan}} KvA</td>
            <td id="vi_ganset_harga">X Rp. {{number_format($detail->vi_ganset_harga)}}</td>
            <td id="vi_ganset_total">= Rp. {{number_format($detail->vi_ganset_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"><h4 style="margin-top:0px;margin-bottom:0px;">VII. PABX</h4></td>
            <td id="vii_pabx_satuan">{{$detail->vii_pabx_satuan}} sat</td>
            <td id="vii_pabx_harga">X Rp. {{number_format($detail->vii_pabx_harga)}}</td>
            <td id="vii_pabx_total">= Rp. {{number_format($detail->vii_pabx_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"><h4 style="margin-top:0px;margin-bottom:0px;">VIII. Sumur artesis</h4></td>
            <td id="viii_sumur_artesis_satuan">{{$detail->viii_sumur_artesis_satuan}} M<sup>2</sup></td>
            <td id="viii_sumur_artesis_harga">X Rp. {{number_format($detail->viii_sumur_artesis_harga)}}</td>
            <td id="viii_sumur_artesis_total">= Rp. {{number_format($detail->viii_sumur_artesis_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"><h4 style="margin-top:0px;margin-bottom:0px;">IX. Sistem air panas</h4></td>
            <td id="ix_sistem_air_panas_satuan">{{$detail->ix_sistem_air_panas_satuan}} M<sup>2</sup></td>
            <td id="ix_sistem_air_panas_harga">X Rp. {{number_format($detail->ix_sistem_air_panas_harga)}}</td>
            <td id="ix_sistem_air_panas_total">= Rp. {{number_format($detail->ix_sistem_air_panas_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"><h4 style="margin-top:0px;margin-bottom:0px;">X. Penangkal petir</h4></td>
            <td id="x_penangkal_petir_satuan">{{$detail->x_penangkal_petir_satuan}} ft</td>
            <td id="x_penangkal_petir_harga">X Rp. {{number_format($detail->x_penangkal_petir_harga)}}</td>
            <td id="x_penangkal_petir_total">= Rp. {{number_format($detail->x_penangkal_petir_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"><h4 style="margin-top:0px;margin-bottom:0px;">XI. Sistem pengolahan limbah</h4></td>
            <td id="xi_sistem_pengolahan_limbah_satuan">{{$detail->xi_sistem_pengolahan_limbah_satuan}} M<sup>2</sup></td>
            <td id="xi_sistem_pengolahan_limbah_harga">X Rp. {{number_format($detail->xi_sistem_pengolahan_limbah_harga)}}</td>
            <td id="xi_sistem_pengolahan_limbah_total">= Rp. {{number_format($detail->xi_sistem_pengolahan_limbah_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"><h4 style="margin-top:0px;margin-bottom:0px;">XII. Sistem tata suara</h4></td>
            <td id="xii_sistem_tata_suara_satuan">{{$detail->xii_sistem_tata_suara_satuan}} M<sup>2</sup></td>
            <td id="xii_sistem_tata_suara_harga">X Rp. {{number_format($detail->xii_sistem_tata_suara_harga)}}</td>
            <td id="xii_sistem_tata_suara_total">= Rp. {{number_format($detail->xii_sistem_tata_suara_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"><h4 style="margin-top:0px;margin-bottom:0px;">XIII. Video intercom</h4></td>
            <td id="xiii_video_intercom_satuan">{{$detail->xiii_video_intercom_satuan}} M<sup>2</sup></td>
            <td id="xiii_video_intercom_harga">X Rp. {{number_format($detail->xiii_video_intercom_harga)}}</td>
            <td id="xiii_video_intercom_total">= Rp. {{number_format($detail->xiii_video_intercom_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"><h4 style="margin-top:0px;margin-bottom:0px;">XIV. Reservoir</h4></td>
            <td id="xiv_reservoir_satuan">{{$detail->xiv_reservoir_satuan}} M<sup>2</sup></td>
            <td id="xiv_reservoir_harga">X Rp. {{number_format($detail->xiv_reservoir_harga)}}</td>
            <td id="xiv_reservoir_total">= Rp. {{number_format($detail->xiv_reservoir_total)}}</td>
        </tr>
        <tr>
            <td><h4 style="margin-top:0px;margin-bottom:0px;">XV. Televisi (TV)</h4></td>
            <td>MATV</td>
            <td id="xv_matv_satuan">{{$detail->xv_matv_satuan}} M<sup>2</sup></td>
            <td id="xv_matv_harga">X Rp. {{number_format($detail->xv_matv_harga)}}</td>
            <td id="xv_matv_total">= Rp. {{number_format($detail->xv_matv_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>CCTV</td>
            <td id="xv_cctv_satuan">{{$detail->xv_cctv_satuan}} M<sup>2</sup></td>
            <td id="xv_cctv_harga">X Rp. {{number_format($detail->xv_cctv_harga)}}</td>
            <td id="xv_cctv_total">= Rp. {{number_format($detail->xv_cctv_total)}}</td>
        </tr>
        <tr>
            <td><h4 style="margin-top:0px;margin-bottom:0px;">XVI. Kolam Renang</h4></td>
            <td>Plester</td>
            <td id="xvi_plester_satuan">{{$detail->xvi_plester_satuan}} M<sup>2</sup></td>
            <td id="xvi_plester_harga">X Rp. {{number_format($detail->xvi_plester_harga)}}</td>
            <td id="xvi_plester_total">= Rp. {{number_format($detail->xvi_plester_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Pelapis</td>
            <td id="xvi_pelapis_satuan">{{$detail->xvi_pelapis_satuan}} M<sup>2</sup></td>
            <td id="xvi_pelapis_harga">X Rp. {{number_format($detail->xvi_pelapis_harga)}}</td>
            <td id="xvi_pelapis_total">= Rp. {{number_format($detail->xvi_pelapis_total)}}</td>
        </tr>
        <tr>
            <td><h4 style="margin-top:0px;margin-bottom:0px;">XVII. Perkerasan</h4></td>
            <td>Ringan</td>
            <td id="xvii_ringan_satuan">{{$detail->xvii_ringan_satuan}} M<sup>2</sup></td>
            <td id="xvii_ringan_harga">X Rp. {{number_format($detail->xvii_ringan_harga)}}</td>
            <td id="xvii_ringan_total">= Rp. {{number_format($detail->xvii_ringan_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Sedang</td>
            <td id="xvii_sedang_satuan">{{$detail->xvii_sedang_satuan}} M<sup>2</sup></td>
            <td id="xvii_sedang_harga">X Rp. {{number_format($detail->xvii_sedang_harga)}}</td>
            <td id="xvii_sedang_total">= Rp. {{number_format($detail->xvii_sedang_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Keras</td>
            <td id="xvii_keras_satuan">{{$detail->xvii_keras_satuan}} M<sup>2</sup></td>
            <td id="xvii_keras_harga">X Rp. {{number_format($detail->xvii_keras_harga)}}</td>
            <td id="xvii_keras_total">= Rp. {{number_format($detail->xvii_keras_total)}}</td>
        </tr>
        <tr>
            <td><h4 style="margin-top:0px;margin-bottom:0px;">XVIII. Lapangan Tenis</h4></td>
            <td colspan="1" class="border-tb">Dengan Lampu</td>
        </tr>
        <tr>
            <td></td>
            <td>Beton</td>
            <td id="xviii_dengan_beton_satuan">{{$detail->xviii_dengan_beton_satuan}} ban</td>
            <td id="xviii_dengan_beton_harga">X Rp. {{number_format($detail->xviii_dengan_beton_harga)}}</td>
            <td id="xviii_dengan_beton_total">= Rp. {{number_format($detail->xviii_dengan_beton_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Aspal</td>
            <td id="xviii_dengan_aspal_satuan">{{$detail->xviii_dengan_aspal_satuan}} ban</td>
            <td id="xviii_dengan_aspal_harga">X Rp. {{number_format($detail->xviii_dengan_aspal_harga)}}</td>
            <td id="xviii_dengan_aspal_total">= Rp. {{number_format($detail->xviii_dengan_aspal_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Tanah Liat</td>
            <td id="xviii_dengan_tanah_liat_satuan">{{$detail->xviii_dengan_tanah_liat_satuan}} ban</td>
            <td id="xviii_dengan_tanah_liat_harga">X Rp. {{number_format($detail->xviii_dengan_tanah_liat_harga)}}</td>
            <td id="xviii_dengan_tanah_liat_total">= Rp. {{number_format($detail->xviii_dengan_tanah_liat_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="1" class="border-tb">Tanpa Lampu</td>
        </tr>
        <tr>
            <td></td>
            <td>Beton</td>
            <td id="xviii_tanpa_beton_satuan">{{$detail->xviii_tanpa_beton_satuan}} ban</td>
            <td id="xviii_tanpa_beton_harga">X Rp. {{number_format($detail->xviii_tanpa_beton_harga)}}</td>
            <td id="xviii_tanpa_beton_total">= Rp. {{number_format($detail->xviii_tanpa_beton_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Aspal</td>
            <td id="xviii_tanpa_aspal_satuan">{{$detail->xviii_tanpa_aspal_satuan}} ban</td>
            <td id="xviii_tanpa_aspal_harga">X Rp. {{number_format($detail->xviii_tanpa_aspal_harga)}}</td>
            <td id="xviii_tanpa_aspal_total">= Rp. {{number_format($detail->xviii_tanpa_aspal_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Tanah Liat</td>
            <td id="xviii_tanpa_tanah_liat_satuan">{{$detail->xviii_tanpa_tanah_liat_satuan}} ban</td>
            <td id="xviii_tanpa_tanah_liat_harga">X Rp. {{number_format($detail->xviii_tanpa_tanah_liat_harga)}}</td>
            <td id="xviii_tanpa_tanah_liat_total">= Rp. {{number_format($detail->xviii_tanpa_tanah_liat_total)}}</td>
        </tr>
        <tr>
            <td colspan="3" class="text-center"><h3>Jumlah Fasilitas</h3></td>
            <td>Rp.</td>
            <td id="jumlah_fasilitas"><h3><u>{{number_format($detail->jumlah_fasilitas)}}</u></h3> </td>
        </tr>
        </tbody>
    </table>
</body>
</html>