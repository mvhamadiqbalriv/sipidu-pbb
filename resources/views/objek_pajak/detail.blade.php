@extends('layouts.app')
@section('title')
    {{$detail->wajib_pajak}}
@endsection
@section('css')
    <!-- third party css -->
    <link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="wrapper">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{url('objek-pajak')}}">Objek Pajak</a></li>
                            <li class="breadcrumb-item active">{{$detail->wajib_pajak}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{$detail->wajib_pajak}}</h4>
                </div>
            </div>
        </div>  
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table style="width: 100%" class="table"> 
                        <thead>
                            <th>
                                <td span="1"><img src="{{asset('assets/images/sumedang.png')}}" style="width:100px" alt=""></td>
                                <td span="5"><h1>NOP : <br> {{$detail->nop}}</h1></td>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width:15%">Jenis Penggunaan</td>
                                <td style="width:35%"><h5>: &nbsp; {{$detail->jenis_penggunaan}}</h5></td>
                                <td style="width:15%">Nomor Bangunan lorem</td>
                                <td style="width:35%"><h5>: &nbsp; {{$detail->nomor_bangunan}}</h5></td>
                            </tr>
                            <tr>
                                <td style="width:15%">Nama Wajib Pajak</td>
                                <td style="width:35%"><h5>: &nbsp; {{$detail->wajib_pajak}}</h5></td>
                                <td style="width:15%">Luas Bangunan</td>
                                <td style="width:35%"><h5>: &nbsp; {{$detail->luas_bangunan}}</h5></td>
                            </tr>
                            <tr>
                                <td style="width:15%">Alamat Objek Pajak</td>
                                <td style="width:35%"><h5>: &nbsp; {{$detail->alamat_objek_pajak}}</h5></td>
                                <td style="width:15%">Luas Basemen</td>
                                <td style="width:35%"><h5>: &nbsp; {{$detail->luas_basemen}}</h5></td>
                            </tr>
                            <tr>
                                <td style="width:15%">Desa / Kelurahan</td>
                                <td style="width:35%"><h5>: &nbsp; {{$detail->desa->name}}</h5></td>
                                <td style="width:15%">Total Luas Bangunan</td>
                                <td style="width:35%"><h5>: &nbsp; {{$detail->total_luas_bangunan}}</h5></td>
                            </tr>
                            <tr>
                                <td style="width:15%">Kecamatan</td>
                                <td style="width:35%"><h5>: &nbsp; {{$detail->kecamatan->name}}</h5></td>
                                <td style="width:15%">Jumlah Lantai Bangunan</td>
                                <td style="width:35%"><h5>: &nbsp; {{$detail->jumlah_lantai_bangunan}}</h5></td>
                            </tr>
                            <tr>
                                <td style="width:15%">Kabupaten</td>
                                <td style="width:35%"><h5>: &nbsp; Sumedang</h5></td>
                                <td style="width:15%">Jumlah Lantai Basemen</td>
                                <td style="width:35%"><h5>: &nbsp; {{$detail->jumlah_lantai_basemen}}</h5></td>
                            </tr>
                            <tr>
                                <td style="width:15%"></td>
                                <td style="width:15%"></td>
                                <td style="width:15%">Tahun Dibangun</td>
                                <td style="width:35%"><h5>: &nbsp; {{$detail->tahun_dibangun}}</h5></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- end col -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title">Fasilitas Bangunan</h4>
                    <p class="sub-header">
                        <a href="{{route('fasilitas-bangunan.create')}}?id={{$detail->id}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah </a>
                    </p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jumlah Nilai Fasilitas Bangungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($fasilitas_bangunan as $item)
                                <tr id="fasilitasBangunan_{{$item->id}}">
                                    <td>{{$no++}}</td>
                                    <td><a href="javascript:void(0)" onclick="fasilitasBangunanModal({{$item->id}})">Rp. {{number_format($item->jumlah_fasilitas)}}</a></td>
                                    <td>
                                        <a href="{{route('fasilitas-bangunan.edit',$item->id)}}?id={{$item->objek_pajak_id}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button onclick="deleteFasilitasBangunan({{$item->id}})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                        <a href="{{route('fasilitas-bangunan.create-pdf',$item->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-file"></i> Export PDF</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title">JBP</h4>
                    @if ($fasilitas_bangunan->isNotEmpty())
                        <p class="sub-header">
                            <a href="{{route('jbp.create')}}?id={{$detail->id}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Tambah </a>
                        </p>
                    @endif
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nilai Bangunan</th>
                                <th>Ref. Fasilitas Bangunan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($jbp as $item)
                                <tr id="jbp_{{$item->id}}">
                                    <td>{{$no++}}</td>
                                    <td><a href="javascript:void(0)" onclick="jbpModal({{$item->id}})">Rp. {{number_format($item->nilai_bangunan)}}</a></td>
                                    <td><a href="javascript:void(0)" onclick="fasilitasBangunanModal({{$item->fasilitas_bangunan_id}})">Rp. {{number_format($item->fasilitas_bangunan->jumlah_fasilitas)}}</a></td>
                                    <td>
                                        <a href="{{route('jbp.edit',$item->id)}}?id={{$item->objek_pajak_id}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button onclick="deleteJbp({{$item->id}})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                        <a href="{{route('jbp.create-pdf',$item->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-file"></i> Export PDF</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- end row -->

        <div class="modal fade bs-example-modal-xl" id="fasilitasBangunanModal" tabindex="-1" role="dialog" aria-labelledby="fasilitasBangunanModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="fasilitasBangunanModalLabel">Rincian Fasilitas Bangunan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                <tr>
                                    <th># Uraian</th>
                                    <th>Sub</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td rowspan="3">I. AC CENTRAL JPB</td>
                                    <td>Bangunan Lain</td>
                                    <td id="i_bangunan_lain_satuan"></td>
                                    <td id="i_bangunan_lain_harga">Rp.</td>
                                    <td id="i_bangunan_lain_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Kamar</td>
                                    <td id="i_kamar_satuan"></td>
                                    <td id="i_kamar_harga">Rp.</td>
                                    <td id="i_kamar_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Ruangan Lain</td>
                                    <td id="i_ruangan_lain_satuan"></td>
                                    <td id="i_ruangan_lain_harga">Rp.</td>
                                    <td id="i_ruangan_lain_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">II. Lift</td>
                                    <td>Penumpang</td>
                                    <td id="ii_penumpang_satuan"></td>
                                    <td id="ii_penumpang_harga">Rp.</td>
                                    <td id="ii_penumpang_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Barang</td>
                                    <td id="ii_barang_satuan"></td>
                                    <td id="ii_barang_harga">Rp.</td>
                                    <td id="ii_barang_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">III. Escalator</td>
                                    <td>Lebar < 0,8 m</td>
                                    <td id="iii_lebar_kurang_satuan"></td>
                                    <td id="iii_lebar_kurang_harga">Rp.</td>
                                    <td id="iii_lebar_kurang_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Lebar > 0,8 m</td>
                                    <td id="iii_lebar_lebih_satuan"></td>
                                    <td id="iii_lebar_lebih_harga">Rp.</td>
                                    <td id="iii_lebar_lebih_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td rowspan="5">IV. Pagar</td>
                                    <td>Batako</td>
                                    <td id="iv_batako_satuan"></td>
                                    <td id="iv_batako_harga">Rp.</td>
                                    <td id="iv_batako_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Bata</td>
                                    <td id="iv_bata_satuan"></td>
                                    <td id="iv_bata_harga">Rp.</td>
                                    <td id="iv_bata_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Beton Pracetak</td>
                                    <td id="iv_beton_pracetak_satuan"></td>
                                    <td id="iv_beton_pracetak_harga">Rp.</td>
                                    <td id="iv_beton_pracetak_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Besi</td>
                                    <td id="iv_besi_satuan"></td>
                                    <td id="iv_besi_harga">Rp.</td>
                                    <td id="iv_besi_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>BRC</td>
                                    <td id="iv_brc_satuan"></td>
                                    <td id="iv_brc_harga">Rp.</td>
                                    <td id="iv_brc_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td rowspan="4">V. Proteksi Api</td>
                                    <td>Hydrant</td>
                                    <td id="v_hydrant_satuan"></td>
                                    <td id="v_hydrant_harga">Rp.</td>
                                    <td id="v_hydrant_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Sprinkler</td>
                                    <td id="v_sprinkler_satuan"></td>
                                    <td id="v_sprinkler_harga">Rp.</td>
                                    <td id="v_sprinkler_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Alarm</td>
                                    <td id="v_alarm_satuan"></td>
                                    <td id="v_alarm_harga">Rp.</td>
                                    <td id="v_alarm_total">Rp.</td>
                                </tr>
                                <tr>
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
                                    <td rowspan="2">XV. Televisi (TV)</td>
                                    <td>MATV</td>
                                    <td id="xv_matv_satuan"></td>
                                    <td id="xv_matv_harga">Rp.</td>
                                    <td id="xv_matv_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>CCTV</td>
                                    <td id="xv_cctv_satuan"></td>
                                    <td id="xv_cctv_harga">Rp.</td>
                                    <td id="xv_cctv_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">XVI. Kolam Renang</td>
                                    <td>Plester</td>
                                    <td id="xvi_plester_satuan"></td>
                                    <td id="xvi_plester_harga">Rp.</td>
                                    <td id="xvi_plester_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Pelapis</td>
                                    <td id="xvi_pelapis_satuan"></td>
                                    <td id="xvi_pelapis_harga">Rp.</td>
                                    <td id="xvi_pelapis_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td rowspan="3">XVII. Perkerasan</td>
                                    <td>Ringan</td>
                                    <td id="xvii_ringan_satuan"></td>
                                    <td id="xvii_ringan_harga">Rp.</td>
                                    <td id="xvii_ringan_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Sedang</td>
                                    <td id="xvii_sedang_satuan"></td>
                                    <td id="xvii_sedang_harga">Rp.</td>
                                    <td id="xvii_sedang_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Keras</td>
                                    <td id="xvii_keras_satuan"></td>
                                    <td id="xvii_keras_harga">Rp.</td>
                                    <td id="xvii_keras_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td rowspan="8">XVIII. Lapangan Tenis</td>
                                    <td colspan="4">Dengan Lampu</td>
                                </tr>
                                <tr>
                                    <td>Beton</td>
                                    <td id="xviii_dengan_beton_satuan"></td>
                                    <td id="xviii_dengan_beton_harga">Rp.</td>
                                    <td id="xviii_dengan_beton_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Aspal</td>
                                    <td id="xviii_dengan_aspal_satuan"></td>
                                    <td id="xviii_dengan_aspal_harga">Rp.</td>
                                    <td id="xviii_dengan_aspal_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Tanah Liat</td>
                                    <td id="xviii_dengan_tanah_liat_satuan"></td>
                                    <td id="xviii_dengan_tanah_liat_harga">Rp.</td>
                                    <td id="xviii_dengan_tanah_liat_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Tanpa Lampu</td>
                                </tr>
                                <tr>
                                    <td>Beton</td>
                                    <td id="xviii_tanpa_beton_satuan"></td>
                                    <td id="xviii_tanpa_beton_harga">Rp.</td>
                                    <td id="xviii_tanpa_beton_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Aspal</td>
                                    <td id="xviii_tanpa_aspal_satuan"></td>
                                    <td id="xviii_tanpa_aspal_harga">Rp.</td>
                                    <td id="xviii_tanpa_aspal_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td>Tanah Liat</td>
                                    <td id="xviii_tanpa_tanah_liat_satuan"></td>
                                    <td id="xviii_tanpa_tanah_liat_harga">Rp.</td>
                                    <td id="xviii_tanpa_tanah_liat_total">Rp.</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-center">Jumlah Fasilitas</td>
                                    <td id="jumlah_fasilitas">Rp.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>

        <div class="modal fade bs-example-modal-xl" id="jbpModal" tabindex="-1" role="dialog" aria-labelledby="jbpModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="jbpModalLabel">Rincian JBP</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                <tr>
                                    <th># Uraian</th>
                                    <th>##</th>
                                    <th>Sub</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="5">I. BIAYA KOMPONEN UTAMA</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Struktur Utama</td>
                                    <td id="i_struktur_utama_satuan"></td>
                                    <td id="i_struktur_utama_harga">Rp. </td>
                                    <td id="i_struktur_utama_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Basemen</td>
                                    <td id="i_basemen_satuan"></td>
                                    <td id="i_basemen_harga">Rp. </td>
                                    <td id="i_basemen_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="5">II. BIAYA KOMPONEN MATERIAL/M2</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>A.</td>
                                    <td>Material Dinding Dalam</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Struktur Utama</td>
                                    <td id="iia_struktur_utama_satuan"></td>
                                    <td id="iia_struktur_utama_harga">Rp. </td>
                                    <td id="iia_struktur_utama_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>B.</td>
                                    <td>Material Dinding Luar</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Batu</td>
                                    <td id="iib_batu_satuan"></td>
                                    <td id="iib_batu_harga">Rp. </td>
                                    <td id="iib_batu_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>C.</td>
                                    <td>Pelapis Dinding Dalam</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>2 Lantai</td>
                                    <td id="iic_dua_lantai_satuan"></td>
                                    <td id="iic_dua_lantai_harga">Rp. </td>
                                    <td id="iic_dua_lantai_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>D.</td>
                                    <td>Pelapis Dinding Luar</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>2 Lantai</td>
                                    <td id="iid_dua_lantai_satuan"></td>
                                    <td id="iid_dua_lantai_harga">Rp. </td>
                                    <td id="iid_dua_lantai_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>E.</td>
                                    <td>Langit-langit</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>2 Lantai</td>
                                    <td id="iie_dua_lantai_satuan"></td>
                                    <td id="iie_dua_lantai_harga">Rp. </td>
                                    <td id="iie_dua_lantai_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>F.</td>
                                    <td>Penutup Atap</td>
                                    <td id="iif_penutup_atap_satuan"></td>
                                    <td id="iif_penutup_atap_harga">Rp. </td>
                                    <td id="iif_penutup_atap_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>G.</td>
                                    <td>Penutup Lantai</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>2 Lantai</td>
                                    <td id="iig_dua_lantai_satuan"></td>
                                    <td id="iig_dua_lantai_harga">Rp. </td>
                                    <td id="iig_dua_lantai_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>H.</td>
                                    <td>Sanitasi</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Super Struktur</td>
                                    <td id="iih_super_struktur_satuan"></td>
                                    <td id="iih_super_struktur_harga">Rp. </td>
                                    <td id="iih_super_struktur_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Basemen</td>
                                    <td id="iih_basemen_satuan"></td>
                                    <td id="iih_basemen_harga">Rp. </td>
                                    <td id="iih_basemen_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>I.</td>
                                    <td>Plumbing</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Super Struktur</td>
                                    <td id="iii_super_struktur_satuan"></td>
                                    <td id="iii_super_struktur_harga">Rp. </td>
                                    <td id="iii_super_struktur_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Basemen</td>
                                    <td id="iii_basemen_satuan"></td>
                                    <td id="iii_basemen_harga">Rp. </td>
                                    <td id="iii_basemen_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="5">III. BIAYA KOMPONEN FASILITAS</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Fasilitas Pendukung (dari formulir fasilitas)</td>
                                    <td id="iii_fasilitas_pendukung">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Nilai sebelum disusutkan</td>
                                    <td id="iii_nilai_sebelum_disusutkan">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="5">IV.PENYUSUTAN</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Nilai Penyusutan</td>
                                    <td id="iv_nilai_penyusutan_satuan"></td>
                                    <td id="iv_nilai_penyusutan_harga">Rp. </td>
                                    <td id="iv_nilai_penyusutan_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Nilai setelah disusutkan</td>
                                    <td id="iv_nilai_sebelum_disusutkan">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="5">V. FASILITAS (tidak perlu disusutkan)</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Daya Listrik</td>
                                    <td id="v_daya_listrik_satuan"></td>
                                    <td id="v_daya_listrik_harga">Rp. </td>
                                    <td id="v_daya_listrik_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>AC Split</td>
                                    <td id="v_ac_split_satuan"></td>
                                    <td id="v_ac_split_harga">Rp. </td>
                                    <td id="v_ac_split_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>AC Window</td>
                                    <td id="v_ac_window_satuan"></td>
                                    <td id="v_ac_window_harga">Rp. </td>
                                    <td id="v_ac_window_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>AC Floor</td>
                                    <td id="v_ac_floor_satuan"></td>
                                    <td id="v_ac_floor_harga">Rp. </td>
                                    <td id="v_ac_floor_total">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Nilai Bangunan</td>
                                    <td id="nilai_bangunan">Rp. </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>Nilai Bangunan / M<sup>2</sup></td>
                                    <td id="nilai_bangunan_m2">Rp. </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>


    </div> <!-- end container -->
