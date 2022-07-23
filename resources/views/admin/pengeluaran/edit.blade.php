@extends('template_backend.home')

@section('heading', 'Peminjaman')
@section('page')
<li class="breadcrumb-item active">Peminjaman</li>
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
<div class="alert alert-info alert-dismissible fade show col-md-12" role="alert">
    <b><i class="fas fa-info"></i> INFO !!!</b> <br>
    - Pengeditan kedah sepengetahuan pengurus nu sanes <br>
    - Alasan pengeditan kedah jelas, maksud naha di edit. <br>
    - Sateacan di simpen,cek deui data na <br>

</div>
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        <h4><i class="nav-icon fas fa-credit-card my-1 btn-sm-1"></i> Edit Pengeluaran</h4>
        <hr>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <h6 class="card-header bg-light p-3">EDIT DATA {{$data_pengeluaran->anggaran->nama_anggaran}}</h6>
                            <div class="card-body">
                                <form action="{{Route('pengeluaran.update',Crypt::encrypt($data_pengeluaran->id))}}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    {{csrf_field()}}
                                    <div class="card-body table-responsive">
                                        <div class="row">
                                            <input type="hidden">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="anggaran_id">Anggaran</label>
                                                    <select id="anggaran_id" name="anggaran_id" class="select2bs4 form-control @error('anggaran_id') is-invalid @enderror">
                                                        @if (old('anggaran_id',$data_pengeluaran->anggaran_id) == true)
                                                        <option value="{{old('anggaran_id',$data_pengeluaran->anggaran_id)}}">{{old('nama_anggaran',$data_pengeluaran->anggaran->nama_anggaran)}}</option>
                                                        @endif
                                                        <option value="">-- Pilih Anggaran --</option>
                                                        @foreach ($data_anggaran as $data)
                                                        <option value="{{$data->id}}"> {{$data->nama_anggaran}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('anggaran_id')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal Di Setujui</label>
                                                    <input type="datetime" id="" name="" value="{{$data_pengeluaran->created_at }}" placeholder="Nama inisial" class="form-control @error('') is-invalid @enderror" disabled>

                                                </div>

                                                <div class="form-group">
                                                    <label for="jumlah">jumlah</label>
                                                    <input type="text" id="jumlah" name="jumlah" value="{{$data_pengeluaran->jumlah}}" placeholder="contoh@gmail.com" class="form-control @error('jumlah') is-invalid @enderror">
                                                    @error('jumlah')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group row">
                                                    <label for="alasan">alasan</label>
                                                    <textarea name="alasan" class="form-control bg-light @error('alasan') is-invalid @enderror" id="alasan" rows="3" placeholder="Eusian alasan ieu sesuai alasan artos anu di pinjam">{{old('alasan',$data_pengeluaran->alasan)}}</textarea>
                                                    @error('alasan')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if ($data_pengeluaran->anggaran_id == 3)
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal Pengajuan</label>
                                                    <input type="datetime" id="tanggal" name="tanggal" value="{{ old('tanggal',$data_pengeluaran->tanggal) }}" placeholder="Nama inisial" class="form-control @error('tanggal') is-invalid @enderror" disabled>
                                                    @error('tanggal')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="anggota_kel_id">Anggota Keluarga</label>
                                                    <select id="anggota_kel_id" name="anggota_kel_id" class="select2bs4 form-control @error('anggota_kel_id') is-invalid @enderror">
                                                        @if (old('anggota_kel_id',$data_pengeluaran->anggota_id) == true)
                                                        <option value="{{old('anggota_kel_id',$data_pengeluaran->anggota_id)}}">{{old('nama',$data_pengeluaran->anggota->name)}}</option>
                                                        @endif
                                                        <option value="">-- Pilih Nama --</option>
                                                        @foreach ($data_anggota as $data)
                                                        <option value="{{$data->id}}"> {{$data->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('anggota_kel_id')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ketua">Laporan ketua</label>
                                            <textarea name="ketua" class="textarea @error('ketua') is-invalid @enderror" id="ketua" rows="3" placeholder="Eusian ketua ieu sesuai ketua artos anu di bayarkeun"> {{$data_pengeluaran->ketua}} </textarea>
                                            <input type="hidden" id="status" name="status" value="Tunda">
                                            @error('ketua')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="sekertaris">Laporan sekertaris</label>
                                            <textarea name="sekertaris" class="textarea @error('sekertaris') is-invalid @enderror" id="sekertaris" rows="3" placeholder="Eusian sekertaris ieu sesuai sekertaris artos anu di bayarkeun"> {{$data_pengeluaran->sekertaris}} </textarea>
                                            <input type="hidden" id="status" name="status" value="Tunda">
                                            @error('sekertaris')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bendahara">Laporan bendahara</label>
                                            <textarea name="bendahara" class="textarea @error('bendahara') is-invalid @enderror" id="bendahara" rows="3" placeholder="Eusian bendahara ieu sesuai bendahara artos anu di bayarkeun"> {{$data_pengeluaran->bendahara}} </textarea>
                                            <input type="hidden" id="status" name="status" value="Tunda">
                                            @error('bendahara')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Leres bade di simpen hasil editanna ? , Pengeditan kedah sepengetahuan nu sanes !')">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">

                            <div class="card-header bg-light p-2">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <b><i class="fas fa-info"></i> Laporan !!!</b> <br>
                                    Sadayana laporan pengluaran tiasa di tingal di handap <br>
                                    Supados jelas mangga klik pilihan di handap
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <ul class="nav nav-pills">
                                    @if (Auth::user()->role == "Admin" || Auth::user()->role == "Ketua" ||Auth::user()->role == "Bendahara" ||Auth::user()->role == "Sekertaris" )
                                    <li class="nav-item"><a class="nav-link active btn-sm" href="#setor" data-toggle="tab"><i class="fas fa-credit-card"></i> Data Pengluaran</a></li>
                                    <li class="nav-item"><a class="nav-link btn-sm" href="#pinja" data-toggle="tab"><i class=""></i> Data Pinjam</a></li>
                                    @endif
                                    <li class="nav-item"><a class="nav-link btn-sm" href="#darura" data-toggle="tab"><i class=""></i> Data Darurat</a></li>
                                    <li class="nav-item"><a class="nav-link btn-sm" href="#ama" data-toggle="tab"><i class=""></i> Data Amal</a></li>
                                    <li class="nav-item"><a class="nav-link btn-sm" href="#usah" data-toggle="tab"><i class=""></i> Data Usaha</a></li>
                                    <li class="nav-item"><a class="nav-link btn-sm" href="#acar" data-toggle="tab"><i class=""></i> Data Acara</a></li>
                                    <li class="nav-item"><a class="nav-link btn-sm" href="#lai" data-toggle="tab"><i class=""></i> Data Lain-Lain</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- seluruh data penarikan -->
                                    <div class="active tab-pane" id="setor">
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
                                                            <?php $no = 0; ?>
                                                            @foreach($data_semua as $data)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{$data->tanggal}}</td>
                                                                <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir togle data penarikan -->


                                    <!-- awal data darurat -->
                                    <div class="tab-pane" id="darura">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <div class="col-12">
                                                    <table class="table table-hover table-head-fixed" id='example1'>
                                                        <thead>
                                                            <tr class="bg-light">
                                                                <th>No.</th>
                                                                <th>Tanggal</th>
                                                                <th>Jumlah</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            @foreach($dana_darurat as $data)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{$data->tanggal}}</td>
                                                                <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                                                <td>
                                                                    <form action="{{route('pengeluaran.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a href="{{route('pengeluaran.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-book"></i></a>
                                                                        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Sekertaris')
                                                                        <a href="{{route('pengeluaran.edit',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-pencil-alt"></i></a>
                                                                        @endif
                                                                        @if (auth()->user()->role == 'Admin')
                                                                        <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina   ?')"></i> </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- awal data amal -->
                                    <div class="tab-pane" id="ama">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <div class="col-12">
                                                    <table class="table table-hover table-head-fixed" id='example1'>
                                                        <thead>
                                                            <tr class="bg-light">
                                                                <th>No.</th>
                                                                <th>Tanggal</th>
                                                                <th>Jumlah</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            @foreach($dana_amal as $data)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{$data->tanggal}}</td>
                                                                <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                                                <td>
                                                                    <form action="{{route('pengeluaran.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a href="{{route('pengeluaran.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-book"></i></a>
                                                                        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Sekertaris')
                                                                        <a href="{{route('pengeluaran.edit',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-pencil-alt"></i></a>
                                                                        @endif
                                                                        @if (auth()->user()->role == 'Admin')
                                                                        <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina   ?')"></i> </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- awal data pinjam -->
                                    <div class="tab-pane" id="pinja">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <div class="col-12">
                                                    <table class="table table-hover table-head-fixed" id='example1'>
                                                        <thead>
                                                            <tr class="bg-light">
                                                                <th>No.</th>
                                                                <th>Nama Peminjam</th>
                                                                <th>Tanggal</th>
                                                                <th>Jumlah</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            @foreach($dana_pinjam as $data)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{$data->anggota->name}}</td>
                                                                <td>{{$data->tanggal}}</td>
                                                                <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                                                <td>
                                                                    <form action="{{route('pengeluaran.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a href="{{route('pengeluaran.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-book"></i></a>
                                                                        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Sekertaris')
                                                                        <a href="{{route('pengeluaran.edit',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-pencil-alt"></i></a>
                                                                        @endif
                                                                        @if (auth()->user()->role == 'Admin')
                                                                        <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina   ?')"></i> </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- awal data usaha -->
                                    <div class="tab-pane" id="usah">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <div class="col-12">
                                                    <table class="table table-hover table-head-fixed" id='tabelAgendaAmal'>
                                                        <thead>
                                                            <tr class="bg-light">
                                                                <th>No.</th>
                                                                <th>Tanggal</th>
                                                                <th>Jumlah</th>

                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            @foreach($dana_usaha as $data)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{$data->tanggal}}</td>
                                                                <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                                                <td>
                                                                    <form action="{{route('pengeluaran.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a href="{{route('pengeluaran.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-book"></i></a>
                                                                        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Sekertaris')
                                                                        <a href="{{route('pengeluaran.edit',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-pencil-alt"></i></a>
                                                                        @endif
                                                                        @if (auth()->user()->role == 'Admin')
                                                                        <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina   ?')"></i> </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- awal data acara -->
                                    <div class="tab-pane" id="acar">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <div class="col-12">
                                                    <table class="table table-hover table-head-fixed" id='tabelAgendaAmal'>
                                                        <thead>
                                                            <tr class="bg-light">
                                                                <th>No.</th>
                                                                <th>Tanggal</th>
                                                                <th>Jumlah</th>

                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            @foreach($dana_acara as $data)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{$data->tanggal}}</td>
                                                                <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                                                <td>
                                                                    <form action="{{route('pengeluaran.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a href="{{route('pengeluaran.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-book"></i></a>
                                                                        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Sekertaris')
                                                                        <a href="{{route('pengeluaran.edit',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-pencil-alt"></i></a>
                                                                        @endif
                                                                        @if (auth()->user()->role == 'Admin')
                                                                        <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina   ?')"></i> </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- awal data laian-laian -->
                                    <div class="tab-pane" id="lai">
                                        <div class="row">
                                            <div class="row table-responsive">
                                                <div class="col-12">
                                                    <table class="table table-hover table-head-fixed" id='tabelAgendaAmal'>
                                                        <thead>
                                                            <tr class="bg-light">
                                                                <th>No.</th>
                                                                <th>Tanggal</th>
                                                                <th>Jumlah</th>

                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            @foreach($dana_lain as $data)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{$data->tanggal}}</td>
                                                                <td>{{ "Rp " . number_format($data->jumlah,2,',','.') }}</td>
                                                                <td>
                                                                    <form action="{{route('pengeluaran.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a href="{{route('pengeluaran.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-book"></i></a>
                                                                        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Sekertaris')
                                                                        <a href="{{route('pengeluaran.edit',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-pencil-alt"></i></a>
                                                                        @endif
                                                                        @if (auth()->user()->role == 'Admin')
                                                                        <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina   ?')"></i> </button>
                                                                        @endif
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- akhir -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /.container-fluid -->
        </section>
    </div>
</section>

@endsection
@section('script')
<script>
    $("#Peminjaman").addClass("active");
</script>
@endsection