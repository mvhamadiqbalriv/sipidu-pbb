<html>
    <style>
        table, th, td {
          border-collapse: collapse;
        }
        th, td {
          text-align: left;    
        }
        td{
            font-size: 13px;
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
    <title>Formulir JBP</title>
</head>
<body>
    <table class="center" width="100%">
        <tbody>
            <tr style="padding-bottom: 10px">
                <td><img src="{{asset('assets/images/sumedang.png')}}"  width="50px;" alt=""></td>
                <td colspan="4"><h3>PERHITUNGAN FORMULIR JBP:  1-2-4-5-6-7-9-11-12-13-16</h3></td>
            </tr>
            <tr>
                <td class="border-tl"><h4><b>Nomor Objek Pajak</b></h4></td>
                <td style="border-top: 1px solid black"><b>: {{$detail->objek_pajak->nop}}</b></td>
                <td style="border-top: 1px solid black"></td>
                <td class="border-tr" colspan="2"></td>
            </tr>
            <tr>
                <td style="border-left: 1px solid black">Jenis Penggunaan</td>
                <td>: {{$detail->objek_pajak->jenis_penggunaan}}</td>
                <td colspan="2">Nomor Bangunan</td>
                <td style="border-right: 1px solid black">: {{$detail->objek_pajak->nomor_bangunan}}</td>
            </tr>
            <tr>
                <td style="border-left: 1px solid black">Nama Wajib Pajak</td>
                <td>: {{$detail->objek_pajak->wajib_pajak}}</td>
                <td colspan="2">Luas Bangunan</td>
                <td style="border-right: 1px solid black">: {{$detail->objek_pajak->luas_bangunan}}</td>
            </tr>
            <tr>
                <td style="border-left: 1px solid black">Alamat Objek Pajak</td>
                <td>: {{$detail->objek_pajak->alamat_objek_pajak}}</td>
                <td colspan="2">Luas Basemen</td>
                <td style="border-right: 1px solid black">: {{$detail->objek_pajak->luas_basemen}}</td>
            </tr>
            <tr>
                <td style="border-left: 1px solid black">Desa / Kelurahan</td>
                <td>: {{$detail->objek_pajak->desa->name}}</td>
                <td colspan="2">Total Luas Bangunan</td>
                <td style="border-right: 1px solid black">: {{$detail->objek_pajak->total_luas_bangunan}}</td>
            </tr>
            <tr>
                <td style="border-left: 1px solid black">Kecamatan</td>
                <td>: {{$detail->objek_pajak->kecamatan->name}}</td>
                <td colspan="2">Jumlah Lantai Bangunan Bangunan</td>
                <td style="border-right: 1px solid black">: {{$detail->objek_pajak->jumlah_lantai_bangunan}}</td>
            </tr>
            <tr>
                <td style="border-left: 1px solid black">Kabupaten</td>
                <td>: Sumedang</td>
                <td colspan="2">Jumlah Lantai Basemen</td>
                <td style="border-right: 1px solid black">: {{$detail->objek_pajak->jumlah_lantai_bangunan}}</td>
            </tr>
            <tr class="border-second">
                <td class="border-bl"></td>
                <td style="border-bottom: 1px solid black"></td>
                <td colspan="2" class="border-b">Tahun Dibangun</td>
                <td class="border-br">: {{$detail->objek_pajak->tahun_dibangun}}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="center" width="100%">
        <tbody>
        <tr>
            <td><h3 style="margin-top:0px;margin-bottom:0px;">I.</h3></td>
            <td colspan="5"><h4 style="margin-top:0px;margin-bottom:0px;">BIAYA KOMPONEN UTAMA</h4></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Struktur Utama</td>
            <td id="i_struktur_utama_satuan">{{$detail->i_struktur_utama_satuan}} M<sup>2</sup></td>
            <td id="i_struktur_utama_harga">X Rp. {{number_format($detail->i_struktur_utama_harga)}}</td>
            <td id="i_struktur_utama_total">= Rp. {{number_format($detail->i_struktur_utama_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Basemen</td>
            <td id="i_basemen_satuan">{{$detail->i_basemen_satuan}} M<sup>2</sup></td>
            <td id="i_basemen_harga">X Rp. {{number_format($detail->i_basemen_harga)}}</td>
            <td id="i_basemen_total">= Rp. {{number_format($detail->i_basemen_total)}}</td>
        </tr>
        <tr>
            <td><h3 style="margin-top:0px;margin-bottom:0px;">II.</h3></td>
            <td colspan="5"><h4 style="margin-top:0px;margin-bottom:0px;">BIAYA KOMPONEN MATERIAL/M2</h4></td>
        </tr>
        <tr>
            <td></td>
            <td>A.</td>
            <td>Material Dinding Dalam</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Struktur Utama</td>
            <td id="iia_struktur_utama_satuan">{{$detail->iia_struktur_utama_satuan}} M<sup>2</sup></td>
            <td id="iia_struktur_utama_harga">X Rp. {{number_format($detail->iia_struktur_utama_harga)}}</td>
            <td id="iia_struktur_utama_total">= Rp. {{number_format($detail->iia_struktur_utama_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>B.</td>
            <td>Material Dinding Luar</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Batu</td>
            <td id="iib_batu_satuan">{{$detail->iib_batu_satuan}} M<sup>2</sup></td>
            <td id="iib_batu_harga">X Rp. {{number_format($detail->iib_batu_harga)}}</td>
            <td id="iib_batu_total">= Rp. {{number_format($detail->iib_batu_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>C.</td>
            <td>Pelapis Dinding Dalam</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>2 Lantai</td>
            <td id="iic_dua_lantai_satuan">{{$detail->iic_dua_lantai_satuan}} M<sup>2</sup></td>
            <td id="iic_dua_lantai_harga">X Rp. {{number_format($detail->iic_dua_lantai_harga)}}</td>
            <td id="iic_dua_lantai_total">= Rp. {{number_format($detail->iic_dua_lantai_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>D.</td>
            <td>Pelapis Dinding Luar</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>2 Lantai</td>
            <td id="iid_dua_lantai_satuan">{{$detail->iid_dua_lantai_satuan}} M<sup>2</sup></td>
            <td id="iid_dua_lantai_harga">X Rp. {{number_format($detail->iid_dua_lantai_harga)}}</td>
            <td id="iid_dua_lantai_total">= Rp. {{number_format($detail->iid_dua_lantai_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>E.</td>
            <td>Langit-langit</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>2 Lantai</td>
            <td id="iie_dua_lantai_satuan">{{$detail->iie_dua_lantai_satuan}} M<sup>2</sup></td>
            <td id="iie_dua_lantai_harga">X Rp. {{number_format($detail->iie_dua_lantai_harga)}}</td>
            <td id="iie_dua_lantai_total">= Rp. {{number_format($detail->iie_dua_lantai_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>F.</td>
            <td>Penutup Atap</td>
            <td id="iif_penutup_atap_satuan">{{$detail->iif_penutup_atap_satuan}} M<sup>2</sup></td>
            <td id="iif_penutup_atap_harga">X Rp. {{number_format($detail->iif_penutup_atap_harga)}}</td>
            <td id="iif_penutup_atap_total">= Rp. {{number_format($detail->iif_penutup_atap_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>G.</td>
            <td>Penutup Lantai</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>2 Lantai</td>
            <td id="iig_dua_lantai_satuan">{{$detail->iig_dua_lantai_satuan}} M<sup>2</sup></td>
            <td id="iig_dua_lantai_harga">X Rp. {{number_format($detail->iig_dua_lantai_harga)}}</td>
            <td id="iig_dua_lantai_total">= Rp. {{number_format($detail->iig_dua_lantai_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>H.</td>
            <td>Sanitasi</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Super Struktur</td>
            <td id="iih_super_struktur_satuan">{{$detail->iih_super_struktur_satuan}} M<sup>2</sup></td>
            <td id="iih_super_struktur_harga">X Rp. {{number_format($detail->iih_super_struktur_harga)}}</td>
            <td id="iih_super_struktur_total">= Rp. {{number_format($detail->iih_super_struktur_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Basemen</td>
            <td id="iih_basemen_satuan">{{$detail->iih_basemen_satuan}} M<sup>2</sup></td>
            <td id="iih_basemen_harga">X Rp. {{number_format($detail->iih_basemen_harga)}}</td>
            <td id="iih_basemen_total">= Rp. {{number_format($detail->iih_basemen_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td>I.</td>
            <td>Plumbing</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Super Struktur</td>
            <td id="iii_super_struktur_satuan">{{$detail->iii_super_struktur_satuan}} M<sup>2</sup></td>
            <td id="iii_super_struktur_harga">X Rp. {{number_format($detail->iii_super_struktur_harga)}}</td>
            <td id="iii_super_struktur_total">= Rp. {{number_format($detail->iii_super_struktur_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Basemen</td>
            <td id="iii_basemen_satuan">{{$detail->iii_basemen_satuan}} M<sup>2</sup></td>
            <td id="iii_basemen_harga">X Rp. {{number_format($detail->iii_basemen_harga)}}</td>
            <td id="iii_basemen_total">= Rp. {{number_format($detail->iii_basemen_total)}}</td>
        </tr>
        <tr>
            <td><h3 style="margin-top:0px;margin-bottom:0px;">III.</h3></td>
            <td colspan="5"><h4 style="margin-top:0px;margin-bottom:0px;">BIAYA KOMPONEN FASILITAS</h4></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Fasilitas Pendukung (dari formulir fasilitas)</td>
            <td id="iii_fasilitas_pendukung">Rp. {{number_format($detail->iii_fasilitas_pendukung)}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Nilai sebelum disusutkan</td>
            <td id="iii_nilai_sebelum_disusutkan">Rp. {{number_format($detail->iii_nilai_sebelum_disusutkan)}}</td>
        </tr>
        <tr>
            <td><h3 style="margin-top:0px;margin-bottom:0px;">IV.</h3></td>
            <td colspan="5"><h4 style="margin-top:0px;margin-bottom:0px;">PENYUSUTAN</h4></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Nilai Penyusutan</td>
            <td id="iv_nilai_penyusutan_satuan">{{$detail->iv_nilai_penyusutan_satuan}} %</td>
            <td id="iv_nilai_penyusutan_harga">X Rp. {{number_format($detail->iv_nilai_penyusutan_harga)}}</td>
            <td id="iv_nilai_penyusutan_total">= Rp. {{number_format($detail->iv_nilai_penyusutan_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Nilai setelah disusutkan</td>
            <td id="iv_nilai_sebelum_disusutkan">Rp. </td>
        </tr>
        <tr>
            <td><h3 style="margin-top:0px;margin-bottom:0px;">V.</h3></td>
            <td colspan="5"><h4 style="margin-top:0px;margin-bottom:0px;">FASILITAS (tidak perlu disusutkan)</h4></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>Daya Listrik</td>
            <td id="v_daya_listrik_satuan">{{$detail->v_daya_listrik_satuan}} KvA</td>
            <td id="v_daya_listrik_harga">X Rp. {{number_format($detail->v_daya_listrik_harga)}}</td>
            <td id="v_daya_listrik_total">= Rp. {{number_format($detail->v_daya_listrik_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>AC Split</td>
            <td id="v_ac_split_satuan">{{$detail->v_ac_split_satuan}} Buah</td>
            <td id="v_ac_split_harga">X Rp. {{number_format($detail->v_ac_split_harga)}}</td>
            <td id="v_ac_split_total">= Rp. {{number_format($detail->v_ac_split_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>AC Window</td>
            <td id="v_ac_window_satuan">{{$detail->v_ac_window_satuan}} Buah</td>
            <td id="v_ac_window_harga">X Rp. {{number_format($detail->v_ac_window_harga)}}</td>
            <td id="v_ac_window_total">= Rp. {{number_format($detail->v_ac_window_total)}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>AC Floor</td>
            <td id="v_ac_floor_satuan">{{$detail->v_ac_floor_satuan}} Buah</td>
            <td id="v_ac_floor_harga">X Rp. {{number_format($detail->v_ac_floor_harga)}}</td>
            <td id="v_ac_floor_total">= Rp. {{number_format($detail->v_ac_floor_total)}}</td>
        </tr>
        <tr>
            <td></td>
            <td><h3>Nilai Bangunan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></td>
            <td></td>
            <td>Rp.</td>
            <td id="nilai_bangunan"><h3><u>{{number_format($detail->nilai_bangunan)}}</u></h3></td>
        </tr>
        <tr>
            <td></td>
            <td><h3>Nilai Bangunan / M<sup>2</sup></h3></td>
            <td></td>
            <td>Rp.</td>
            <td id="nilai_bangunan_m2"><h3><u>{{number_format($detail->nilai_bangunan_m2)}}</u></h3></td>
        </tr>
        </tbody>
    </table>
</body>
</html>