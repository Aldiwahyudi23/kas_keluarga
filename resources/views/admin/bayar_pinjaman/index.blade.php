@extends('template_backend.home')
@section('heading')
Pengajuan
@endsection
@section('page')
<li class="breadcrumb-item active"><a href="">Anggota</a></li>
<li class="breadcrumb-item active"></li>
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

@if(session('warning'))
<div class="container">
    <div class="callout callout-warning alert alert-warning alert-dismissible fade show" role="alert">
        <h5><i class="fas fa-info"></i> Informasi :</h5>
        {{session('warning')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

@if ($errors->any())
<div class="container">
    <div class="callout callout-danger alert alert-danger alert-dismissible fade show">
        <h5><i class="fas fa-exclamation-triangle"></i> Peringatan :</h5>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <b><i class="fas fa-info"></i> INFO !!!</b> <br>
    Data anu di handap nyaeta data pembayaran anggaran pinjaman ti anggota. Supados data lebet kana pendataan kas Punten ka bendahara <b>KONFIRMASI PEMABAYARAN </b> ieu sesuai keterangan anu atos anggota input
    <br> <br> Tombol<b> Lihat</b> nu di pinggir kanan Fungsina kanggo ningal detail data eta, sareng kanggo ngakonfirmasi.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<section class="content card col-md-12" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        <h4><i class="nav-icon fas fa-credit-card my-1 btn-sm-1"></i> Pengajuan Pembayaran Pinjaman</h4>
        <hr>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Anggota</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pengajuan as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->anggota->name }}</td>
                                    <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                    <td>
                                        <a href="{{Route('pinjaman.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-id-card">Lihat</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
@endsection
@section('script')
<script>
    $("#pengajuan").addClass("active");
    $("#likas").addClass("menu-open");
    $("#pemasukan").addClass("active");
</script>
@endsection