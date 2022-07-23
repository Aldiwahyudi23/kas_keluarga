@extends('template_backend.home')
@section('heading', 'Profile')
@section('page')
<li class="breadcrumb-item active">User Profile</li>
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
<div class="col-12">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">

                <a href="{{ asset(Auth::user()->foto) }}" data-toggle="lightbox" data-title="Foto {{ Auth::user()->name }}" data-gallery="gallery" data-footer=' <form action="{{Route('anggota.update.foto', Crypt::encrypt(Auth::user()->id))}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}<input type="file" class="form-control"  name=" foto" id="foto"> <input type="hidden" class="form-control" name=" user" id="user" value="{{$data_keluarga->id}}"> <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-file-upload"></i> </button></form>'>


                    <img src="{{ asset( Auth::user()->foto) }}" width="130px" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                </a>

            </div>
            <h3 class="profile-username text-center">{{ $data_keluarga->nama }}</h3>
            <h5 class="profile-username text-center">( {{ Auth::user()->name }} )</h5>
            <!-- <p class="text-muted text-center">{{ Auth::user()->role }}</p> -->
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>No INduk</b> <a class="float-right">{{ $data_keluarga->nik }}</a>
                </li>
            </ul>
            <a href="{{route('profile.edit',Crypt::encrypt($data_keluarga->id))}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<div class="col-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Profil</h3>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th style="width:50%">Nama</th>
                    <td>{{ $data_keluarga->nama}}</td>
                </tr>
                <tr>
                    <th style="width:50%">NIK</th>
                    <td>{{ $data_keluarga->nik}}</td>
                </tr>
                <tr>
                    <th style="width:50%">Jenis Kelamin</th>
                    <td>{{ $data_keluarga->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <th style="width:50%">Tempat,Tanggal Lahir</th>
                    <td>{{ $data_keluarga->tempat_lahir}},{{ $data_keluarga->tanggal_lahir}}</td>
                </tr>
                <tr>
                    <th style="width:50%">Alamat</th>
                    <td>{{ $data_keluarga->alamat}}</td>
                </tr>
                <tr>
                    <th>No Handphone</th>
                    <td>{{ $data_keluarga->no_hp}}</td>
                </tr>

                <tr>
                    <th>Pekerjaan</th>
                    <td>{{$data_keluarga->pekerjaan}}</td>
                </tr>
                <tr>
                    <th>hubungan</th>
                    <td>{{$data_keluarga->hubungan}} dari {{$data_keluarga->nama_hubungan}} </td>
                </tr>
                <tr>
                    <th>Anak Ke</th>
                    <td>{{$data_keluarga->anak_ke}}</td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<div class="col-12">
    <div class="row">
        <div class="col-6 table-responsiv ">
            <!-- About Me Box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Akun</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="far fa-envelope mr-1"></i> Email</strong>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                    <hr>
                    <strong><i class="fas fa-phone mr-1"></i> No Telepon</strong>
                    <p class="text-muted">{{ Auth::user()->no_hp }}</p>
                    <hr>
                    <strong><i class="fas fa-setting mr-1"></i> Program</strong>
                    <p class="text-muted">{{ Auth::user()->program1 }}</p> <br>
                    <p class="text-muted">{{ Auth::user()->program2 }}</p> <br>
                    <p class="text-muted">{{ Auth::user()->program3 }}</p> <br>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-6 table-responsive">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Pengaturan Akun</h3>
                </div>
                <div class="card-body">
                    <table class="table" style="margin-top: -21px;">
                        <tr>
                            <td width="50"><i class="nav-icon fas fa-envelope"></i></td>
                            <td> <a href="{{ route('pengaturan.email') }}">Ubah Email<a></td>
                        </tr>
                        <tr>
                            <td width="50"><i class="nav-icon fas fa-key"></i></td>
                            <td><a href="{{ route('pengaturan.password') }}">Ubah Password</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection