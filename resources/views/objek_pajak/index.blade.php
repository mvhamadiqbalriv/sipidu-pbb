@extends('layouts.app')
@section('title')
    Objek Pajak
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
                            <li class="breadcrumb-item active">Objek Pajak</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Objek Pajak</h4>
                </div>
            </div>
        </div>  
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="mb-3">
                        <a href="{{route('objek-pajak.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
                    </div>


                    <table
                        class="table table-hover m-0 table-centered tickets-list table-actions-bar dt-responsive nowrap"
                        cellspacing="0" width="100%" id="datatable">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>No Objek Pajak</th>
                                <th>Nama Wajib Pajak</th>
                                <th>Alamat</th>
                                <th class="hidden-sm">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($list as $item)
                                <tr id="objekPajak_{{$item->id}}">
                                    <td><b>{{$no++}}</b></td>
                                    <td>
                                        
                                            <span class="ml-2">{{$item->nop}}</span>
                                    </td>

                                    <td>
                                       <a href="{{route('objek-pajak.show', $item->id)}}">{{$item->wajib_pajak}}</a> 
                                    </td>

                                    <td>
                                        {{$item->alamat_objek_pajak}}
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);"
                                                class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                                data-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('objek-pajak.edit', $item->id)}}"><i
                                                        class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Ubah </a>
                                                <a class="dropdown-item" href="javascript:void(0)" onclick="deleteObjekPajak({{$item->id}})"><i
                                                    class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Hapus</a>
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
        function deleteObjekPajak(id) {
            Swal.fire({
                title: 'Apakah kamu yakin menghapus Objek Pajak ini?',
                icon: 'info',
                confirmButtonText: `Ya, Hapus !`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('objek-pajak.objek-pajak-delete') }}",
                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },

                        success: function(result) {
                            Swal.fire('Data Objek Pajak berhasil dihapus', '', 'success')
                            $('#objekPajak_' + id).remove();
                        }
                    });
                } else {
                    Swal.fire('Objek pajak gagal dihapus', '', 'danger')
                }
            });
        }
    </script>
@endsection