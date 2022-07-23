<?php

use App\Models\Anggaran;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AnggotaKeluarga;
use App\Models\Pengajuan;

$jumlah_trush = AnggotaKeluarga::withTrashed()->count();
$jumlah_anggota_keluarga = AnggotaKeluarga::withTrashed()->count();

$pengajuan = Pengajuan::all()->count();
$bayar = Pengajuan::where('kategori', 'Kas')->count();
$pinjaman = Pengajuan::where('kategori', 'Pinjaman')->count();
$bayar_pinjaman = Pengajuan::where('kategori', 'Bayar_Pinjaman')->count();
$bayar_tabungan = Pengajuan::where('kategori', 'Tabungan')->count();

$anggaran = Anggaran::all();
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="">
        <img src="{{ asset('img/logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">KELUARGA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="beranda" class="nav-link" id="pengajuanpinjam">
                        <i class="fas fa-file-alt nav-icon"></i>
                        <p>Deskripsi Kas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{Route('anggaran.index')}}" class="nav-link" id="anggaran">
                        <i class="fas fa-file-signature nav-icon"></i>
                        <p>Anggaran</p>
                    </a>
                </li>
                @if (Auth::user()->role == "Admin")
                <li class="nav-item has-treeview" id="liMasterData">
                    <a href="#" class="nav-link" id="MasterData">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{Route('role.index')}}" class="nav-link" id="DataRole">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Data Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('program.index')}}" class="nav-link" id="DataProgram">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Data Program</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('keluarga.index')}}" class="nav-link" id="DataKeluarga">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Data Keluarga</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('anggaran.index')}}" class="nav-link" id="DataAnggaran">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Data Anggaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('anggota.index')}}" class="nav-link" id="DataUser">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('berita.index')}}" class="nav-link" id="DataUser">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Data Berita</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview" id="liViewTrash">
                    <a href="#" class="nav-link" id="ViewTrash">
                        <i class="nav-icon fas fa-recycle"></i>
                        <p>
                            View Trash
                            @if ($jumlah_trush == 0)
                            @else
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-warning right">{{$jumlah_trush}}</span>
                            @endif
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{Route('role.trash')}}" class="nav-link" id="TrashJadwal">
                                <i class="fas fa-calendar-alt nav-icon"></i>
                                <p>Trash Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link" id="TrashGuru">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Trash Guru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('program.trash')}}" class="nav-link" id="TrashProgram">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Trash Program</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('keluarga.trash')}}" class="nav-link" id="TrashSiswa">
                                @if ($jumlah_anggota_keluarga == 0)
                                @else
                                <i class="fas fa-users nav-icon"></i>
                                <span class="badge badge-warning right">{{$jumlah_anggota_keluarga}}</span>
                                @endif
                                <p>Trash Keluarga</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('anggaran.trash')}}" class="nav-link" id="Trashanggaran">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Trash Anggaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('anggota.trash')}}" class="nav-link" id="TrashUser">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Trash User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('pengeluaran.trash')}}" class="nav-link" id="TrashUser">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Trash Pengeluaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('pemasukan.trash')}}" class="nav-link" id="TrashUser">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Trash Pemasukan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview" id="penglink">
                    <a href="#" class="nav-link" id="pengajuan">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>
                            Pengajuan
                            @if ($pengajuan == 0)
                            @else
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{$pengajuan}}</span>
                            @endif
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{Route('pengajuan.index.bayar')}}" class="nav-link" id="pemasukan">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>Pemasukan</p>
                                @if ($bayar == 0)
                                @else
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">{{$bayar}}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('pengajuan.index.pinjaman')}}" class="nav-link" id="pinjaman">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>Peminjaman</p>
                                @if ($pinjaman == 0)
                                @else
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">{{$pinjaman}}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('pinjaman.index')}}" class="nav-link" id="Pinjaman">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>Bayar Peminjaman</p>
                                @if ($bayar_pinjaman == 0)
                                @else
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">{{$bayar_pinjaman}}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('pengajuan.index.tabungan')}}" class="nav-link" id="Pinjaman">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>Tabungan</p>
                                @if ($bayar_tabungan == 0)
                                @else
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">{{$bayar_tabungan}}</span>
                                @endif
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link" id="Pengumuman">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>
                @elseif (Auth::user()->role == 'Bendahara' || Auth::user()->role == 'Sekertaris')

                <li class="nav-item">
                    <a href="/pemasukan/setor" class="nav-link" id="UlanganGuru">
                        <i class="fas fa-file-alt nav-icon"></i>
                        <p>Input Uang</p>
                    </a>
                </li>
                <li class="nav-item has-treeview" id="penglink">
                    <a href="#" class="nav-link" id="pengajuan">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>
                            Pengajuan
                            @if ($pengajuan == 0)
                            @else
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{$pengajuan}}</span>
                            @endif
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{Route('pengajuan.index.bayar')}}" class="nav-link" id="pemasukan">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>Pemasukan</p>
                                @if ($bayar == 0)
                                @else
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">{{$bayar}}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('pengajuan.index.pinjaman')}}" class="nav-link" id="pinjaman">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>Peminjaman</p>
                                @if ($pinjaman == 0)
                                @else
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">{{$pinjaman}}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('pinjaman.index')}}" class="nav-link" id="Pinjaman">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>Bayar Peminjaman</p>
                                @if ($bayar_pinjaman == 0)
                                @else
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">{{$bayar_pinjaman}}</span>
                                @endif
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link" id="Pengumuman">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>
                
                
                @else
                
                @endif
                <li class="nav-item">
                    <a href="/peraturan" class="nav-link" id="Peraturan">
                        <i class="nav-icon fas fa-setting"></i>
                        <p>Peraturan</p>
                    </a>
                </li>
                <hr>
                <li class="nav-item has-treeview">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="nav-icon fas fa-sign-out-alt"></i> &nbsp; Kaluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>