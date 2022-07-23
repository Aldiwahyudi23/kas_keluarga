<!-- Navbar -->

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
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell" style="color: #fff"></i>
                <span class="badge badge-warning navbar-badge"></span>

            </a>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header"> Notifications</span>
                <div class="dropdown-divider"></div>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>

            </div>
        </li>
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