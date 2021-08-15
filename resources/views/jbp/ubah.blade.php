@extends('layouts.app')
@section('title')
    Formulir JBP
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
                            <li class="breadcrumb-item active">FORM JBP</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Ubah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title">Ubah JBP</h4>
                    <p class="sub-header">
                        NB: Formulir dengan label bertanda (<span class="text-danger">*</span>) Wajib diisi !
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div>
                                <form class="form-horizontal" role="form" action="{{route('jbp.update',$detail->id)}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >Objek Pajak
                                            <sup class="text-danger">*</sup> </label>
                                        <div class="col-md-7">
                                            <select name="objek_pajak_id" class="form-control @error('objek_pajak_id') is-invalid @enderror" id="objek">
                                                <option value="{{$objek_pajak->id}}" readonly>NOP : <b>{{$objek_pajak->nop}}</b> | Wajib Pajak : <b>{{$objek_pajak->wajib_pajak}}</b></option>
                                            </select>
                                            @error('objek_pajak_id')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >Referensi Fasilitas Bangunan
                                            <sup class="text-danger">*</sup> </label>
                                        <div class="col-md-7">
                                            <select name="fasilitas_bangunan_id" class="form-control @error('fasilitas_bangunan_id') is-invalid @enderror" id="fasilitas_bangunan">
                                                    <option value="{{$fasilitas_bangunan->id}}">Rp. {{number_format($fasilitas_bangunan->jumlah_fasilitas)}}</option>
                                            </select>
                                            @error('fasilitas_bangunan_id')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>I. BIAYA KOMPONEN UTAMA</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                Struktur Utama
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="i_struktur_utama_satuan" value="{{old('i_struktur_utama_satuan') ?? $detail->i_struktur_utama_satuan}}" class="form-control @error('i_struktur_utama_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('i_struktur_utama_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="i_struktur_utama_harga" value="{{old('i_struktur_utama_harga') ?? $detail->i_struktur_utama_harga}}" class="form-control @error('i_struktur_utama_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('i_struktur_utama_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                Basemen
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="i_basemen_satuan" value="{{old('i_basemen_satuan') ?? $detail->i_basemen_satuan}}" class="form-control @error('i_basemen_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('i_basemen_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="i_basemen_harga" value="{{old('i_basemen_harga') ?? $detail->i_basemen_harga}}" class="form-control @error('i_basemen_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('i_basemen_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>II. BIAYA KOMPONEN UTAMA</h6>
                                    <h6 class="ml-2">A. Material Dinding Dalam</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                Struktur Utama
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iia_struktur_utama_satuan" value="{{old('iia_struktur_utama_satuan') ?? $detail->iia_struktur_utama_satuan}}" class="form-control @error('iia_struktur_utama_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('iia_struktur_utama_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iia_struktur_utama_harga" value="{{old('iia_struktur_utama_harga') ?? $detail->iia_struktur_utama_harga}}" class="form-control @error('iia_struktur_utama_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iia_struktur_utama_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6 class="ml-2">B. Material Dinding Luar</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                Batu
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iib_batu_satuan" value="{{old('iib_batu_satuan') ?? $detail->iib_batu_satuan}}" class="form-control @error('iib_batu_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('iib_batu_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iib_batu_harga" value="{{old('iib_batu_harga') ?? $detail->iib_batu_harga}}" class="form-control @error('iib_batu_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iib_batu_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6 class="ml-2">C. Pelapis Dinding Dalam</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                2 Lantai
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iic_dua_lantai_satuan" value="{{old('iic_dua_lantai_satuan') ?? $detail->iic_dua_lantai_satuan}}" class="form-control @error('iic_dua_lantai_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('iic_dua_lantai_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iic_dua_lantai_harga" value="{{old('iic_dua_lantai_harga') ?? $detail->iic_dua_lantai_harga}}" class="form-control @error('iic_dua_lantai_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iic_dua_lantai_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6 class="ml-2">D. Pelapis Dinding Luar</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                2 Lantai
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iid_dua_lantai_satuan" value="{{old('iid_dua_lantai_satuan') ?? $detail->iid_dua_lantai_satuan}}" class="form-control @error('iid_dua_lantai_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('iid_dua_lantai_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iid_dua_lantai_harga" value="{{old('iid_dua_lantai_harga') ?? $detail->iid_dua_lantai_harga}}" class="form-control @error('iid_dua_lantai_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iid_dua_lantai_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6 class="ml-2">E. Langit-Langit</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                2 Lantai
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iie_dua_lantai_satuan" value="{{old('iie_dua_lantai_satuan') ?? $detail->iie_dua_lantai_satuan}}" class="form-control @error('iie_dua_lantai_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('iie_dua_lantai_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iie_dua_lantai_harga" value="{{old('iie_dua_lantai_harga') ?? $detail->iie_dua_lantai_harga}}" class="form-control @error('iie_dua_lantai_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iie_dua_lantai_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-2">
                                                <h6>F. Penutup Atap</h6>
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iif_penutup_atap_satuan" value="{{old('iif_penutup_atap_satuan') ?? $detail->iif_penutup_atap_satuan}}" class="form-control @error('iif_penutup_atap_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('iif_penutup_atap_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iif_penutup_atap_harga" value="{{old('iif_penutup_atap_harga') ?? $detail->iif_penutup_atap_harga}}" class="form-control @error('iif_penutup_atap_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iif_penutup_atap_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6 class="ml-2">G. Penutup Lantai</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                2 Lantai
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iig_dua_lantai_satuan" value="{{old('iig_dua_lantai_satuan') ?? $detail->iig_dua_lantai_satuan}}" class="form-control @error('iig_dua_lantai_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('iig_dua_lantai_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iig_dua_lantai_harga" value="{{old('iig_dua_lantai_harga') ?? $detail->iig_dua_lantai_harga}}" class="form-control @error('iig_dua_lantai_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iig_dua_lantai_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6 class="ml-2">H. Sanitasi</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                Super Struktur
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iih_super_struktur_satuan" value="{{old('iih_super_struktur_satuan') ?? $detail->iih_super_struktur_satuan}}" class="form-control @error('iih_super_struktur_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('iih_super_struktur_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iih_super_struktur_harga" value="{{old('iih_super_struktur_harga') ?? $detail->iih_super_struktur_harga}}" class="form-control @error('iih_super_struktur_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iih_super_struktur_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                Basemen
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iih_basemen_satuan" value="{{old('iih_basemen_satuan') ?? $detail->iih_basemen_satuan}}" class="form-control @error('iih_basemen_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('iih_basemen_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iih_basemen_harga" value="{{old('iih_basemen_harga') ?? $detail->iih_basemen_harga}}" class="form-control @error('iih_basemen_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iih_basemen_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6 class="ml-2">I. Plumbing</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                Super Struktur
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iii_super_struktur_satuan" value="{{old('iii_super_struktur_satuan') ?? $detail->iii_super_struktur_satuan}}" class="form-control @error('iii_super_struktur_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('iii_super_struktur_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iii_super_struktur_harga" value="{{old('iii_super_struktur_harga') ?? $detail->iii_super_struktur_harga}}" class="form-control @error('iii_super_struktur_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iii_super_struktur_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                Basemen
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="iii_basemen_satuan" value="{{old('iii_basemen_satuan') ?? $detail->iii_basemen_satuan}}" class="form-control @error('iii_basemen_satuan') is-invalid @enderror"
                                                placeholder="Masukan luas (m2)">
                                                <small>
                                                    <i>Masukan luas (m<sup>2</sup>)</i>
                                                </small>
                                                @error('iii_basemen_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="iii_basemen_harga" value="{{old('iii_basemen_harga') ?? $detail->iii_basemen_harga}}" class="form-control @error('iii_basemen_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('iii_basemen_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>III. BIAYA KOMPONEN FASILITAS</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                Fasilitas Pendukung
                                            </div> 
                                        </label>
                                        <div class="col-md-4">
                                            <i>Diambil berdasarkan Referensi Fasilitas Bangunan yang dipilih <a href="#fasilitas_bangunan">sebelumnya</a> .</i>  
                                        </div>
                                    </div>
                                    <h6>IV. PENYUSUTAN</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                Nilai Penyusutan
                                            </div> 
                                        </label>
                                        <div class="col-md-4">
                                            <input type="number" name="iv_nilai_penyusutan_satuan" value="{{old('iv_nilai_penyusutan_satuan') ?? $detail->iv_nilai_penyusutan_satuan}}" class="form-control @error('iv_nilai_penyusutan_satuan') is-invalid @enderror"
                                                placeholder="Masukan persentase (%)">
                                                <small>
                                                    <i>Masukan persentase (%)</i>
                                                </small>
                                                @error('iv_nilai_penyusutan_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6>V. FASILITAS (Tak perlu disusutkan)</h6>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                Daya Listrik
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="v_daya_listrik_satuan" value="{{old('v_daya_listrik_satuan') ?? $detail->v_daya_listrik_satuan}}" class="form-control @error('v_daya_listrik_satuan') is-invalid @enderror"
                                                placeholder="Masukan daya listrik (KVA)">
                                                <small>
                                                    <i>Masukan daya listrik (KVA)</i>
                                                </small>
                                                @error('v_daya_listrik_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="v_daya_listrik_harga" value="{{old('v_daya_listrik_harga') ?? $detail->v_daya_listrik_harga}}" class="form-control @error('v_daya_listrik_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('v_daya_listrik_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                AC Split
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="v_ac_split_satuan" value="{{old('v_ac_split_satuan') ?? $detail->v_ac_split_satuan}}" class="form-control @error('v_ac_split_satuan') is-invalid @enderror"
                                                placeholder="Masukan AC Split (buah)">
                                                <small>
                                                    <i>Masukan AC Split (buah)</i>
                                                </small>
                                                @error('v_ac_split_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="v_ac_split_harga" value="{{old('v_ac_split_harga') ?? $detail->v_ac_split_harga}}" class="form-control @error('v_ac_split_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('v_ac_split_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                AC Window
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="v_ac_window_satuan" value="{{old('v_ac_window_satuan') ?? $detail->v_ac_window_satuan}}" class="form-control @error('v_ac_window_satuan') is-invalid @enderror"
                                                placeholder="Masukan AC Window (buah)">
                                                <small>
                                                    <i>Masukan AC Window (buah)</i>
                                                </small>
                                                @error('v_ac_window_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="v_ac_window_harga" value="{{old('v_ac_window_harga') ?? $detail->v_ac_window_harga}}" class="form-control @error('v_ac_window_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('v_ac_window_harga')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" >
                                            <div class="ml-3">
                                                AC Floor
                                            </div> 
                                        </label>
                                        <div class="col-md-3">
                                            <input type="number" name="v_ac_floor_satuan" value="{{old('v_ac_floor_satuan') ?? $detail->v_ac_floor_satuan}}" class="form-control @error('v_ac_floor_satuan') is-invalid @enderror"
                                                placeholder="Masukan AC Floor (buah)">
                                                <small>
                                                    <i>Masukan AC Floor (buah)</i>
                                                </small>
                                                @error('v_ac_floor_satuan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" name="v_ac_floor_harga" value="{{old('v_ac_floor_harga') ?? $detail->v_ac_floor_harga}}" class="form-control @error('v_ac_floor_harga') is-invalid @enderror"
                                                placeholder="Masukan harga satuan (Rp)">
                                                <small>
                                                    <i>Masukan harga satuan (Rp)</i>
                                                </small>
                                                @error('v_ac_floor_harga')
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
                                                <i class="fa fa-save"></i> Perbaharui
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

        <script>
            const objekDropdown = document.getElementById('objek');
    
            objekDropdown.addEventListener('change', async (e) => {
                e.preventDefault();
    
                var id = objekDropdown.value;
                var _token = "{{ csrf_token() }}"
    
                try {
                    let response = await fetch("{{ route('directory-fasilitas-bangunan') }}", {
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
                        var obj = document.getElementById('fasilitas_bangunan');
                        obj.innerHTML = "";
    
                        for (var k in datasend) {
                            var opt = '<option value="' + k + '">Total : Rp.' + datasend[k] + '</option>';
                            obj.innerHTML = obj.innerHTML + opt;
                        }
                    }
    
                } catch (err) {
                    console.log(err);
                }
            });
        </script>
@endsection