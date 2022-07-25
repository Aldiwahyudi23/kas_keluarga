@extends('template_backend.home')
@section('heading', 'Dashboard')
@section('page')
<li class="breadcrumb-item active">Dashboard</li>
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
<div class="container">
    <div class="callout callout-primary alert alert-primary alert-dismissible fade show" role="alert">
        <h5><i class="fas fa-info"></i> Informasi :</h5>
        <p>Punten, Nyuhunkeun kerja samana kanggo ngisi data keluarga</p>
        <p>Data keluarga penting kanggo pendataan keluarga alm. ma Haya supados teu pareman obor</p> <br>
        <a href="{{Route('keluarga.detail',Crypt::encrypt(1))}}">
            <h5><i class="fas fa-check"></i> Klik </h5> Kanggo nambah sareng edit data keluarga
        </a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<div class="col-md-12">
    <div class="card card-warning" style="min-height: 385px;">
        <div class="card-header">
            <h3 class="card-title" style="color: white;">
                Pengumuman
            </h3>
        </div>
        <div class="card-body table-responsive">
            <div class="tab-content p-0">
                <!-- isi pengumuman -->
                {{$pengumuman->isi}}
            </div>
        </div>
    </div>
</div>
<!-- lAPORAN kAS -->
<?php

use Illuminate\Support\Facades\DB;
// pengluaran
$jumlah_pengeluaran = DB::table('pengeluarans')
    ->sum('pengeluarans.jumlah');
$pengeluaran_pinjaman = DB::table('pengeluarans')->where('anggaran_id', 3)
    ->sum('pengeluarans.jumlah');
$pengeluaran_darurat = DB::table('pengeluarans')->where('anggaran_id', 1)
    ->sum('pengeluarans.jumlah');
$pengeluaran_amal = DB::table('pengeluarans')->where('anggaran_id', 2)
    ->sum('pengeluarans.jumlah');
$pengeluaran_kas = DB::table('pengeluarans')->where('anggaran_id', 4)
    ->sum('pengeluarans.jumlah');

// Pemasukan kas
$jumlah_pemasukan = DB::table('pemasukans')->where('kategori', 'Kas')
    ->sum('pemasukans.jumlah');
$kas = $jumlah_pemasukan / 2;
$bagi2 = $jumlah_pemasukan / 2;
$amal = $bagi2 * 10 / 100;
$sisa = $bagi2 * 90 / 100;
$darurat = $sisa / 2;
$pinjam = $sisa / 2;

$saldo = $jumlah_pemasukan - $jumlah_pengeluaran;

$bayar_pinjam =
    DB::table('bayar_pinjaman')
    ->sum('bayar_pinjaman.jumlah_bayar');

// Saldo atm 
$jumlah_ATM = DB::table('pemasukans')->where('pembayaran', 'Transfer')
    ->sum('pemasukans.jumlah');
// Uang di bendahara
$jumlah_uang_cash = DB::table('pemasukans')->where('pembayaran', 'Cash')
    ->sum('pemasukans.jumlah');
// setor tunai
$jumlah_pemasukan_setor = DB::table('pemasukans')->where('kategori', 'Setor_Tunai')
    ->sum('pemasukans.jumlah');
//  Tabungan
$jumlah_tabungan = DB::table('pemasukans')->where('kategori', 'Tabungan')
    ->sum('pemasukans.jumlah');
$keperluan = DB::table('pengeluarans')->where('anggaran_id', 7)
    ->sum('pengeluarans.jumlah');
$sekolah = DB::table('pengeluarans')->where('anggaran_id', 8)
    ->sum('pengeluarans.jumlah');
$nikah = DB::table('pengeluarans')->where('anggaran_id', 9)
    ->sum('pengeluarans.jumlah');
$penarikan = $keperluan + $sekolah + $nikah;

?>
@if (Auth::user()->program1 == "Kas")
@if(Auth::user()->role == "Admin" || Auth::user()->role == "Sekertaris" || Auth::user()->role == "Bendahara" || Auth::user()->role == "Ketua")
<div class="col-md-12">

    <section class="content card" style="padding: 15px 15px 0px 15px ">
        <div class="box">
            <div class="row">
                <div class="col">
                    <h4><i class="nav-icon fas fa-dollar-sign my-0 btn-sm-1"></i> Laporan Uang nu terkumpul</h4>
                    <hr>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-1 pr-1">
                    <a href="javascript:void(0)" class="product-title">Saldo ATM</a>
                    <h5>{{"Rp" . number_format($jumlah_ATM ,2,',','.')}}</h5>
                    <p>Saldo ATM, saldo anu aya tina tabungan kas keluarga. Jumlah <b>saldo ATM</b> di tambah artos nu masih di <b>bendahara</b> kedah <b>sami</b> sareng jumlah <b>SALDO tiap Laporan</b> </p>
                    <hr />
                </ul>
                <ul class="products-list product-list-in-card pl-1 pr-1">
                    <a href="javascript:void(0)" class="product-title">Uang dibendahara nu teu acan di TF</a>
                    <h5>{{"Rp" . number_format( $jumlah_uang_cash - $jumlah_pemasukan_setor,2,',','.')}}</h5>
                    <p>Artos nu teu acan di setor tunai keun ku bendahara, sareng nu masih di pegang ku bendahara atanapi sekertaris</p>
                    <hr />
                </ul>
            </div>
        </div>
    </section>
