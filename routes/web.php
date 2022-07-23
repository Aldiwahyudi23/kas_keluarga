<?php

use App\Http\Controllers\DataKeluargaController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ImageSliderController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\BayarPinjaman;
use App\Http\Controllers\BayarPinjamanController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PengumumanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleProgramController;
use App\Models\Anggota;
use App\Models\AnggotaKeluarga;
use App\Models\RoleProgram;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route untuk user Admin
Route::group(['middleware' => ['auth', 'checkRole:Admin,Bendahara,Sekertaris,Ketua']], function () {
//Data Keluarga
    Route::resource('keluarga',DataKeluargaController::class);
    Route::get('/keluargas/detail/{id}',[DataKeluargaController::class,'detail'])->name('keluarga.detail');
    Route::get('/keluargas/trash/',[DataKeluargaController::class,'trash'])->name('keluarga.trash');
    Route::post('/anggots/kill/{id}',[DataKeluargaController::class,'kill'])->name('keluarga.kill');
    Route::get('/keluargas/restore/{id}',[DataKeluargaController::class,'restore'])->name('keluarga.restore');

// Data Anggota atau User
    Route::resource('anggota',AnggotaController::class);
    Route::get('/anggotas/trash/', [AnggotaController::class, 'trash'])->name('anggota.trash');
    Route::post('/anggots/kill/{id}', [AnggotaController::class, 'kill'])->name('anggota.kill');
    Route::get('/anggotas/restore/{id}', [AnggotaController::class, 'restore'])->name('anggota.restore');
    Route::post('/anggotas/update/foto/{id}',[AnggotaController::class,'update_foto'])->name('anggota.update.foto');
    

    // Data Program
    Route::resource('program',ProgramController::class);
    Route::get('/programs/trash/', [ProgramController::class, 'trash'])->name('program.trash');
    Route::post('/programs/kill/{id}', [ProgramController::class, 'kill'])->name('program.kill');
    Route::get('/programs/restore/{id}', [ProgramController::class, 'restore'])->name('program.restore');
  
    // Data Anggaran
    Route::resource('anggaran',AnggaranController::class);
    Route::GET('/anggarans/detail/{id}', [AnggaranController::class, 'detail'])->name('anggaran.detail');
    Route::get('/anggarans/trash/', [AnggaranController::class, 'trash'])->name('anggaran.trash');
    Route::post('/anggarans/kill/{id}', [AnggaranController::class, 'kill'])->name('anggaran.kill');
    Route::get('/anggarans/restore/{id}', [AnggaranController::class, 'restore'])->name('anggaran.restore');
  
    // Data Anggaran
    Route::resource('role',RoleController::class);
    Route::get('/roles/trash/', [RoleController::class, 'trash'])->name('role.trash');
    Route::post('/roles/kill/{id}', [RoleController::class, 'kill'])->name('role.kill');
    Route::get('/roles/restore/{id}', [RoleController::class, 'restore'])->name('role.restore');

    // Laporan
    Route::get('/laporan',[PemasukanController::class,'laporan']);
    Route::get('/laporan/kas',[PemasukanController::class,'laporankas']);

});
// Pengajuan
Route::resource('pengajuan',PengajuanController::class);
Route::get('/pengajuans/bayar',[PengajuanController::class,'bayar'])->name('pengajuan.index.bayar');
Route::get('/pengajuans/pinjaman',[PengajuanController::class,'pinjaman'])->name('pengajuan.index.pinjaman');
Route::get('/pengajuans/tabungan',[PengajuanController::class,'tabungan'])->name('pengajuan.index.tabungan');
Route::get('/pengajuans/tunda/{id}',[PengajuanController::class,'tunda_pengajuan'])->name('pengajuan.tunda');

// Pengeluaran
Route::resource('pengeluaran',PengeluaranController::class);
Route::get('/pengeluarans/trash/', [PengeluaranController::class, 'trash'])->name('pengeluaran.trash');
Route::post('/pengeluarans/kill/{id}', [PengeluaranController::class, 'kill'])->name('pengeluaran.kill');
Route::get('/pengeluarans/restore/{id}', [PengeluaranController::class, 'restore'])->name('pengeluaran.restore');
Route::get('/pengeluarans/lihat/{id}',[PengeluaranController::class,'lihat'])->name('pengeluaran.lihat');

// Pemasukan
Route::resource('pemasukan',PemasukanController::class);
Route::get('/pemasukans/trash/', [PemasukanController::class, 'trash'])->name('pemasukan.trash');
Route::post('/pemasukans/kill/{id}', [PemasukanController::class, 'kill'])->name('pemasukan.kill');
Route::get('/pemasukans/restore/{id}', [PemasukanController::class, 'restore'])->name('pemasukan.restore');
Route::get('/pemasukans/lihat', [PemasukanController::class, 'lihat'])->name('pemasukan.lihat');

// Bayar Pinjaman
Route::resource('bayar/pinjaman',BayarPinjamanController::class);
Route::get('bayar/pinjamans/{id}',[BayarPinjamanController::class,'tambah'])->name('pinjaman.tambah');
Route::post('bayar/pinjamans',[BayarPinjamanController::class,'bayar'])->name('pinjaman.bayar');


// Profile
Route::get('/profile',[DataKeluargaController::class,'profile'])->name('profile');
Route::get('/profile/edit/{id}',[DataKeluargaController::class,'profile_edit'])->name('profile.edit');
Route::get('/pengaturan/email', [DataKeluargaController::class, 'edit_email'])->name('pengaturan.email');
Route::post('/pengaturan/ubah-email', [DataKeluargaController::class, 'ubah_email'])->name('pengaturan.ubah-email');
Route::get('/pengaturan/password', [DataKeluargaController::class, 'edit_password'])->name('pengaturan.password');
Route::post('/pengaturan/ubah-password', [DataKeluargaController::class, 'ubah_password'])->name('pengaturan.ubah-password');

// Role Program
Route::get('/peraturan',[HomeController::class,'peraturan']);
Route::resource('roleprogram',RoleProgramController::class);

// frontend
Route::resource('kegiatan',KegiatanController::class);
Route::resource('berita',BeritaController::class);
Route::resource('event',EventsController::class);
Route::resource('video',VideoController::class);
Route::resource('slid',ImageSliderController::class);
Route::resource('beranda',FrontEndController::class);