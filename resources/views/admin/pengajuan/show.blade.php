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
<section class="content card col-12" style="padding: 10px 10px 10px 10px ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Halaman Untuk Pembayaran -->
                @if ($data_pengajuan->kategori == 'Kas')
                <div class="callout callout-success alert alert-success alert-dismissible fade show">
                    <h5><i class="fas fa-info"></i> Informasi :</h5>
                    - Uang kas teu acan lebet kana data ! <br>
                    - Halaman ieu kanggo ningal detail data bayar, sareng ngakonfirmasi. Mangga klik tombol <b>Tarima</b> anu aya di handap halaman ! <br>
                    - Konfirmasi data ieu sesuai keterangan !
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
                                - Mohon konfirmasi heula sateuacan di tarima <br>
                                - Konfirmasi sesuai keterangan, pami di titipkeun. punten chat anu ka titipanna
                            </p>

                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <p class="lead">Rekap data pemabyaran :</p>
                            <!-- Halaman untuk Pinjaman -->
                            @elseif ($data_pengajuan->kategori == 'Pinjaman')
                            <div class="callout callout-success alert alert-success alert-dismissible fade show">
                                <h5><i class="fas fa-info"></i> Informasi :</h5>
                                - Halaman ieu kanggo ningal detail data pinjam, sareng ngakonfirmasi. Mangga klik tombol <b>Tarima</b> anu aya di handap halaman ! <br>
                                - Konfirmasi data ieu sesuai kondisi saldo dana pinjam ! <br>
                                - Konsultasi ka pihak anu bersangkutan (ketua, sekertaris, sareng & bendahara) !
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
                                            <i class="fas fa-credit-card"></i> Detail Data Pinjaman
                                        </h4>
                                    </div>
                                </div>
                                <!-- info row -->
                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-12">

                                        <b><i class="fas fa-info"></i> Catatan !!!</b> <br>
                                        <b> Syarat : </b><br>
                                        - Bertanggung jawab <br>
                                        - Masih dalam lingkungan keluarga <br>
                                        - Sanggup membayar dalam jangka waktu tertentu <br>
                                        <b> Ketentuan : </b><br>
                                        - Dana Pinjaman di keluarkan min 1 juta <br>
                                        - Per satu orang 30 % dari 1 juta <br>
                                        - Pelunasan max 3 bulan<br>
                                        - Pembayaran bisa di cicil<br>
                                        <br>
                                        syarat & ketentuan nu di luhur nembe sebagian <br>
                                        <b> Supados jelas mangga klik deskripsi di handap </b> <br> <br>
                                        <center>
                                            <p>LAPORAN</p>
                                        </center>
                                        <p> Sadayana Pengajuan Pinjaman kedah di pikir mateng mateng sareng teu kengeng ngambil keputusan nyalira, kedah di bahas sareng pengurus nu lainna. </p>
                                        <p>Anu gaduh berkah nga terima kana pengajuan pinjaman ieu tetep aya di ketua, supados ketua tiasa ngambil keputusan sesuai hasil laporan .di harapkan ka sayana pengurus kedah ngisi laporan atau pertimbanganna di kolom di handap </p>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12">
                                        <p class="lead">Rekap data Pinjaman :</p>

                                        @endif

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
                                                    <td>{{ $data_pengajuan->created_at}}</td>
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
                                        @if ($data_pengajuan->kategori == 'Kas' || $data_pengajuan->kategori == 'Tabungan' )
                                        <form action="{{Route('pemasukan.store')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-success" onclick="return confirm('Yakin bade terima ? Leres parantos ngakonfirmasi sesuai keterangan {{$data_pengajuan->keterangan}} anu namina {{$data_pengajuan->anggota->name}} jumlahna {{ "Rp" . number_format($data_pengajuan->jumlah,2,',','.') }}  ?')">Tarima</button>
                                            @elseif (Auth::user()->role == 'Admin'|| Auth::user()->role == 'Ketua')
                                            @if ($data_pengajuan->kategori == 'Pinjaman')
                                            <form action="{{Route('pengeluaran.store')}}" method="post">
                                                {{csrf_field()}}
                                                <h5><strong>
                                                        <center>Laporan Bendahara</center>
                                                    </strong></h5>
                                                <p>{!! $data_pengajuan->bendahara !!}</p><br>
                                                <input type="hidden" name="bendahara" id="bendahara" value="{{$data_pengajuan->bendahara}}">
                                                <input type="hidden" id="anggaran_id" name="anggaran_id" value="3">
                                                <input type="hidden" id="status" name="status" value="Nunggak">
                                                <h5><strong>
                                                        <center>Laporan Sekertartis</center>
                                                    </strong></h5>
                                                <p>{!! $data_pengajuan->sekertaris !!}</p><br>
                                                <input type="hidden" name="sekertaris" id="sekertaris" value="{{$data_pengajuan->sekertaris}}">
                                                <div class="form-group">
                                                    <label for="ketua">Laporan ketua</label>
                                                    <textarea name="ketua" class="textarea @error('ketua') is-invalid @enderror" id="ketua" rows="3" placeholder="Eusian ketua ieu sesuai ketua artos anu di bayarkeun"> {{$data_pengajuan->ketua}} </textarea>
                                                    @error('ketua')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-success">Setujui</button>
                                                <a class="btn btn-danger" href="{{Route('pengajuan.tunda',Crypt::encrypt($data_pengajuan->id))}}"> Tunda </a>

                                                @endif

                                                @elseif (Auth::user()->role == 'Sekertaris'|| Auth::user()->role == 'Bendahara')
                                                @if ($data_pengajuan->kategori == 'Pinjaman')
                                                <form action="{{Route('pengajuan.update',Crypt::encrypt($data_pengajuan->id))}}" method="post" enctype="multipart/form-data">
                                                    @method('PATCH')
                                                    {{csrf_field()}}

                                                    <!-- Jika role Bendahara -->
                                                    @if ( Auth::user()->role == 'Bendahara')
                                                    <div class="form-group ">
                                                        <label for="bendahara">Laporan Bendahara</label>
                                                        <textarea name="bendahara" class="textarea @error('bendahara') is-invalid @enderror" id="bendahara" rows="3" placeholder="Eusian bendahara ieu sesuai bendahara artos anu di bayarkeun"> {{$data_pengajuan->bendahara}}</textarea>
                                                        @error('bendahara')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <!-- Jika Role Sekertartis -->
                                                    @elseif (Auth::user()->role == 'Sekertaris')
                                                    <h5><strong>
                                                            <center>Laporan Bendahara</center>
                                                        </strong></h5>
                                                    <p>{!! $data_pengajuan->bendahara !!}</p><br>
                                                    <div class="form-group">
                                                        <label for="sekertaris">Laporan sekertaris</label>
                                                        <textarea name="sekertaris" class="textarea @error('sekertaris') is-invalid @enderror" id="sekertaris" rows="4" placeholder="Eusian sekertaris ieu sesuai sekertaris artos anu di bayarkeun"> {{$data_pengajuan->sekertaris}} </textarea>
                                                        @error('sekertaris')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    @endif
                                                    <button type="submit" class="btn btn-success">Kirim Laporan {{ $data_pengajuan->anggota_id }}</button>
                                                    @endif

                                                    @endif

                                                    <input type="hidden" id="id_pengajuan" name="id_pengajuan" value="{{ $data_pengajuan->id }}">
                                                    <input type="hidden" id="anggota_id" name="anggota_id" value="{{ $data_pengajuan->anggota_id }}">
                                                    <input type="hidden" id="jumlah" name="jumlah" value=" {{ $data_pengajuan->jumlah }}">
                                                    <input type="hidden" id="keterangan" name="keterangan" value="{{ $data_pengajuan->keterangan }}">
                                                    <input type="hidden" id="tanggal" name="tanggal" value="{{ $data_pengajuan->tanggal }}">
                                                    <input type="hidden" id="kategori" name="kategori" value="{{ $data_pengajuan->kategori }}">
                                                    <input type="hidden" id="foto1" name="foto1" value="{{ $data_pengajuan->foto }}">

                                                    <input type="hidden" id="pembayaran" name="pembayaran" value="{{ $data_pengajuan->pembayaran }}">
                                                    @if ($data_pengajuan->foto)
                                                    <img src="{{asset($data_pengajuan->foto)}}" alt="" width="50%" class="brand-image elevation-3 " style="display:block; margin:auto">
                                                    @endif
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
@section('script')
<script>
    $("#pengajuan").addClass("active");
    $("#likas").addClass("menu-open");
    $("#pemasukan").addClass("active");
</script>
@endsection