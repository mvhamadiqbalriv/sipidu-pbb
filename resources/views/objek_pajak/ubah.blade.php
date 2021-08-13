@extends('layouts.app')
@section('title')
    Ubah Objek Pajak
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
                            <li class="breadcrumb-item"><a href="{{route('objek-pajak.index')}}">Objek Pajak</a></li>
                            <li class="breadcrumb-item active">Ubah</li>
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
                    <h4 class="header-title">Ubah Objek Pajak</h4>
                    <p class="sub-header">
                        NB: Formulir dengan label bertanda (<span class="text-danger">*</span>) Wajib diisi !
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div>
                                <form class="form-horizontal" role="form" method="POST" action="{{route('objek-pajak.update', $detail->id)}}" >
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Nomor Objek Pajak
                                            <sup class="text-danger">*</sup> </label>
                                        <div class="col-md-7">
                                            <input type="text" value="{{old('nop') ?? $detail->nop}}" name="nop" class="form-control @error('nop') is-invalid @enderror"
                                                placeholder="Masukan no objek pajak...">
                                            @error('nop')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Jenis Penggunaan
                                            <sup class="text-danger">*</sup> </label>
                                        <div class="col-md-7">
                                            <input type="text" name="jenis_penggunaan" value="{{old('jenis_penggunaan') ?? $detail->jenis_penggunaan}}"
                                                class="form-control @error('jenis_penggunaan') is-invalid @enderror" placeholder="Masukan jenis penggunaan...">
                                            @error('jenis_penggunaan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Nama Wajib Pajak
                                            <sup class="text-danger">*</sup> </label>
                                        <div class="col-md-7">
                                            <input type="text" name="wajib_pajak" value="{{old('wajib_pajak') ?? $detail->wajib_pajak}}"
                                                class="form-control @error('wajib_pajak') is-invalid @enderror" placeholder="Masukan nama wajib pajak...">
                                            @error('wajib_pajak')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Alamat Objek Pajak
                                            <sup class="text-danger">*</sup> </label>
                                        <div class="col-md-7">
                                            <textarea name="alamat_objek_pajak" class="form-control @error('alamat_objek_pajak') is-invalid @enderror" id="" cols="30"
                                                rows="2">{{old('alamat_objek_pajak') ?? $detail->alamat_objek_pajak}}</textarea>
                                            @error('alamat_objek_pajak')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Kecamatan <sup
                                                class="text-danger">*</sup> </label>
                                        <div class="col-md-7">
                                            <select name="district_id" class="form-control @error('district_id') is-invalid @enderror" id="kecamatan">
                                                @foreach ($kecamatan as $item)
                                                    <option value="{{$item->id}}" {{($item->id == $detail->district_id) ? 'selected' : null}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Desa / Kelurahan
                                            <sup class="text-danger">*</sup> </label>
                                        <div class="col-md-7">
                                            <select name="village_id" class="form-control @error('village_id') is-invalid @enderror" id="desa">
                                                @foreach ($desa as $item)
                                                    <option value="{{$item->id}}" {{($item->id == $detail->village_id) ? 'selected' : null}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('village_id')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Nomor Bangunan </label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" value="{{old('nomor_bangunan') ?? $detail->nomor_bangunan}}" name="nomor_bangunan" placeholder="Masukan nomor bangunan" >
                                        </div>
                                        <label class="col-md-3 col-form-label">Tahun Dibangun </label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" value="{{old('tahun_dibangun') ?? $detail->tahun_dibangun}}" name="tahun_dibangun" placeholder="Masukan tahun dibangunan" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Luas Bangunan (m<sup>2</sup>) <sup
                                            class="text-danger">*</sup> </label>
                                        <div class="col-md-2">
                                            <input type="number" value="{{old('luas_bangunan') ?? $detail->luas_bangunan}}" class="form-control @error('luas_bangunan') is-invalid @enderror" name="luas_bangunan" > 
                                            @error('luas_bangunan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <label class="col-md-3 col-form-label">Luas Basemen (m<sup>2</sup>) </label>
                                        <div class="col-md-2">
                                            <input type="number" value="{{old('luas_basemen') ?? $detail->luas_basemen}}" class="form-control" name="luas_basemen" > 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Jumlah Lantai Bangunan (Lt) <sup
                                            class="text-danger">*</sup> </label>
                                        <div class="col-md-2">
                                            <input type="number" value="{{old('jumlah_lantai_bangunan') ?? $detail->jumlah_lantai_bangunan}}" class="form-control @error('jumlah_lantai_bangunan') is-invalid @enderror" name="jumlah_lantai_bangunan" > 
                                            @error('jumlah_lantai_bangunan')
                                                <small class="text-danger">
                                                    <i>{{$message}}</i>
                                                </small>
                                            @enderror
                                        </div>
                                        <label class="col-md-3 col-form-label">Jumlah Lantai Basemen (Lt) </label>
                                        <div class="col-md-2">
                                            <input type="number" value="{{old('jumlah_lantai_basemen') ?? $detail->jumlah_lantai_basemen}}" class="form-control" name="jumlah_lantai_basemen" > 
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row mb-0">
                                        <div class="col-8 ">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
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
        const kecamatanDropdown = document.getElementById('kecamatan');

        kecamatanDropdown.addEventListener('change', async (e) => {
            e.preventDefault();

            var id = kecamatanDropdown.value;
            var _token = "{{ csrf_token() }}"

            try {
                let response = await fetch("{{ route('directory-village') }}", {
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
                    var obj = document.getElementById('desa');
                    obj.innerHTML = "";

                    for (var k in datasend) {
                        var opt = '<option value="' + k + '">' + datasend[k] + '</option>';
                        obj.innerHTML = obj.innerHTML + opt;
                    }
                }

            } catch (err) {
                console.log(err);
            }
        });
    </script>
@endsection