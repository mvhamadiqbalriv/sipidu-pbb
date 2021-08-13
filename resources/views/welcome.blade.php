@extends('layouts.app')
@section('content')
<div class="wrapper">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-box">
            <div class="row">
                <div class="col">
                    <h2>Selamat datang di Website Aplikasi SIPIDU PBB</h2>
                    <p>
                        Badan Pengelolaan Pendapatan Daerah Kab. Sumedang
                    </p>
                    @guest
                    <div class="mt-3 ml-5">
                        <a href="{{url('login')}}" class="btn btn-lg btn-primary btn-rounded" style="width: 100px;">Login</a>
                    </div>
                    @endauth
                </div>
                <div class="col">
                    <img src="assets/images/survey_undraw.png" style="width: 300px;" alt="">
                </div>
            </div>
        </div><!-- end col -->
        <!-- end row -->


    </div> <!-- end container -->
</div>
@endsection