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
        <h4><i class="nav-icon fas fa-credit-card my-1 btn-sm-1"></i> Edit Pemasukan</h4>
        <hr>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <h6 class="card-header bg-light p-3">EDIT DATA {{$data_pemasukan->anggota->name}}</h6>
                            <div class="card-body">
                                <form action="{{Route('pemasukan.update',Crypt::encrypt($data_pemasukan->id))}}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    {{csrf_field()}}
                                    <div class="card-body table-responsive">
                                        <div class="row">
                                            <input type="hidden">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal Di Setujui</label>
                                                    <input type="datetime" id="" name="" value="{{$data_pemasukan->created_at }}" placeholder="Nama inisial" class="form-control @error('') is-invalid @enderror" disabled>

                                                </div>

                                                <div class="form-group">
                                                    <label for="jumlah">jumlah</label>
                                                    <input type="text" id="jumlah" name="jumlah" value="{{$data_pemasukan->jumlah}}" placeholder="contoh@gmail.com" class="form-control @error('jumlah') is-invalid @enderror">
                                                    @error('jumlah')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="pembayaran">pembayaran</label>
                                                    <input type="text" id="pembayaran" name="pembayaran" value="{{$data_pemasukan->pembayaran}}" placeholder="contoh@gmail.com" class="form-control @error('pembayaran') is-invalid @enderror">
                                                    @error('pembayaran')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal Pengajuan</label>
                                                    <input type="datetime" id="tanggal" name="tanggal" value="{{ old('tanggal',$data_pemasukan->tanggal) }}" placeholder="Nama inisial" class="form-control @error('tanggal') is-invalid @enderror" disabled>
                                                    @error('tanggal')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="anggota_id">Anggota Keluarga</label>
                                                    <select id="anggota_id" name="anggota_id" class="select2bs4 form-control @error('anggota_id') is-invalid @enderror">
                                                        @if (old('anggota_id',$data_pemasukan->anggota_id) == true)
                                                        <option value="{{old('anggota_id',$data_pemasukan->anggota_id)}}">{{old('nama',$data_pemasukan->anggota->name)}}</option>
                                                        @endif
                                                        <option value="">-- Pilih Nama --</option>
                                                        @foreach ($data_anggota as $data)
                                                        <option value="{{$data->id}}"> {{$data->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('anggota_id')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group row">
                                                    <label for="keterangan">keterangan</label>
                                                    <textarea name="keterangan" class="form-control bg-light @error('keterangan') is-invalid @enderror" id="keterangan" rows="3" placeholder="Eusian keterangan ieu sesuai keterangan artos anu di pinjam">{{old('keterangan',$data_pemasukan->keterangan)}}</textarea>
                                                    @error('keterangan')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

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
                            <div class="row table-responsive">
                                <div class="col-12">
                                    <table class="table table-hover table-head-fixed" id='example1'>
                                        <a href="{{Route('pemasukan.lihat')}}">Lihat semua </a>
                                        <thead>
                                            <tr class="bg-light">
                                                <th>No.</th>
                                                <th>Anggota</th>
                                                <th>Jumlah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            ?>
                                            @php
                                            $total = 0;
                                            @endphp
                                            @foreach($data_semua as $data)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{$no}}</td>
                                                <td>{{$data->anggota->name}}</td>
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
                                                <th colspan="2" class="text-center"><b>Total</b></th>
                                                <th colspan="1"><b>{{ "Rp " . number_format( $total,2,',','.') }}</b></th>
                                            </tr>
                                        </tfoot>
                                    </table>
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