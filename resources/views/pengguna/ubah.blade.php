@extends('layouts.app')
@section('title')
    Ubah Pengguna
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
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('pengguna.index') }}">Pengguna</a></li>
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
                        <h4 class="header-title">Ubah Pengguna</h4>
                        <p class="sub-header">
                            NB: Formulir dengan label bertanda (<span class="text-danger">*</span>) Wajib diisi !
                        </p>

                        <form action="{{ route('pengguna.update', $detail->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="namaLengkap" class="col-4 col-form-label">Nama Lengkap <span
                                        class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="namaLengkap" value="{{ old('name') ?? $detail->name }}"
                                        placeholder="Nama Lengkap">
                                    @error('name')
                                        <small class="text-danger">
                                            <i>{{ $message }}</i>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="userName" class="col-4 col-form-label">Username <span
                                        class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="text" value="{{ old('username') ?? $detail->username }}" name="username"
                                        class="form-control @error('name') is-invalid @enderror" id="userName"
                                        placeholder="Username">
                                    @error('username')
                                        <small class="text-danger">
                                            <i>{{ $message }}</i>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-4 col-form-label">Email <span
                                        class="text-danger">*</span></label>
                                <div class="col-7">
                                    <input type="email" value="{{ old('email') ?? $detail->email }}" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="inputEmail3"
                                        placeholder="Email">
                                    @error('email')
                                        <small class="text-danger">
                                            <i>{{ $message }}</i>
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Level" class="col-4 col-form-label">Level User <span
                                        class="text-danger">*</span></label>
                                <div class="col-7">
                                    <select name="level" id="Level"
                                        class="form-control  @error('level') is-invalid @enderror">
                                        <option value="User" {{ $detail->level == 'User' ? 'selected' : null }}>User
                                        </option>
                                        <option value="Admin" {{ $detail->level == 'Admin' ? 'selected' : null }}>Admin
                                        </option>
                                    </select>
                                    @error('level')
                                        <small class="text-danger">
                                            <i>{{ $message }}</i>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photoProfile" class="col-4 col-form-label">Photo</label>
                                <div class="col-7">
                                    @php
                                        if ($detail->photo) {
                                            $pathImg = Storage::url($detail->photo);
                                        } else {
                                            $pathImg = asset('assets/images/avatar.png');
                                        }
                                    @endphp
                                    <div id="previewImg" class="mb-2">
                                        <img src="{{ $pathImg }}" id="pathPreviewImg" width="100" height="100"
                                            alt="preview" style="border-radius: 100px;object-fit: contain;">
                                    </div>
                                    <input type="file" name="photo" onchange="previewImg(event)"
                                        class="form-control @error('photo') is-invalid @enderror" id="photoProfile">
                                    @error('photo')
                                        <small class="text-danger">
                                            <i>{{ $message }}</i>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-8 offset-4">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                        <i class="fa fa-save"></i> Perbaharui
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-right mb-1">
                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ubahPasswordModal"><i
                                class="fa fa-key"></i> Ubah password ?</button>
                    </div>
                    <!-- Modal ubah password -->
                    <div class="modal fade" id="ubahPasswordModal" tabindex="-1" role="dialog"
                        aria-labelledby="ubahPasswordModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ubahPasswordTitle">Ubah Password</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <i class="anticon anticon-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if ($msg = Session::get('success'))
                                        <div class="alert alert-success">
                                            {{ $msg }}
                                        </div>
                                    @endif
                                    @if ($msg = Session::get('error'))
                                        <div class="alert alert-danger">
                                            {{ $msg }}
                                        </div>
                                    @endif
                                    <form action="{{ route('change_password', $detail->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-md-12">
                                            <label for="">Password Lama</label>
                                            <input type="password"
                                                class="form-control m-b-15 @error('old_password') is-invalid @enderror"
                                                name="old_password" placeholder="Password Lama">
                                            @error('old_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label for="">Password Baru</label>
                                            <input type="password"
                                                class="form-control m-b-15 @error('new_password') is-invalid @enderror"
                                                name="new_password" placeholder="Password Baru">
                                            @error('new_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label for="">Konfirmasi Password Baru</label>
                                            <input type="password"
                                                class="form-control m-b-15 @error('confirm_password') is-invalid @enderror"
                                                name="confirm_password" placeholder="Konfirmasi Password Baru">
                                            @error('confirm_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->


        </div> <!-- end container -->
    </div>
@endsection
@section('js')
    <!-- Plugin js-->
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

    <!-- third party js -->
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

    <script type='text/javascript'>
        function previewImg(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('pathPreviewImg');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    @if (Session::get('success') || Session::get('error'))
        <script>
            $('#ubahPasswordModal').modal('show');
        </script>
    @endif
    @error('new_password')
        <script>
            $('#ubahPasswordModal').modal('show');
        </script>
    @enderror
    @error('confirm_password')
        <script>
            $('#ubahPasswordModal').modal('show');
        </script>
    @enderror
@endsection