</div>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <!-- third party js -->
       <script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
       <script src="{{asset('assets/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
       <script src="{{asset('assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
   
       <!-- Tickets js -->
       <script src="{{asset('assets/js/pages/tickets.init.js')}}"></script>

       <script>

        async function fasilitasBangunanModal(id) {
                const formatter = new Intl.NumberFormat('en-US');
                var _token = "{{ csrf_token() }}"
    
                try {
                    let response = await fetch("{{ route('directory-fasilitas-bangunan-by-id') }}", {
                        method: "POST",
                        body: JSON.stringify({
                            id: id
                        }),
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": _token,
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    });
                    var datasend = await response.json();
                    if (datasend !== undefined) {
                        for(let key in datasend) {
                            if (key == 'id' | key == 'objek_pajak_id' | key == 'creator_id' | key == 'updator_id'| key == 'created_at' | key == 'updated_at') {
                                continue;
                            }
                            $('#'+key).append(formatter.format(datasend[key]));
                        }
                        $('#fasilitasBangunanModal').modal('show');
                    }
    
                } catch (err) {
                    console.log(err);
                }
        }

        function deleteFasilitasBangunan(id) {
            Swal.fire({
                title: 'Apakah kamu yakin menghapus Fasilitas Bangunan ini?',
                icon: 'info',
                confirmButtonText: `Ya, Hapus !`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('fasilitas-bangunan.fasilitas-bangunan-delete') }}",
                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },

                        success: function(result) {
                            Swal.fire('Data Fasilitas Bangunan berhasil dihapus', '', 'success')
                            $('#fasilitasBangunan_' + id).remove();
                        }
                    });
                } else {
                    Swal.fire('Fasilitas bangunan gagal dihapus', '', 'danger')
                }
            });
        }

        async function jbpModal(id) {
                const formatter = new Intl.NumberFormat('en-US');
                var _token = "{{ csrf_token() }}"
    
                try {
                    let response = await fetch("{{ route('directory-jbp-by-id') }}", {
                        method: "POST",
                        body: JSON.stringify({
                            id: id
                        }),
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": _token,
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    });
                    var datasend = await response.json();
                    if (datasend !== undefined) {
                        for(let key in datasend) {
                            if (key == 'id' | key == 'objek_pajak_id' | key == 'fasilitas_bangunan_id' | key == 'creator_id' | key == 'updator_id'| key == 'created_at' | key == 'updated_at') {
                                continue;
                            }
                            $('#'+key).append(formatter.format(datasend[key]));
                        }
                        $('#jbpModal').modal('show');
                    }
    
                } catch (err) {
                    console.log(err);
                }
        }

        function deleteJbp(id) {
            Swal.fire({
                title: 'Apakah kamu yakin menghapus JBP ini?',
                icon: 'info',
                confirmButtonText: `Ya, Hapus !`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('jbp.jbp-delete') }}",
                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },

                        success: function(result) {
                            Swal.fire('Data JBP berhasil dihapus', '', 'success')
                            $('#jbp_' + id).remove();
                        }
                    });
                } else {
                    Swal.fire('JBP gagal dihapus', '', 'danger')
                }
            });
        }
    </script>
@endsection