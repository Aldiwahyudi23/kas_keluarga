@extends('template_backend.home')

@section('heading', 'Anggaran')
@section('page')
<li class="breadcrumb-item active">Anggaran</li>
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
    <div class="box">
        <h4><i class="nav-icon fas fa-credit-card my-1 btn-sm-1"></i> Data Anggaran</h4>
        <hr>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <h6 class="card-header bg-light p-3"><i class="fas fa-credit-card"></i> TAMBAH DATA ANGGARAN</h6>
                            <div class="card-body">
                                <form action="{{Route('anggaran.update',Crypt::encrypt($anggaran->id))}}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label for="program_id">Program</label>
                                        <select name="program_id" id="program_id" class="form-control select2bs4 @error('program_id') is-invalid @enderror">
                                            @if (old('program_id',$anggaran->program_id) == true)
                                            <option value="{{old('program_id',$anggaran->program_id)}}">{{old('program_id', $anggaran->program->nama_program)}}</option>
                                            @endif
                                            <option value="">-- Pilih Program --</option>
                                            @foreach($data_program as $program)
                                            <option value="{{$program->id}}">{{$program->nama_program}}</option>
                                            @endforeach
                                        </select>
                                        @error('program_id')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_anggaran">Anggaran</label>
                                        <input value="{{old('nama_anggaran',$anggaran->nama_anggaran)}}" name="nama_anggaran" type="text" class="form-control bg-light @error('nama_anggaran') is-invalid @enderror" id="nama_anggaran">
                                        @error('nama_anggaran')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="persen">Nominal berdasarekan persen</label>
                                        <input value="{{old('persen',$anggaran->persen)}}" name="persen" type="text" class="form-control bg-light @error('persen') is-invalid @enderror" id="persen">
                                        @error('persen')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="max_orang">Limit Orang</label>
                                        <input value="{{old('max_orang',$anggaran->max_orang)}}" name="max_orang" type="text" class="form-control bg-light @error('max_orang') is-invalid @enderror" id="max_orang">
                                        @error('max_orang')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="nominal_max_anggaran">Limit Max Uang</label>
                                        <input value="{{old('nominal_max_anggaran',$anggaran->nominal_max_anggaran)}}" name="nominal_max_anggaran" type="text" class="form-control bg-light @error('nominal_max_anggaran') is-invalid @enderror" id="nominal_max_anggaran">
                                        @error('nominal_max_anggaran')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" class="textarea @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3" placeholder="Eusian deskripsi ieu sesuai deskripsi artos anu di bayarkeun"> {{ $anggaran->deskripsi }} </textarea>
                                        @error('deskripsi')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> SIMPEN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-light p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active btn-sm" href="#setor" data-toggle="tab"><i class="fas fa-credit-card"></i> Data Anggaran</a></li>
                                    <li class="nav-item"><a class="nav-link btn-sm" href="#anggota" data-toggle="tab"><i class="fas fa-child"></i> Deskripsi</a></li>
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
                                                                <th>Anggaran</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 0; ?>
                                                            @foreach($data_anggaran as $data)
                                                            <?php $no++; ?>
                                                            <tr>
                                                                <td>{{$no}}</td>
                                                                <td>{{$data->nama_anggaran}}</td>
                                                                <td>
                                                                    <form action="{{route('anggaran.destroy',Crypt::encrypt($data->id))}}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a href="{{route('anggaran.show',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-book"></i></a>
                                                                        <a href="{{route('anggaran.edit',Crypt::encrypt($data->id))}}" class=""><i class="nav-icon fas fa-pencil-alt"></i></a>
                                                                        @if (auth()->user()->role == 'Admin')
                                                                        <button class="btn btn-link btn-sm mt-2"><i class="nav-icon fas fa-trash-alt" onclick="return confirm('Leres bade ngahapus data anu namina {{$data->nama_anggaran}}  ?')"></i> </button>
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
                                    <!-- Akhir togle data pemasukan -->

                                    <!-- awal data anggota -->
                                    <div class="tab-pane" id="anggota">
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
    $("#DataAnggaran").addClass("active");
</script>
@endsection