</div>
<div class="row">
    <div class="col-md-5">
        <section class="content card" style="padding: 15px 15px 0px 15px ">
            <div class="box">
                <div class="row">
                    <div class="col">
                        <h4><i class="nav-icon fas fa-dollar-sign my-0 btn-sm-1"></i> Laporan KAS</h4>
                        <hr>
                    </div>
                </div>
                <div class="card-body p-0">

                    <ul class="products-list product-list-in-card pl-1 pr-1">
                        <a href="/pemasukan/detail" class="product-title">Jumlah Pemasukan Kas</a>
                        <h5>{{ "Rp " . number_format($jumlah_pemasukan,2,',','.') }}</h5>
                        <p>Jumlah sadayana artos pemasukan uang kas nu terkumpul ti awal sareng dugi ayeuna</p>
                        <hr>
                    </ul>

                    <ul class="products-list product-list-in-card pl-1 pr-1">
                        <a href="/pengeluaran/detail" class="product-title">Jumlah Pengeluaran Kas</a>
                        <h5>{{ "Rp " . number_format($jumlah_pengeluaran- $pengeluaran_pinjaman,2,',','.') }}</h5>
                        <p> Jumlah sadayana pengluaran sesuai data anggaran, kecuali data pinjaman tidak termasuk pengluaran.</p>
                        <hr>
                    </ul>
                    <ul class="products-list product-list-in-card pl-1 pr-1">
                        <b> <a href="javascript:void(0)" class="product-title">Saldo Kas</a>
                            <h4>{{"Rp" . number_format( $saldo + $bayar_pinjam,2,',','.')}}</h4>
                            <p> Jumlah Total saldo anu aya di bendahara atawa sisa tina pengeluaran termasuk data pinjaman. </p>
                            <hr />
                        </b>
                    </ul>

                    <ul class="products-list product-list-in-card pl-1 pr-1">
                        <a href="javascript:void(0)" class="product-title">Uang nu di pinjem</a>
                        <h5>{{"Rp" . number_format( $pengeluaran_pinjaman,2,',','.')}}</h5>
                        <hr />
                    </ul>

                </div>
            </div>

        </section>
    </div>
    <div class="col-md-4">
        <section class="content card" style="padding: 15px 15px 0px 15px ">
            <div class="box">
                <div class="row">
                    <div class="col">
                        <h4><i class="nav-icon fas fa-dollar-sign my-0 btn-sm-1"></i> Laporan TABUNGAN</h4>
                        <hr>
                    </div>
                </div>
                <div class="card-body p-0">

                    <ul class="products-list product-list-in-card pl-1 pr-1">
                        <a href="/pemasukan/detail" class="product-title">Jumlah Pemasukan Tabungan</a>
                        <h5>{{ "Rp " . number_format($jumlah_tabungan,2,',','.') }}</h5>
                        <p>Jumlah sadayana artos tabungan anggota</p>
                        <hr>
                    </ul>
                    <ul class="products-list product-list-in-card pl-1 pr-1">
                        <a href="/pengeluaran/detail" class="product-title">Jumlah Penarikan Tabungan</a>
                        <h5>{{ "Rp " . number_format($penarikan,2,',','.') }}</h5>
                        <p> Jumlah sadayana Penarikan tabungan anggota.</p>
                        <hr>
                    </ul>
                    <ul class="products-list product-list-in-card pl-1 pr-1">
                        <b> <a href="javascript:void(0)" class="product-title">Jumlah sisa Tabungan</a>
                            <h4>{{"Rp" . number_format( $jumlah_tabungan - $penarikan,2,',','.')}}</h4>
                            <p> Jumlah sisa tabungan anggota, sisa tina penarikan. </p>
                            <hr />
                        </b>
                    </ul>


                </div>
            </div>

        </section>
    </div>
    @endif
    <!-- lAPORAN DANA KAS -->
    @if (Auth::user()->role == "Anggota" )
    <div class="col-md-12">
        @else
        <div class="col-md-3">
            @endif
            <section class="content card" style="padding: 15px 15px 0px 15px ">
                <div class="box">
                    <div class="row">
                        <div class="col">
                            <h4><i class="nav-icon fas fa-dollar-sign my-0 btn-sm-1"></i> Dana Anggaran KAS</h4>
                            <hr>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-1 pr-1">
                            <b> <a href="javascript:void(0)" class="product-title">Saldo Kas</a>
                                <h4>{{"Rp" . number_format( $saldo + $bayar_pinjam,2,',','.')}}</h4>
                                <p> Jumlah Total saldo anu aya di bendahara atawa sisa tina pengeluaran termasuk data pinjaman. </p>
                                <hr />
                            </b>
                        </ul>
                        <ul class="products-list product-list-in-card pl-1 pr-1">
                            <a href="/anggaran/1/detail" class="product-title">Jumlah Dana Darurat</a>
                            <h5>{{ "Rp " . number_format($darurat-$pengeluaran_darurat ,2,',','.') }}</h5>
                        </ul>
                        <ul class="products-list product-list-in-card pl-1 pr-1">
                            <a href="/pengluaran/pinjam/anggota" class="product-title">Jumlah Dana Darurat nu tos ka angge </a>
                            <h7>{{ "Rp " . number_format($pengeluaran_darurat ,2,',','.') }}</h7>
                            <hr>
                        </ul>
                        <ul class="products-list product-list-in-card pl-1 pr-1">
                            <a href="/anggaran/2/detail" class="product-title">Jumlah Dana Amal</a>
                            <h5>{{ "Rp " . number_format($amal-$pengeluaran_amal,2,',','.') }}</h5>
                        </ul>
                        <ul class="products-list product-list-in-card pl-1 pr-1">
                            <a href="/pengluaran/pinjam/anggota" class="product-title">Jumlah Dana Amal nu tos ka angge </a>
                            <h7>{{ "Rp " . number_format($pengeluaran_amal ,2,',','.') }}</h7>
                            <hr>
                        </ul>
                        <ul class="products-list product-list-in-card pl-1 pr-1">
                            <a href="/anggaran/4/detail" class="product-title">Jumlah dana KAS</a>
                            <h5>{{"Rp" . number_format($kas-$pengeluaran_kas,2,',','.')}}</h5>
                        </ul>
                        <ul class="products-list product-list-in-card pl-1 pr-1">
                            <a href="/pengluaran/pinjam/anggota" class="product-title">Jumlah Dana Kas nu tos ka angge </a>
                            <h7>{{ "Rp " . number_format($pengeluaran_kas ,2,',','.') }}</h7>
                            <hr>
                        </ul>
                        <ul class="products-list product-list-in-card pl-1 pr-1">
                            <a href="/anggaran/3/detail" class="product-title">Jumlah Dana Pinjam</a>
                            <h5>{{"Rp" . number_format($pinjam-$pengeluaran_pinjaman,2,',','.')}}</h5>
                        </ul>
                        <ul class="products-list product-list-in-card pl-1 pr-1">
                            <a href="/pengluaran/pinjam/anggota" class="product-title">Uang nu di pinjem</a>
                            <h7>{{"Rp" . number_format($pengeluaran_pinjaman,2,',','.')}}</h7>
                            <hr />
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <!-- rIWAYAT LOGIN -->
    </div>
    @endif
    <div class="col-md-3">
        <section class="content card" style="padding: 10px 10px 10px 10px ">
            <div class="box">
                <div class="row">
                    <div class="col">
                        <h4><i class="nav-icon fas fa-user-tag my-0 btn-sm-1"></i> Riwayat Login</h4>
                        <hr>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        @foreach($data_login as $user_login)
                        <li class="item">
                            <div class="product-img">
                                <a href="{{ asset($user_login->foto) }}" data-toggle="lightbox" data-title="Foto {{ Auth::user()->name }}" data-gallery="gallery">

                                    <img src="{{ asset($user_login->foto) }}" alt="Product Image" class="img-size-50 img-circle">
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">{{$user_login->name}} </a>
                                @if(Cache::has('user-is-online-' .$user_login->id))
                                <span class="text-success badge float-right">Online</span>
                                @else
                                <span class="text-secondary badge float-right">Offline</span>
                                @endif <br>
                                <span class="badge float-right"><i class="far fa-clock"></i> {{Carbon\Carbon::parse($user_login->last_seen)->diffForHumans()}}</span>
                            </div>
                        </li>
                        @endforeach
                        <!-- /.item -->
                    </ul>
                </div>
            </div>
        </section>
    </div>

    @endsection