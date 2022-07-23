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
                <div class="callout callout-warning alert alert-warning alert-dismissible fade show">
                    <h5><i class="fas fa-info"></i> Informasi :</h5>
                    - Laporan kedah detail sareng jelas ! <br>
                    - Kedah Jeli sareng tong sembarangan <b>Nolak / Tunda</b> ! <br>
                    - Konfirmasi data ieu sesuai alasan !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-credit-card"></i> Detail Data Pembayaran
                            </h4>
                        </div>
                    </div>
                    <!-- info row -->
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-12">
                            <p class="lead">Catatan :</p>
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                - Mohon konfirmasi heula sateuacan di tolak <br>
                                - Konfirmasi sesuai alasan, pami kurang yakin kedah nyuhunkeun saran ti penasehat atanapi pengurus nu Lain
                                - Laporan kedah detail sareng jelas, supados kahartosen ku Anggota
                                - Laporan kedah sesuai dina anu di laporkeun ku Bendahara sareng Sekertaris
                            </p>

                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <p class="lead">Rekap data pemabyaran :</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Metode Pembayaran</th>
                                        <td>{{ $data_pengajuan->pembayaran}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Nama Anggota</th>
                                        <td>{{ $data_pengajuan->anggota->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Penginputan</th>
                                        <td>{{ $data_pengajuan->tanggal}}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Uang</th>
                                        <td>{{ $data_pengajuan->jumlah}}</td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>{{ $data_pengajuan->keterangan}}</td>
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
                            <form action="{{Route('pengajuan.update',Crypt::encrypt($data_pengajuan->id))}}" method="post">
                                @method('PATCH')
                                {{csrf_field()}}
                                <h5><strong>
                                        <center>Laporan Bendahara</center>
                                    </strong></h5>
                                <p>{!! $data_pengajuan->bendahara !!}</p><br>
                                <h5><strong>
                                        <center>Laporan Sekertartis</center>
                                    </strong></h5>
                                <p>{!! $data_pengajuan->sekertaris !!}</p><br>
                                <div class="form-group">
                                    <label for="ketua">Laporan ketua</label>
                                    <textarea name="ketua" class="textarea @error('ketua') is-invalid @enderror" id="ketua" rows="3" placeholder="Eusian ketua ieu sesuai ketua artos anu di bayarkeun"> {{$data_pengajuan->ketua}} </textarea>
                                    <input type="hidden" id="status" name="status" value="Tunda">
                                    @error('ketua')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin bade di tunda ? Leres parantos ngakonfirmasi sesuai keterangan {{$data_pengajuan->keterangan}} anu namina {{$data_pengajuan->anggota->name}} jumlahna {{ "Rp " . number_format($data_pengajuan->jumlah,2,',','.') }}  ?')">Tunda</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection