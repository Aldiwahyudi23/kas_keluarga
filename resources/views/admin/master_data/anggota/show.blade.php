@extends('template_backend.home')
@section('heading')
Pengajuan
@endsection
@section('page')
<li class="breadcrumb-item active"><a href="">Anggota</a></li>
<li class="breadcrumb-item active"></li>
@endsection
@section('content')
<section class="content card col-12" style="padding: 10px 10px 10px 10px ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-user"></i> Detail Data Anggota
                            </h4>
                        </div>
                    </div>
                    <!-- info row -->
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-12">
                            <p class="lead">Catatan :</p>
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                - Data sesuai anu atos di input sebelumna <br>
                                - Konfirmasi, emangna leres data ieu sareng aslina
                            </p>

                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <p class="lead">Rekap data Anggota :</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <img src="{{asset($data_anggota->foto)}}" alt="" width="70%" class="brand-image img-circle elevation-3 " style="display:block; margin:auto">
                                    <a href="{{route('anggota.edit',Crypt::encrypt($data_anggota->id))}}" class="btn btn-link btn-block btn-light"> Edit Profile</a>

                                    <tr>
                                        <th style="width:50%">Nama</th>
                                        <td>{{ $data_anggota->id}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">UserName</th>
                                        <td>{{ $data_anggota->name}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">No HandPhone</th>
                                        <td>{{ $data_anggota->no_hp}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Email</th>
                                        <td>{{ $data_anggota->email}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Program</th>
                                        <td>{{ $data_anggota->program1}},({{ $data_anggota->role}})</td>
                                        <td>{{ $data_anggota->program2}}</td>
                                        <td>{{ $data_anggota->program3}}</td>
                                    </tr>
                                    <tr>
                                </table>
                            </div>
                        </div>

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <form action="/pengajuan/bayar/anggota/tambah" method="post">
                                @csrf
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('script')
<script>
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataUser").addClass("active");
</script>
@endsection