<?php

namespace App\Http\Controllers;


use App\Models\Pemasukan;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use App\Models\AnggotaKeluarga;
use App\Models\Pengeluaran;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
USE Illuminate\Support\Facades\Crypt;
use Prophecy\Prophecy\Revealer;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_setora = Pemasukan::where('anggota_id', Auth::user()->id)->orderBy('anggota_id')->get();
        $data_setor = $data_setora->where('kategori','Kas');
        $data_tabungan = $data_setora->where('kategori','Tabungan');

        $data_semua = Pemasukan::orderByRaw('created_at DESC')->where('kategori','Kas')->get();
        $data_semua_setor = Pemasukan::orderByRaw('created_at DESC')->where('kategori','Setor_Tunai')->get();
        $data_anggota = User::where('is_active',2)->get();
        $data_user = Anggota::find(Auth::id());
        return view('admin.pemasukan.coba', compact('data_setor', 'data_anggota', 'data_semua','data_semua_setor','data_tabungan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePemasukanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
            $request->validate(
                [
                    'jumlah' => 'required|min:4|max:6',
                    'keterangan' => 'required',
                    'pembayaran' => 'required',
                ],[
                    'jumlah.required' => "Nominal kedah di isi",
                    'jumlah.min' => "Nominal kedah di isi minimal puluhan",
                    'jumlah.max' => "Nominal terlalu besar, cek kembali",
                    'keterangan.required' => "Keterangan kedah di isi",
                    'pembayaran.required' => "pembayaran kedah di isi"
                ]
                );
        if($request->foto){
            $file = $request->file('foto');
            $nama = 'logo-' . date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img/bukti'), $nama);
        }
        $tanggal = Carbon::now();

            $data = new Pemasukan();
            $data->pembayaran             = $request->pembayaran;
            $data->anggota_id          = $request->anggota_id;
        $data->jumlah              = $request->jumlah;
        $data->keterangan          = $request->keterangan;
        $data->kategori          = $request->kategori; 
        $data->tanggal          = $tanggal; 
        if ($request->foto) {
            $data->foto          = "/img/bukti/$nama"; 
        }
        if ($request->foto1) {
            $data->foto          = $request->foto1; 
        }
        $data->save();

            if ($request->id_pengajuan){
                $pengajuan = Pengajuan::find($request->id_pengajuan);
                $pengajuan->delete();
        
                    return redirect('pengajuans/bayar')->with('sukses','Pembayaran parantos berhasil masuk');
        }else{
            return redirect()->back()->with('sukses','Data Setor Kas Parantos Ka tambahkeun kana data');
        }    
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data_pemasukan = Pemasukan::find($id);

        return view('admin.pemasukan.show',compact('data_pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data_pemasukan = Pemasukan::find($id);
        $data_anggota = User::all();
        $data_semua = Pemasukan::orderByRaw('created_at DESC')->get();

        return view('admin.pemasukan.edit',compact('data_pemasukan','data_semua','data_anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemasukanRequest  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $id = Crypt::decrypt($id);
        $request->validate(
            [
                'jumlah' => 'required',
                'anggota_id' => 'required',
                'keterangan' => 'required',
                'pembayaran' => 'required',
            ],
            [
                'jumlah.required' => 'Nominal kedah di isi',
                'anggota_id.required' => 'anggota_id kedah di isi',
                'keterangan.required' => 'keterangan kedah di isi',
                'pembayaran.required' => 'keterangan kedah di isi',
            ]
            );

            $data =Pemasukan::find($id);
            $data->update($request->all());

            return redirect('pemasukan')->with('infoes','Data pemasukan atos di isi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $pemasukan = Pemasukan::find($id);

        $pemasukan->delete();

        return redirect()->back()->with('kuning', 'Data Berhasil di hapus (silahkan cek trash data pemasukan)');
    }
    public function trash()
    {
        $data_pemasukan = Pemasukan::onlyTrashed()->get();

        return view('admin.pemasukan.trash', compact('data_pemasukan'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $data_pemasukan = Pemasukan::withTrashed()->findorfail($id);
        $data_pemasukan->restore();
        return redirect()->back()->with('infoes', 'Data pemasukan berhasil direstore! (Silahkan cek data pemasukan)');
    }

    public function kill($id)
    {
        $id = Crypt::decrypt($id);
        $data_pemasukan = Pemasukan::withTrashed()->findorfail($id);

        $data_pemasukan->forceDelete();
        return redirect()->back()->with('kuning', 'Data pemasukan berhasil dihapus! (Silahkan cek data pemasukan)');
    }
    public function Lihat()
    {

        $data_pemasukan = Pemasukan::orderByRaw('created_at DESC')->where('kategori', 'Kas')->get();

        return view('admin.pemasukan.lihat_semua', compact('data_pemasukan'));
    }

    public function detail_anggota_kas($id) {
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        $data_anggota = AnggotaKeluarga::find($user->keluarga_id);
        $data_setora = Pemasukan::where('anggota_id',$id)->orderBy('anggota_id')->get();
        $pemasukan_anggota_detail = $data_setora->where('kategori', 'Kas');

        return view('admin.pemasukan.detail_pemasukan_anggota',compact('pemasukan_anggota_detail','data_anggota','user'));
    }
    public function detail_anggota_tabungan($id) {
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        $data_anggota = AnggotaKeluarga::find($user->keluarga_id);
        $data_setora = Pemasukan::where('anggota_id',$id)->orderBy('anggota_id')->get();
        $pemasukan_anggota_detail = $data_setora->where('kategori', 'Tabungan');

        return view('admin.pemasukan.detail_pemasukan_anggota',compact('pemasukan_anggota_detail','data_anggota','user'));
    }

    public function laporan(){
        return view('admin.laporan.index');
    }
    public function laporanKas($tanggal_awal, $tanggal_akhir)
    {
        $kasmasuk = Pemasukan::all()->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        $kaskeluar = Pengeluaran::all()->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]);
        return view('admin.laporan.show', compact('kasmasuk', 'kaskeluar', 'pdf'));
    }
}
