@extends('template_backend.home')

@section('heading', 'role')
@section('page')
<li class="breadcrumb-item active">role</li>
@endsection

@section('content')

<section class="content card col-12" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        <h4><i class="nav-icon fas fa-credit-card my-1 btn-sm-1"></i> Data Role</h4>
        <hr>
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="card-body">
                        <table class="table" style="margin-top: -10px;">
                            <tr>
                                <td>Role</td>
                                <td>:</td>
                                <td>{{$role->nama_role}}</td>
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
                                    @if ($bulan > 6)
                                    {{ $tahun }}/{{ $tahun+1 }}
                                    @else
                                    {{ $tahun-1 }}/{{ $tahun }}
                                    @endif
                                </td>
                            </tr>

                        </table>
                        <table class="table table-hover table-head-fixed" id='tabelAgendaMasuk'>
                            <p> {!! $role->deskripsi !!}</p>
                        </table>

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
    $("#DataRole").addClass("active");
</script>
@endsection