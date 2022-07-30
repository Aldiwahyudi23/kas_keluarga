<!-- Navbar -->
<?php

use App\Models\Pemasukan;
use App\Models\Pemberitahuan;
use App\Models\Pengeluaran;

use App\Models\Pengajuan;


$data_pengajuan = Pengajuan::all();
$jumlah_data_pengajuan = Pengajuan::all()->count();
$jumlah_data_pengajuan_bayar = Pengajuan::where('kategori', 'Bayar')->count();
$jumlah_data_pengajuan_pinjam = Pengajuan::where('kategori', 'Pinjam')->count();
$jumlah_data_pengajuan_bayar_pinjaman = Pengajuan::where('kategori', 'bayar_pinjaman')->count();
$jumlah_data_pengajuan_tabungan = Pengajuan::where('kategori', 'tabungan')->count();
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #0f4c81;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="brand-link" style="color: #fff;" data-widget="pushmenu" href="#">
                <img src="{{ asset('img/logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        @if (Auth::user()->role == "Admin" || Auth::user()->role == "Bendahara" || Auth::user()->role == "Sekertaris")
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell" style="color: #fff"></i>

                @if ($jumlah_data_pengajuan == 0 )
                @else
                <span class="badge badge-warning navbar-badge">{{$jumlah_data_pengajuan}}</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{$jumlah_data_pengajuan}} Pemberitahuan</span>
                @foreach($data_pengajuan as $data)
                <div class="dropdown-divider"></div>
                <a href="/pengajuan/setor/anggota/{{$data->id}}/lihat" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('img/male.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{$data->anggota->name}}
                                <span class="float-right text-sm text-warning"></i></span>
                            </h3>
                            <p class="text-sm">Bayar Kas {{$data->jumlah}} {{$data->keterangan}}</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{Carbon\Carbon::parse($data->created_at)->diffForHumans()}}</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                @endforeach
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>

            </div>
        </li>
        @endif
        <?php

        use Illuminate\Support\Facades\Auth;

        $tabungan = DB::table('pemasukans')->where('pemasukans.kategori', '=', "Tabungan");
        $total_tabungan = $tabungan->where('pemasukans.anggota_id', '=', Auth::user()->id)
            ->sum('pemasukans.jumlah');
        ?>
        @if (Auth::user()->program2 == "Tabungan")
        <li class="nav-item dropdown">
            <a class="nav-link" style="color: #fff">
                </i> &nbsp; {{ "Rp " . number_format($total_tabungan,2,',','.') }}
            </a>
        </li>
        @endif

    </ul>
</nav>
<!-- /.navbar -->