@extends('layouts.app')
@section('title')
    Tambah Pengguna
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
                            <li class="breadcrumb-item"><a href="{{route('pengguna.index')}}">Pengguna</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
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
                    <h4 class="header-title">Tambah Pengguna</h4>
                    <p class="sub-header">
                        NB: Formulir dengan label bertanda (<span class="text-danger">*</span>) Wajib diisi !
                    </p>

                    <form action="{{route('pengguna.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="namaLengkap" class="col-4 col-form-label">Nama Lengkap <span
                                    class="text-danger">*</span></label>
                            <div class="col-7">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    id="namaLengkap" value="{{old('name')}}" placeholder="Nama Lengkap">
                                @error('name')
                                    <small class="text-danger">
                                        <i>{{$message}}</i>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="userName" class="col-4 col-form-label">Username <span
                                    class="text-danger">*</span></label>
                            <div class="col-7">
                                <input type="text" value="{{old('username')}}" name="username" class="form-control @error('name') is-invalid @enderror"
                                    id="userName" placeholder="Username">
                                @error('username')
                                    <small class="text-danger">
                                        <i>{{$message}}</i>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-4 col-form-label">Email <span
                                    class="text-danger">*</span></label>
                            <div class="col-7">
                                <input type="email" value="{{old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror"
                                    id="inputEmail3" placeholder="Email">
                                @error('email')
                                    <small class="text-danger">
                                        <i>{{$message}}</i>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hori-pass1" class="col-4 col-form-label">Password <span
                                    class="text-danger">*</span></label>
                            <div class="col-7">
                                <input id="hori-pass1" name="password" type="password" placeholder="Password" required
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <small class="text-danger">
                                        <i>{{$message}}</i>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hori-pass2" class="col-4 col-form-label">Confirm Password
                                <span class="text-danger">*</span></label>
                            <div class="col-7">
                                <input name="confirm_password" data-parsley-equalto="#hori-pass1" type="password" required
                                    placeholder="Password" class="form-control @error('confirm_password') is-invalid @enderror" id="hori-pass2">
                                @error('confirm_password')
                                    <small class="text-danger">
                                        <i>{{$message}}</i>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Level" class="col-4 col-form-label">Level User <span
                                    class="text-danger">*</span></label>
                            <div class="col-7">
                                <select name="level" id="Level" class="form-control  @error('level') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                                @error('level')
                                    <small class="text-danger">
                                        <i>{{$message}}</i>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photoProfile" class="col-4 col-form-label">Photo</label>
                            <div class="col-7">
                                <div id="previewImg" class="mb-2">
                                    <img src="{{asset('assets/images/avatar.png')}}" id="pathPreviewImg" width="100" height="100" alt="preview"
                                        style="border-radius: 100px;object-fit: contain;">
                                </div>
                                <input type="file" name="photo" onchange="previewImg(event)"
                                    class="form-control @error('photo') is-invalid @enderror" id="photoProfile">
                                @error('photo')
                                    <small class="text-danger">
                                        <i>{{$message}}</i>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-8 offset-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- end container -->
</div>
@endsection
@section('js')
    <!-- Plugin js-->
    <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>

    <!-- third party js -->
    <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>

    <script type='text/javascript'>
        function previewImg(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('pathPreviewImg');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection