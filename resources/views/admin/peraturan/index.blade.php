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

<section class="content card col-md-12" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        <h4><i class="nav-icon fas fa-credit-card my-1 btn-sm-1"></i> Peraturan</h4>
        <hr>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Profile</h3>
                            </div>
                            <div class="card-body">
                                <table class="table" style="margin-top: -21px;">
                                    <tr>
                                        <td width="50"><i class="nav-icon fas fa-user-edit"></i></td>
                                        <td> <a href="{{ route('profile.edit',Crypt::encrypt(Auth::user()->id) ) }}" class="text-dark">Edit Data Diri<a></td>
                                    </tr>
                                    <tr>
                                        <td width="50"><img src="{{ asset( Auth::user()->foto) }}" class="img-fluid img-circle" alt="User profile picture"></td>
                                        <td>
                                            <a href="{{ asset(Auth::user()->foto) }}" data-toggle="lightbox" data-title="Foto {{ Auth::user()->name }}" data-gallery="gallery" data-footer=' <form action="{{Route('anggota.update.foto', Crypt::encrypt(Auth::user()->id))}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}<input type="file" class="form-control"  name=" foto" id="foto"> <input type="hidden" class="form-control" name=" user" id="user" value="{{Auth::user()->id}}"> <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-file-upload"></i> </button></form>' class="text-dark"> Edit Foto
                                            </a>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Pengaturan Akun</h3>
                            </div>
                            <div class="card-body">
                                <table class="table" style="margin-top: -21px;">
                                    <tr>
                                        <td width="50"><i class="nav-icon fas fa-envelope"></i></td>
                                        <td> <a href="{{ route('pengaturan.email') }}" class="text-dark">Ubah Email<a></td>
                                    </tr>
                                    <tr>
                                        <td width="50"><i class="nav-icon fas fa-key"></i></td>
                                        <td><a href="{{ route('pengaturan.password') }}" class="text-dark">Ubah Password</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card card-warning card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Program</h3>
                            </div>
                            <div class="card-body">
                                <table class="table" style="margin-top: -21px;">
                                    <tr>
                                        <td width="50"><i class="nav-icon fas fa-progress"></i></td>
                                        <td> <a href="/roleprogram " class="text-dark">Program<a></td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

@endsection
@section('script')

<script>
    $("#Peraturan").addClass("active");
</script>
@endsection