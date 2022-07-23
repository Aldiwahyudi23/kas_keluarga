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
                                <i class="fas fa-credit-card"></i> Detail Data Pemasukan {{$data_pemasukan->anggota->name}}
                            </h4>
                        </div>
                    </div>
                    <!-- info row -->
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-12">
                            <p class="lead">Catatan :</p>
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                - Cek sadaana data bilih aya nu teu sami <br>
                                - Bilih aya nu teu sami mangga kordinasikeun sareng nu sanes.
                            </p>

                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <p class="lead">Rekap data Pemasukan :</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Pembayaran</th>
                                        <td>{{ $data_pemasukan->pembayaran}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Nama Anggota</th>
                                        <td>{{ $data_pemasukan->anggota->name}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Tanggal Pengajuan</th>
                                        <td>{{ $data_pemasukan->tanggal}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Tanggal di Konfirmasi</th>
                                        <td>{{ $data_pemasukan->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Nominal</th>
                                        <td>{{ $data_pemasukan->jumlah}}</td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>{{ $data_pemasukan->keterangan}}</td>
                                    </tr>
                                    @if ($data_pemasukan->foto)
                                    <img src="{{asset($data_pemasukan->foto)}}" alt="" width="50%" class="brand-image elevation-3 " style="display:block; margin:auto">
                                    @endif

                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection