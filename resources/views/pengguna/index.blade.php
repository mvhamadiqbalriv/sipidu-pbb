@extends('layouts.app')
@section('title')
    Pengguna
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
                            <li class="breadcrumb-item active">Pengguna</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Pengguna</h4>
                </div>
            </div>
        </div>  
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="text-center mt-4">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="card-box widget-flat border-success bg-success text-white">
                                    <i class="fe-tag"></i>
                                    <h3 class="text-white">{{$admin}}</h3>
                                    <p class="text-uppercase font-13 font-weight-bold">Admin</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="card-box bg-primary widget-flat border-primary text-white">
                                    <i class="fe-hard-drive"></i>
                                    <h3 class="text-white">{{$user}}</h3>
                                    <p class="text-uppercase font-13 font-weight-bold">User</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="{{route('pengguna.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
                    </div>


                    <table
                        class="table table-hover m-0 table-centered tickets-list table-actions-bar dt-responsive nowrap"
                        cellspacing="0" width="100%" id="datatable">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th class="hidden-sm">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($list as $item)
                                <tr id="pengguna_{{$item->id}}">
                                    <td><b>{{$no++}}</b></td>
                                    <td>
                                        @php
                                            if($item->photo){
                                                $pathImg = Storage::url($item->photo);
                                            }else{
                                                $pathImg = asset('assets/images/avatar.png');
                                            }
                                        @endphp
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="{{$pathImg}}" alt="contact-img"
                                                title="contact-img" class="rounded-circle avatar-sm" />
                                            <span class="ml-2">{{$item->name}}</span>
                                        </a>
                                    </td>

                                    <td>
                                        {{$item->email}}
                                    </td>

                                    <td>
                                        {{$item->username}}
                                    </td>

                                    <td>
                                        @if ($item->level == 'Admin')
                                            <span class="badge badge-success">Admin</span>
                                        @else
                                            <span class="badge badge-info">User</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);"
                                                class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                                data-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('pengguna.edit', $item->id)}}"><i
                                                        class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Ubah </a>
                                                        @if (Auth::user()->id != $item->id)
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="deleteUser({{$item->id}})"><i
                                                                class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Hapus</a>
                                                        @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->


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
        function deleteUser(id) {
            Swal.fire({
                title: 'Apakah kamu yakin menghapus pengguna ini?',
                icon: 'info',
                confirmButtonText: `Ya, Hapus !`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('pengguna.pengguna-delete') }}",
                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },

                        success: function(result) {
                            Swal.fire(result.data.name+' berhasil dihapus', '', 'success')
                            $('#pengguna_' + id).remove();
                        }
                    });
                } else {
                    Swal.fire('pengguna gagal dihapus', '', 'danger')
                }
            });
        }
    </script>
@endsection