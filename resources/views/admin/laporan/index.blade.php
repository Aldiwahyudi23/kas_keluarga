@extends('template_backend.home')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Cetak Laporan Kas</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <label for="tanggal_awal">Tanggal Awal</label>
                <input class="form-control" type="date" name="tanggal_awal" id="tanggal_awal">
            </div>
            <div class="col-lg-6">
                <label for="tanggal_akhir">Tanggal Akhir</label>
                <input class="form-control" type="date" name="tanggal_akhir" id="tanggal_akhir">
            </div>
            <div class="col-lg-12 mt-4">
                <a href="#" onclick="this.href='/laporan/kas/'+ document.getElementById('tanggal_awal').value + '/' +
                            document.getElementById('tanggal_akhir').value " target="_blank" class="btn btn-primary btn-block"><i class="fas fa-print"></i> Cetak Laporan</a>
                {{-- <button class="btn-block btn btn-primary"> </button> --}}
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection