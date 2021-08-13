@extends('layouts.app')
@section('title')
    Tambah Fasilitas Bangunan
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
                            <li class="breadcrumb-item active">FORM FASILITAS BANGUNAN</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title">Tambah Fasilitas Bangunan</h4>
                    <p class="sub-header">
                        NB: Formulir dengan label bertanda (<span class="text-danger">*</span>) Wajib diisi !
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div>
                                <form class="form-horizontal" action="{{route('fasilitas-bangunan.store')}}" role="form" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Objek Pajak
                                            <sup class="text-danger">*</sup> </label>
                                        <div class="col-md-7">
                                            <select name="objek_pajak_id" value="{{old('objek_pajak_id')}}" class="form-control @error('objek_pajak_id') is-invalid @enderror" id="">
                                                <option value="{{$objek_pajak->id}}" readonly>NOP : <b>{{$objek_pajak->nop}}</b> | Wajib Pajak : <b>{{$objek_pajak->wajib_pajak}}</b></option>
                                            </select>
                                            @error('objek_pajak_id')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>I. AC CENTRAL JBP</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Bangunan Lain
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="i_bangunan_lain_satuan" value="{{old('i_bangunan_lain_satuan') ?? 0}}" class="form-control @error('i_bangunan_lain_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                            @error('i_bangunan_lain_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="i_bangunan_lain_harga" value="{{old('i_bangunan_lain_harga') ?? 0}}" class="form-control @error('i_bangunan_lain_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('i_bangunan_lain_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Kamar
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="i_kamar_satuan" value="{{old('i_kamar_satuan') ?? 0}}" class="form-control @error('i_kamar_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                
                                                @error('i_kamar_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="i_kamar_harga" value="{{old('i_kamar_harga') ?? 0}}" class="form-control @error('i_kamar_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('i_kamar_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Ruangan Lain
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="i_ruangan_lain_satuan" value="{{old('i_ruangan_lain_satuan') ?? 0}}" class="form-control @error('i_ruangan_lain_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                
                                                @error('i_ruangan_lain_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="i_ruangan_lain_harga" value="{{old('i_ruangan_lain_harga') ?? 0}}" class="form-control @error('i_ruangan_lain_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('i_ruangan_lain_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>II. LIFT</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Penumpang
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="ii_penumpang_satuan" value="{{old('ii_penumpang_satuan') ?? 0}}" class="form-control @error('ii_penumpang_satuan') is-invalid @enderror"
                                                placeholder="Masukan jumlah (unit)">
                                                <small>
                                                    <i>Masukan jumlah (unit)</i>
                                                </small>
                                                @error('ii_penumpang_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="ii_penumpang_harga" value="{{old('ii_penumpang_harga') ?? 0}}" class="form-control @error('ii_penumpang_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('ii_penumpang_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Barang
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="ii_barang_satuan" value="{{old('ii_barang_satuan') ?? 0}}" class="form-control @error('ii_barang_satuan') is-invalid @enderror"
                                                placeholder="Masukan jumlah (unit)">
                                                <small>
                                                    <i>Masukan jumlah (unit)</i>
                                                </small>
                                                @error('ii_barang_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="ii_barang_harga" value="{{old('ii_barang_harga') ?? 0}}" class="form-control @error('ii_barang_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('ii_barang_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>III. ESCALATOR</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Lebar < 0,8 m
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iii_lebar_kurang_satuan" value="{{old('iii_lebar_kurang_satuan') ?? 0}}" class="form-control @error('iii_lebar_kurang_satuan') is-invalid @enderror"
                                                placeholder="Masukan jumlah (unit)">
                                                <small>
                                                    <i>Masukan jumlah (unit)</i>
                                                </small>
                                                @error('ii_penumpang_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iii_lebar_kurang_harga" value="{{old('iii_lebar_kurang_harga') ?? 0}}" class="form-control @error('iii_lebar_kurang_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('ii_penumpang_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Lebar > 0,8 m
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iii_lebar_lebih_satuan" value="{{old('iii_lebar_lebih_satuan') ?? 0}}" class="form-control @error('iii_lebar_lebih_satuan') is-invalid @enderror"
                                                placeholder="Masukan jumlah (unit)">
                                                <small>
                                                    <i>Masukan jumlah (unit)</i>
                                                </small>
                                                @error('iii_lebar_lebih_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iii_lebar_lebih_harga" value="{{old('iii_lebar_lebih_harga') ?? 0}}" class="form-control @error('iii_lebar_lebih_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iii_lebar_lebih_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>IV. PAGAR</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Batako
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iv_batako_satuan" value="{{old('iv_batako_satuan') ?? 0}}" class="form-control @error('iv_batako_satuan') is-invalid @enderror"
                                                placeholder="Masukan batako (m1)">
                                                <small>
                                                    <i>Masukan batako (m<sup>1</sup>)</i>
                                                </small>
                                                @error('iv_batako_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iv_batako_harga" value="{{old('iv_batako_harga') ?? 0}}" class="form-control @error('iv_batako_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iv_batako_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Bata
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iv_bata_satuan" value="{{old('iv_bata_satuan') ?? 0}}" class="form-control @error('iv_bata_satuan') is-invalid @enderror"
                                                placeholder="Masukan bata (m1)">
                                                <small>
                                                    <i>Masukan bata (m<sup>1</sup>)</i>
                                                </small>
                                                @error('iv_bata_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iv_bata_harga" value="{{old('iv_bata_harga') ?? 0}}" class="form-control @error('iv_bata_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iv_bata_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Beton Pracetak
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iv_beton_pracetak_satuan" value="{{old('iv_beton_pracetak_satuan') ?? 0}}" class="form-control @error('iv_beton_pracetak_satuan') is-invalid @enderror"
                                                placeholder="Masukan beton pracetak (m1)">
                                                <small>
                                                    <i>Masukan beton pracetak (m<sup>1</sup>)</i>
                                                </small>
                                                @error('iv_beton_pracetak_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iv_beton_pracetak_harga" value="{{old('iv_beton_pracetak_harga') ?? 0}}" class="form-control @error('iv_beton_pracetak_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iv_beton_pracetak_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Besi
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iv_besi_satuan" value="{{old('iv_besi_satuan') ?? 0}}" class="form-control @error('iv_besi_satuan') is-invalid @enderror"
                                                placeholder="Masukan besi (m1)">
                                                <small>
                                                    <i>Masukan besi (m<sup>1</sup>)</i>
                                                </small>
                                                @error('iv_besi_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iv_besi_harga" value="{{old('iv_besi_harga') ?? 0}}" class="form-control @error('iv_besi_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iv_besi_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                BRC
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iv_brc_satuan" value="{{old('iv_brc_satuan') ?? 0}}" class="form-control @error('iv_brc_satuan') is-invalid @enderror"
                                                placeholder="Masukan brc (m1)">
                                                <small>
                                                    <i>Masukan brc (m<sup>1</sup>)</i>
                                                </small>
                                                @error('iv_brc_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iv_brc_harga" value="{{old('iv_brc_harga') ?? 0}}" class="form-control @error('iv_brc_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iv_brc_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>V. PROTEKSI API</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Hydrant
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="v_hydrant_satuan" value="{{old('v_hydrant_satuan') ?? 0}}" class="form-control @error('v_hydrant_satuan') is-invalid @enderror"
                                                placeholder="Masukan hydrant (m2)">
                                                <small>
                                                    <i>Masukan hydrant (m<sup>2</sup>)</i>
                                                </small>
                                                @error('v_hydrant_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="v_hydrant_harga" value="{{old('v_hydrant_harga') ?? 0}}" class="form-control @error('v_hydrant_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('v_hydrant_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Sprinkler
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="v_sprinkler_satuan" value="{{old('v_sprinkler_satuan') ?? 0}}" class="form-control @error('v_sprinkler_satuan') is-invalid @enderror"
                                                placeholder="Masukan sprinkler (m2)">
                                                <small>
                                                    <i>Masukan sprinkler (m<sup>2</sup>)</i>
                                                </small>
                                                @error('v_sprinkler_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="v_sprinkler_harga" value="{{old('v_sprinkler_harga') ?? 0}}" class="form-control @error('v_sprinkler_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('v_sprinkler_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Alarm
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="v_alarm_satuan" value="{{old('v_alarm_satuan') ?? 0}}" class="form-control @error('v_alarm_satuan') is-invalid @enderror"
                                                placeholder="Masukan alarm (m2)">
                                                <small>
                                                    <i>Masukan alarm (m<sup>2</sup>)</i>
                                                </small>
                                                @error('v_alarm_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="v_alarm_harga" value="{{old('v_alarm_harga') ?? 0}}" class="form-control @error('v_alarm_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('v_alarm_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Intercom
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="v_intercom_satuan" value="{{old('v_intercom_satuan') ?? 0}}" class="form-control @error('v_intercom_satuan') is-invalid @enderror"
                                                placeholder="Masukan intercom (m2)">
                                                <small>
                                                    <i>Masukan intercom (m<sup>2</sup>)</i>
                                                </small>
                                                @error('v_intercom_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="v_intercom_harga" value="{{old('v_intercom_harga') ?? 0}}" class="form-control @error('v_intercom_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('v_intercom_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-2">
                                                <h6>VI. Ganset</h6>
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="vi_ganset_satuan" value="{{old('vi_ganset_satuan') ?? 0}}" class="form-control @error('vi_ganset_satuan') is-invalid @enderror"
                                                placeholder="Masukan power ganset (KVA)">
                                                <small>
                                                    <i>Masukan power ganset (KVA)</i>
                                                </small>
                                                @error('vi_ganset_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="vi_ganset_harga" value="{{old('vi_ganset_harga') ?? 0}}" class="form-control @error('vi_ganset_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('vi_ganset_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-2">
                                                <h6>VII. PABX</h6>
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="vii_pabx_satuan" value="{{old('vii_pabx_satuan') ?? 0}}" class="form-control @error('vii_pabx_satuan') is-invalid @enderror"
                                                placeholder="Masukan pabx (sat)">
                                                <small>
                                                    <i>Masukan pabx (sat)</i>
                                                </small>
                                                @error('vii_pabx_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="vii_pabx_harga" value="{{old('vii_pabx_harga') ?? 0}}" class="form-control @error('vii_pabx_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('vii_pabx_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-2">
                                                <h6>VIII. SUMUR ARTESIS</h6>
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="viii_sumur_artesis_satuan" value="{{old('viii_sumur_artesis_satuan') ?? 0}}" class="form-control @error('viii_sumur_artesis_satuan') is-invalid @enderror"
                                                placeholder="Masukan sumur artesis (m2)">
                                                <small>
                                                    <i>Masukan sumur artesis (m<sup>2</sup>)</i>
                                                </small>
                                                @error('viii_sumur_artesis_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="viii_sumur_artesis_harga" value="{{old('viii_sumur_artesis_harga') ?? 0}}" class="form-control @error('viii_sumur_artesis_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('viii_sumur_artesis_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-2">
                                                <h6>IX. SISTEM AIR PANAS</h6>
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="ix_sistem_air_panas_satuan" value="{{old('ix_sistem_air_panas_satuan') ?? 0}}" class="form-control @error('ix_sistem_air_panas_satuan') is-invalid @enderror"
                                                placeholder="Masukan sistem air panas (m2)">
                                                <small>
                                                    <i>Masukan sistem air panas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('ix_sistem_air_panas_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="ix_sistem_air_panas_harga" value="{{old('ix_sistem_air_panas_harga') ?? 0}}" class="form-control @error('ix_sistem_air_panas_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('ix_sistem_air_panas_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-2">
                                                <h6>X. Penangkal Petir</h6>
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="x_penangkal_petir_satuan" value="{{old('x_penangkal_petir_satuan') ?? 0}}" class="form-control @error('x_penangkal_petir_satuan') is-invalid @enderror"
                                                placeholder="Masukan jumlah (ft)">
                                                <small>
                                                    <i>Masukan jumlah (ft)</i>
                                                </small>
                                                @error('x_penangkal_petir_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="x_penangkal_petir_harga" value="{{old('x_penangkal_petir_harga') ?? 0}}" class="form-control @error('x_penangkal_petir_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('x_penangkal_petir_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-2">
                                                <h6>XI. Sistem Pengolahan Limbah</h6>
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xi_sistem_pengolahan_limbah_satuan" value="{{old('xi_sistem_pengolahan_limbah_satuan') ?? 0}}" class="form-control @error('xi_sistem_pengolahan_limbah_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('xi_sistem_pengolahan_limbah_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xi_sistem_pengolahan_limbah_harga" value="{{old('xi_sistem_pengolahan_limbah_harga') ?? 0}}" class="form-control @error('xi_sistem_pengolahan_limbah_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xi_sistem_pengolahan_limbah_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-2">
                                                <h6>XII. Sistem Tata Suara</h6>
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xii_sistem_tata_suara_satuan" value="{{old('xii_sistem_tata_suara_satuan') ?? 0}}" class="form-control @error('xii_sistem_tata_suara_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                
                                                @error('xii_sistem_tata_suara_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xii_sistem_tata_suara_harga" value="{{old('xii_sistem_tata_suara_harga') ?? 0}}" class="form-control @error('xii_sistem_tata_suara_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xii_sistem_tata_suara_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-2">
                                                <h6>XIII. VIDEO INTERCOM</h6>
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xiii_video_intercom_satuan" value="{{old('xiii_video_intercom_satuan') ?? 0}}" class="form-control @error('xiii_video_intercom_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                
                                                @error('xiii_video_intercom_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xiii_video_intercom_harga" value="{{old('xiii_video_intercom_harga') ?? 0}}" class="form-control @error('xiii_video_intercom_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xiii_video_intercom_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-2">
                                                <h6>XIV. RESERVOIR</h6>
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xiv_reservoir_satuan" value="{{old('xiv_reservoir_satuan') ?? 0}}" class="form-control @error('xiv_reservoir_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                
                                                @error('xiv_reservoir_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xiv_reservoir_harga" value="{{old('xiv_reservoir_harga') ?? 0}}" class="form-control @error('xiv_reservoir_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xiv_reservoir_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>XV. TELEVISI</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                MATV
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xv_matv_satuan" value="{{old('xv_matv_satuan') ?? 0}}" class="form-control @error('xv_matv_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                
                                                @error('xv_matv_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xv_matv_harga" value="{{old('xv_matv_harga') ?? 0}}" class="form-control @error('xv_matv_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xv_matv_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                CCTV
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xv_cctv_satuan" value="{{old('xv_cctv_satuan') ?? 0}}" class="form-control @error('xv_cctv_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                
                                                @error('xv_cctv_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xv_cctv_harga" value="{{old('xv_cctv_harga') ?? 0}}" class="form-control @error('xv_cctv_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xv_cctv_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>XVI. KOLAM RENANG</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Plester
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xvi_plester_satuan" value="{{old('xvi_plester_satuan') ?? 0}}" class="form-control @error('xvi_plester_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                
                                                @error('xvi_plester_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xvi_plester_harga" value="{{old('xvi_plester_harga') ?? 0}}" class="form-control @error('xvi_plester_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xvi_plester_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Pelapis
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xvi_pelapis_satuan" value="{{old('xvi_pelapis_satuan') ?? 0}}" class="form-control @error('xvi_pelapis_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                
                                                @error('xvi_pelapis_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xvi_pelapis_harga" value="{{old('xvi_pelapis_harga') ?? 0}}" class="form-control @error('xvi_pelapis_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xvi_pelapis_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>XVII. PERKERASAN</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Ringan
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xvii_ringan_satuan" value="{{old('xvii_ringan_satuan') ?? 0}}" class="form-control @error('xvii_ringan_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                
                                                @error('xvii_ringan_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xvii_ringan_harga" value="{{old('xvii_ringan_harga') ?? 0}}" class="form-control @error('xvii_ringan_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xvii_ringan_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Sedang
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xvii_sedang_satuan" value="{{old('xvii_sedang_satuan') ?? 0}}" class="form-control @error('xvii_sedang_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                
                                                @error('xvii_sedang_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xvii_sedang_harga" value="{{old('xvii_sedang_harga') ?? 0}}" class="form-control @error('xvii_sedang_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xvii_sedang_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Keras
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xvii_keras_satuan" value="{{old('xvii_keras_satuan') ?? 0}}" class="form-control @error('xvii_keras_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                
                                                @error('xvii_keras_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xvii_keras_harga" value="{{old('xvii_keras_harga') ?? 0}}" class="form-control @error('xvii_keras_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xvii_keras_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>XVIII. Lapangan Tenis</h6>
                                    <small>Dengan Lampu</small>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Beton
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xviii_dengan_beton_satuan" value="{{old('xviii_dengan_beton_satuan') ?? 0}}" class="form-control @error('xviii_dengan_beton_satuan') is-invalid @enderror"
                                                placeholder="Masukan jumlah (ban)">
                                                <small>
                                                    <i>Masukan jumlah (ban)</i>
                                                </small>
                                                @error('xviii_dengan_beton_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xviii_dengan_beton_harga" value="{{old('xviii_dengan_beton_harga') ?? 0}}" class="form-control @error('xviii_dengan_beton_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xviii_dengan_beton_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Aspal
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xviii_dengan_aspal_satuan" value="{{old('xviii_dengan_aspal_satuan') ?? 0}}" class="form-control @error('xviii_dengan_aspal_satuan') is-invalid @enderror"
                                                placeholder="Masukan jumlah (ban)">
                                                <small>
                                                    <i>Masukan jumlah (ban)</i>
                                                </small>
                                                @error('xviii_dengan_aspal_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xviii_dengan_aspal_harga" value="{{old('xviii_dengan_aspal_harga') ?? 0}}" class="form-control @error('xviii_dengan_aspal_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xviii_dengan_aspal_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Tanah Liat
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xviii_dengan_tanah_liat_satuan" value="{{old('xviii_dengan_tanah_liat_satuan') ?? 0}}" class="form-control @error('xviii_dengan_tanah_liat_satuan') is-invalid @enderror"
                                                placeholder="Masukan jumlah (ban)">
                                                <small>
                                                    <i>Masukan jumlah (ban)</i>
                                                </small>
                                                @error('xviii_dengan_tanah_liat_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xviii_dengan_tanah_liat_harga" value="{{old('xviii_dengan_tanah_liat_harga') ?? 0}}" class="form-control @error('xviii_dengan_tanah_liat_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xviii_dengan_tanah_liat_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <small>Tanpa Lampu</small>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Beton
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xviii_tanpa_beton_satuan" value="{{old('xviii_tanpa_beton_satuan') ?? 0}}" class="form-control @error('xviii_tanpa_beton_satuan') is-invalid @enderror"
                                                placeholder="Masukan jumlah (ban)">
                                                <small>
                                                    <i>Masukan jumlah (ban)</i>
                                                </small>
                                                @error('xviii_tanpa_beton_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xviii_tanpa_beton_harga" value="{{old('xviii_tanpa_beton_harga') ?? 0}}" class="form-control @error('xviii_tanpa_beton_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xviii_tanpa_beton_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Aspal
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xviii_tanpa_aspal_satuan" value="{{old('xviii_tanpa_aspal_satuan') ?? 0}}" class="form-control @error('xviii_tanpa_aspal_satuan') is-invalid @enderror"
                                                placeholder="Masukan jumlah (ban)">
                                                <small>
                                                    <i>Masukan jumlah (ban)</i>
                                                </small>
                                                @error('xviii_tanpa_aspal_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xviii_tanpa_aspal_harga" value="{{old('xviii_tanpa_aspal_harga') ?? 0}}" class="form-control @error('xviii_tanpa_aspal_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xviii_tanpa_aspal_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            <div class="ml-3">
                                                Tanah Liat
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="xviii_tanpa_tanah_liat_satuan" value="{{old('xviii_tanpa_tanah_liat_satuan') ?? 0}}" class="form-control @error('xviii_tanpa_tanah_liat_satuan') is-invalid @enderror"
                                                placeholder="Masukan jumlah (ban)">
                                                <small>
                                                    <i>Masukan jumlah (ban)</i>
                                                </small>
                                                @error('xviii_tanpa_tanah_liat_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="xviii_tanpa_tanah_liat_harga" value="{{old('xviii_tanpa_tanah_liat_harga') ?? 0}}" class="form-control @error('xviii_tanpa_tanah_liat_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('xviii_tanpa_tanah_liat_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row mb-0">
                                        <div class="col-8 ">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                <i class="fa fa-plus"></i> Tambah
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                </div> <!-- end card-box -->
            </div><!-- end col -->
        </div>
        <!-- end row -->
        <!-- end row -->


    </div> <!-- end container -->
</div>
@endsection
@section('js')
        <!-- Plugin js-->
        <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>

        <!-- third party js -->
        <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
@endsection