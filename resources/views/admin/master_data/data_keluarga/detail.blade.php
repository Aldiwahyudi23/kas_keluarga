@extends('template_backend.home')

@section('heading', 'anggota')
@section('page')
<li class="breadcrumb-item active">anggota</li>
@endsection

@section('content')
@if(session('sukses'))
<div class="container">
    <div class="callout callout-success alert alert-success alert-dismissible fade show" role="alert">
        <h5><i class="fas fa-check"></i> Sukses :</h5>
        {{session('sukses')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

@if(session('kuning'))
<div class="container">
    <div class="callout callout-warning alert alert-warning alert-dismissible fade show" role="alert">
        <h5><i class="fas fa-info"></i> Informasi :</h5>
        {{session('kuning')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@if(session('infoes'))
<div class="container">
    <div class="callout callout-primary alert alert-primary alert-dismissible fade show" role="alert">
        <h5><i class="fas fa-info"></i> Informasi :</h5>
        {{session('infoes')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
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
                                - Data sesuai anu atos di nput sebelumna <br>
                                - Konfirmasi, emangna leres data ieu sareng aslina
                            </p>

                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <p class="lead">Rekap data Anggota :</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <img src="{{asset($data_anggota->foto)}}" alt="" width="70%" class="brand-image img-circle elevation-3 " style="display:block; margin:auto">
                                    <a href="{{route('keluarga.edit',Crypt::encrypt($data_anggota->id))}}" class="btn btn-link btn-block btn-light"> Edit Profile</a>

                                    <tr>
                                        <th style="width:50%">Nama</th>
                                        <td>{{ $data_anggota->nama}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">NIK</th>
                                        <td>{{ $data_anggota->nik}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Jenis Kelamin</th>
                                        <td>{{ $data_anggota->jenis_kelamin}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Tempat,Tanggal Lahir</th>
                                        <td>{{ $data_anggota->tempat_lahir}},{{ $data_anggota->tanggal_lahir}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Alamat</th>
                                        <td>{{ $data_anggota->alamat}}</td>
                                    </tr>
                                    <tr>
                                        <th>No Handphone</th>
                                        <td>{{ $data_anggota->no_hp}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{$data_anggota->pekerjaan}}</td>
                                    </tr>
                                    <tr>
                                        <th>hubungan</th>
                                        <td>{{$data_anggota->hubungan}} dari {{$data_anggota->nama_hubungan}} </td>
                                    </tr>
                                    <tr>
                                        <th>Anak Ke</th>
                                        <td>{{$data_anggota->anak_ke}}</td>
                                    </tr>
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
<section class="content card col-12" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        <h4><i class="nav-icon fas fa-users my-1 btn-sm-1"></i> Data Anggota Keluarga</h4>
        <hr>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-light p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active btn-sm" href="#setor" data-toggle="tab"><i></i> Data anggota</a></li>
                                    <li class="nav-item"><a class="nav-link btn-sm" href="#anggota" data-toggle="tab"><i></i> Deskripsi</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Awal data pemasukan -->
                                    <div class="active tab-pane" id="setor">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <div class="col-12">
                                                    <table class="table table-hover table-head-fixed" id='example1'>
                                                        <thead>
                                                            <tr class="bg-light">
                                                                <th>No.</th>
                                                                <th>Nama</th>
                                                                <th>Status Kekeluargaan</th>
                                                                <th>Status Kekeluargaan</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            use App\Models\AnggotaKeluarga;

                                                            $no = 0; ?>
                                                            @foreach($data_keluarga as $data)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td> <a href="{{Route('keluarga.detail',$data->id)}}" class="">{{$data->nama}}</a></td>
                                                                <td> <a href="{{route('keluarga.edit',Crypt::encrypt($data->id))}}" class=""> {{$data->hubungan}} {{$data->anak_ke}} Dari {{$data->nama_hubungan}} </a></td>

                                                                <td> <?php
                                                                        $jumlah = AnggotaKeluarga::where('nama_hubungan', $data->nama_hubungan)->count();
                                                                        ?> <a href="{{route('keluarga.edit',Crypt::encrypt($data->id))}}" class=""> {{$jumlah}} </a></td>
                                                                <td>
                                                                    @if (auth()->user()->role == 'Admin')
                                                                    <form action=" {{route('keluarga.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                                                        @method('delete')
                                                                        {{csrf_field()}}
                                                                        <button class="btn btn-link fas fa-trash " onclick="return confirm('Leres bade ngahapus data anu namina {{$data->nama}}  ?')"><i class="nav-icon fas fa-trash "></i></button>
                                                                    </form>
                                                                    @endif

                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir togle data pemasukan -->

                                    <!-- awal data anggota -->
                                    <div class=" tab-pane" id="anggota">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <div class="col-12">
                                                    <table class="table table-hover table-head-fixed" id='tabelAgendaKeluar'>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div><!-- /.container-fluid -->
        </section>
    </div>
</section>

@endsection
@section('script')
<script>
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataKeluarga").addClass("active");
</script>
@endsection