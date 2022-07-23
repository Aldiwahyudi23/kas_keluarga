@extends('template_backend.home')

@section('heading', 'Pemasukan')
@section('page')
<li class="breadcrumb-item active">Pemasukan</li>
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
@if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Bendahara')
<div class="alert alert-info alert-dismissible fade show col-md-12" role="alert">
    <b><i class="fas fa-info"></i> INFO !!!</b> <br>
    form ieu di input pami anggota alim nginput di web anjenna. Maka bendahara kedah ngesian form di handap sesuai pembayaran uang kas anu di bayarkeun.
    <br> <b>Pembayaran</b> Pilih metode pembayaran nu bade di lakukeun
    <br> <b>Anggota</b> Pilih anggota anu bayar
    <br> <b>tanggal</b> sesuai tanggal pembayaran
    <br> <b>keterangan</b>, esian sesuai kondisi pembayaran !!!
    <br> <b>Contoh :</b> Uang di titipkeun ka Angga. <br>
    <br> Kanggo Bendahara Ngisi pembayaran uang kas pribadi tina halaman ieu, kantun milih nami Rifki A F

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@else
<div class="alert alert-info alert-dismissible fade show col-md-12" role="alert">
    <b><i class="fas fa-info"></i> INFO !!!</b> <br>
    Mangga eusian form di handap sesuai pembayaran uang kas anu di bayarkeun.
    <br> <b>Pembayaran</b> Pilih metode pembayaran nu bade di lakukeun
    <br> <b>tanggal</b> sesuai tanggal pembayaran
    <br> <b>keterangan</b>, esian sesuai kondisi pembayaran !!!
    <br> <b>Contoh :</b> Uang di titipkeun ka Angga.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        <h4><i class="nav-icon fas fa-credit-card my-1 btn-sm-1"></i> Bayar Kas</h4>
        <hr>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active btn-sm" href="#ang" data-toggle="tab"> BAYAR KAS </a></li>
                                    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Bendahara' || Auth::user()->role == 'Sekertaris' )
                                    <li class="nav-item"><a class="nav-link btn-sm" href="#to" data-toggle="tab"> SETOR TUNAI</a></li>
                                    @endif

                                </ul>
                            </div>
                            <div class="card-body table-responsive">
                                <div class="tab-content">
                                    <!-- Awal Tabel Bayar -->
                                    <div class="tab-pane" id="to">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <h6 class="card-header bg-light p-3"><i class="fas fa-credit-card"></i> SETOR TUNAI</h6>
                                                <div class="card-body">
                                                    <form action="{{Route('pemasukan.store')}}" method="POST" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="form-group row">
                                                            <label for="jumlah">Jumlah</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp.</span>
                                                                </div>
                                                                <input value="{{old('jumlah')}}" name="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah">
                                                                <input type="hidden" name="kategori" id="kategori" value="Setor_Tunai">
                                                                <input type="hidden" name="pembayaran" id="pembayaran" value="Transfer">
                                                                <input type="hidden" name="anggota_id" id="anggota_id" value="{{Auth::id()}}">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">.00</span>
                                                                </div>
                                                                @error('jumlah')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="keterangan">Keterangan</label>
                                                            <textarea name="keterangan" class="form-control bg-light @error('keterangan') is-invalid @enderror" id="keterangan" rows="3" placeholder="Eusian Keterangan ieu sesuai keterangan artos anu di bayarkeun">{{old('keterangan')}}</textarea>
                                                            @error('keterangan')
                                                            <div class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <hr>
                                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Setor</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Akhir toggel 1 -->
                                    <!-- Awal table data -->
                                    <div class="active tab-pane" id="ang">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Bendahara')

                                                <h6 class="card-header bg-light p-3"><i class="fas fa-credit-card"></i> TAMBAH KAS</h6>
                                                <div class="card-body table-responsive">
                                                    <form action="{{Route('pemasukan.store')}}" method="POST" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="form-group row">
                                                            <label for="pembayaran">Metode Pembayaran</label>
                                                            <select name="pembayaran" id="pembayaran" class="form-control select2bs4 @error('pembayaran') is-invalid @enderror" required>

                                                                <option value="">--Pilih Pembayaran--</option>
                                                                <option value="Cash">Uang Tunai</option>
                                                                <option value="Transfer">Transfer</option>
                                                            </select>
                                                            @error('pembayaran')
                                                            <div class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group row" id="noId">

                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="anggota_id">Anggota</label>
                                                            <select name="anggota_id" id="anggota_id" class="form-control select2bs4 @error('anggota_id') is-invalid @enderror" required>
                                                                @if (old('pembayaran') == true)
                                                                <option value="{{old('anggota_id')}}">{{old('anggota_id')}}</option>
                                                                @endif
                                                                <option value="">-- Pilih Anggota --</option>
                                                                @foreach($data_anggota as $anggota)
                                                                <option value="{{$anggota->id}}">{{$anggota->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('anggota_id')
                                                            <div class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="jumlah">Jumlah</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp.</span>
                                                                </div>
                                                                <input value="{{old('jumlah')}}" name="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah">
                                                                <input type="hidden" name="kategori" id="kategori" value="Bayar">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">.00</span>
                                                                </div>
                                                                @error('jumlah')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="keterangan">Keterangan</label>
                                                            <textarea name="keterangan" class="form-control bg-light @error('keterangan') is-invalid @enderror" id="keterangan" rows="3" placeholder="Eusian Keterangan ieu sesuai keterangan artos anu di bayarkeun">{{old('keterangan')}}</textarea>
                                                            @error('keterangan')
                                                            <div class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <hr>
                                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> SIMPEN</button>
                                                    </form>


                                                </div>

                                                @else
                                                <h6 class="card-header bg-light p-3"><i class="fas fa-credit-card"></i> TAMBAH KAS</h6>
                                                <div class="card-body">
                                                    <form action="{{Route('pengajuan.store')}}" method="POST" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class=" form-group row">
                                                            <label for="pembayaran">Metode Pembayaran</label>
                                                            <select name="pembayaran" id="pembayaran" class="form-control select2bs4 @error('pembayaran') is-invalid @enderror">
                                                                <option value="">--Pilih Pembayaran--</option>
                                                                <option value="Cash">Uang Tunai</option>
                                                                <option value="Transfer">Transfer</option>
                                                            </select>
                                                            @error('pembayaran')
                                                            <div class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="jumlah">Jumlah</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp.</span>
                                                                </div>
                                                                <input value="{{old('jumlah')}}" name="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah">
                                                                <input type="hidden" name="anggota_id" id="anggota_id" value="{{Auth::id()}}">
                                                                <input type="hidden" name="kategori" id="kategori" value="Bayar">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">.00</span>
                                                                </div>
                                                                @error('jumlah')
                                                                <div class="invalid-feedback">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="keterangan">Keterangan</label>
                                                            <textarea name="keterangan" class="form-control bg-light @error('keterangan') is-invalid @enderror" id="keterangan" rows="3" placeholder="Eusian Keterangan ieu sesuai keterangan artos anu di bayarkeun">{{old('keterangan')}}</textarea>
                                                            @error('keterangan')
                                                            <div class="invalid-feedback">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group row" id="noId">

                                                        </div>
                                                        <hr>
                                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> BAYAR</button>
                                                    </form>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">

                        <div class="card-body">
                            <p>
                                Uang kas anu atos di input bakal lebet kana data di handap pami atos di konfirmasi ku bendahara sesuai keterangan anu tos di input.
                            </p> <br>
                            <p>
                                Data kas anu di handap, sesuai data anu atos di bayar. makana di harapkeun di cek setiap saat, bilih aya data anu hente sesuai sareng pemasukan arurang.
                            </p> <br>
                            <table class="table" style="margin-top: -10px;">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{Auth::user()->name}}</td>
                                </tr>

                                <tr>
                                    <td>Ketua</td>
                                    <td>:</td>
                                    <td>Supriatna</td>
                                </tr>
                                @php
                                $bulan = date('m');
                                $tahun = date('Y');
                                @endphp
                                <tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td>:</td>
                                    <td>
                                        @if ($bulan > 5)
                                        {{ $tahun }}/{{ $tahun+1 }}
                                        @else
                                        {{ $tahun-1 }}/{{ $tahun }}
                                        @endif
                                    </td>
                                </tr>

                            </table>


                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-light p-2">
                                <ul class="nav nav-pills">
                                    @if (Auth::user()->role == 'Ketua' || Auth::user()->role == 'Bendahara' || Auth::user()->role == 'Sekertaris' || Auth::user()->role == 'Anggota' )
                                    <li class="nav-item"><a class="nav-link btn-sm" href="#set" data-toggle="tab"> Pemasukan</a></li>
                                    @endif
                                    <li class="nav-item"><a class="nav-link active btn-sm" href="#semua" data-toggle="tab"> Semua Pemasukan</a></li>
                                    <li class="nav-item"><a class="nav-link btn-sm" href="#setor" data-toggle="tab">Setor Tunai</a></li>
                                    <li class="nav-item"><a class="nav-link btn-sm" href="#anggota" data-toggle="tab">Anggota</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Awal data pemasukan -->
                                    <div class="active tab-pane" id="semua">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <div class="col-12">
                                                    <table class="table table-hover table-head-fixed" id='example1'>
                                                        <a href="{{Route('pemasukan.lihat')}}">Lihat semua </a>
                                                        <thead>
                                                            <tr class="bg-light">
                                                                <th>No.</th>
                                                                <th>Nama</th>
                                                                <th>Tanggal</th>
                                                                <th>Jumlah</th>
                                                                <th>aksi</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            @php
                                                            $total = 0;
                                                            @endphp
                                                            @foreach($data_semua as $data)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{$data->anggota->name}}</td>
                                                                <td>{{date('M-y',strtotime($data->tanggal)) }}</td>
                                                                <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>


                                                                <td>
                                                                    <form action="{{route('pemasukan.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a href="{{route('pemasukan.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-book"></i></a>
                                                                        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Sekertaris')
                                                                        <a href="{{route('pemasukan.edit',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-pencil-alt"></i></a>
                                                                        @endif
                                                                        @if (auth()->user()->role == 'Admin')
                                                                        <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina   ?')"></i> </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @php
                                                            $total += $data->jumlah;
                                                            @endphp
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="3" class="text-center"><b>Total</b></th>
                                                                <th colspan="1"><b>{{ "Rp " . number_format( $total,2,',','.') }}</b></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir togle data pemasukan -->
                                    <!-- Awal data pemasukan -->
                                    <div class="tab-pane" id="setor">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <div class="col-12">
                                                    <table class="table table-hover table-head-fixed" id='example1'>
                                                        <a href="{{Route('pemasukan.lihat')}}">Lihat semua </a>
                                                        <thead>
                                                            <tr class="bg-light">
                                                                <th>No.</th>
                                                                <th>Nama</th>
                                                                <th>Tanggal</th>
                                                                <th>Jumlah</th>
                                                                <th>aksi</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            @php
                                                            $total = 0;
                                                            @endphp
                                                            @foreach($data_semua_setor as $data)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{$data->anggota->name}}</td>
                                                                <td>{{date('M-y',strtotime($data->tanggal)) }}</td>
                                                                <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>


                                                                <td>
                                                                    <form action="{{route('pemasukan.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a href="{{route('pemasukan.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-book"></i></a>
                                                                        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Sekertaris')
                                                                        <a href="{{route('pemasukan.edit',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-pencil-alt"></i></a>
                                                                        @endif
                                                                        @if (auth()->user()->role == 'Admin')
                                                                        <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina   ?')"></i> </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @php
                                                            $total += $data->jumlah;
                                                            @endphp
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="3" class="text-center"><b>Total</b></th>
                                                                <th colspan="1"><b>{{ "Rp " . number_format( $total,2,',','.') }}</b></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir togle data pemasukan -->


                                    <!-- awal data anggota -->
                                    <div class="tab-pane" id="set">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <div class="col-12">
                                                    <table class="table table-hover table-head-fixed" id='example1'>
                                                        <thead>
                                                            <tr class="bg-light">
                                                                <th>No.</th>
                                                                <th>Tanggal</th>
                                                                <th>Jumlah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 0;
                                                            ?>
                                                            @php
                                                            $total = 0;
                                                            @endphp
                                                            @foreach($data_setor as $data)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{date('M-y',strtotime($data->tanggal)) }}</td>
                                                                <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>

                                                            </tr>

                                                            @php
                                                            $total += $data->jumlah;
                                                            @endphp
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="2" class="text-center"><b>Total</b></th>
                                                                <th colspan="1"><b>{{ "Rp " . number_format( $total,2,',','.') }}</b></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- awal data anggota -->
                                    <div class="tab-pane" id="anggota">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <div class="col-12">
                                                    <table class="table table-hover table-head-fixed" id='example1'>
                                                        <thead>
                                                            <tr class="bg-light">
                                                                <th>No.</th>
                                                                <th>Nama</th>
                                                                <th>Saldo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            @foreach($data_anggota as $anggota)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{$anggota->name}}</td>
                                                                <?php
                                                                $id = $anggota->id;

                                                                $setor = DB::table('pemasukans')->where('pemasukans.kategori', '=', 'Bayar');
                                                                $total_setor = $setor->where('pemasukans.anggota_id', '=', $id)
                                                                    ->sum('pemasukans.jumlah');
                                                                    
                                                                $total_tarik = DB::table('pengeluarans')->where('pengeluarans.anggota_id', '=', $id)
                                                                    ->sum('pengeluarans.jumlah');
                                                                $jumlah = $total_setor;
                                                                ?>
                                                                <td>{{ "Rp " . number_format( $jumlah,2,',','.') }}</td>
                                                            </tr>
                                                            @php
                                                            $total += $jumlah;
                                                            @endphp
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="2" class="text-center"><b>Total</b></th>
                                                                <th colspan="1"><b>{{ "Rp " . number_format( $total,2,',','.') }}</b></th>
                                                            </tr>
                                                        </tfoot>
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
    $(document).ready(function() {
        $('#pembayaran').change(function() {
            var kel = $('#pembayaran option:selected').val();
            if (kel == "Transfer") {
                $("#noId").html('<div class="form-group"><label for="account-company">Bukti Transfer</label><input type="file" class="form-control" name="foto" id="foto" required /><span class="text-danger" style="font-size: 10px">Harap kirim tanda bukti transferan.</span></div>');
            } else if (kel == "Siswa") {
                $("#noId").html(`<label for="nomer">Nomer Induk Siswa</label><input id="nomer" type="text" placeholder="No Induk Siswa" class="form-control" name="nomer" autocomplete="off">`);
            } else if (kel == "Admin" || kel == "Operator") {
                $("#noId").html(`<label for="name">Username</label><input id="name" type="text" placeholder="Username" class="form-control" name="name" autocomplete="off">`);
            } else {
                $("#noId").html(' <input type="hidden" name="anggota_id" value="0">')
            }
        });
    });
    $("#Pemasukan").addClass("active");
</script>
@endsection