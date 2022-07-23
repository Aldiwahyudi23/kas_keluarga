<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Pengeluaran;
use App\Models\Bayar_pinjaman;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Auth\Events\Validated;

class BayarPinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pengajuan = Pengajuan::where('kategori', 'bayar_pinjaman')->get();
        $data_anggota = User::orderByRaw('name ASC')->get();
        return view('admin.bayar_pinjaman.index', compact('data_pengajuan', 'data_anggota'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function tambah($id)
    {
        $id = Crypt::decrypt($id);
        $data_setor = Pengeluaran::orderByRaw('created_at DESC')->get();
        $data_anggota = User::orderByRaw('name ASC')->get();
        $setor = Pengeluaran::find($id);
        $bayar_pinjam =Bayar_pinjaman::where('pengeluaran_id', $id)->get();

        return view('admin.bayar_pinjaman.tambah', compact('setor', 'data_setor', 'data_anggota', 'bayar_pinjam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBayar_pinjamanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'numeric',
        ]);
        $data_bayar = new Bayar_pinjaman();
        $data_bayar->pembayaran          = $request->pembayaran;
        $data_bayar->pengeluaran_id             = $request->pengeluaran_id;
        $data_bayar->jumlah_bayar              = $request->jumlah;
        $data_bayar->keterangan              = $request->keterangan;
        $data_bayar->anggota_id              = $request->anggota_id;
        if ($request->foto) {
            $data_bayar->foto              = $request->foto;
        }
        $data_bayar->save();
        $bayar = Bayar_Pinjaman::find($data_bayar->id);

        // Sekalian Edit pengeluaran
        $data_pinjaman = Pengeluaran::find($request->pengeluaran_id);
        $jumlahna = $request->proses + $request->jumlah ;

        if ($jumlahna >= $data_pinjaman->jumlah){
            $setor = Pengeluaran::find($request->pengeluaran_id);
            $setor->status = 'Lunas';
            $setor->update();
        }else{
            
        }
 
        // sekalian hapus data
        $pengajuan = Pengajuan::find($request->id_pengajuan);
        $pengajuan->delete();
    if ($jumlahna >= $data_pinjaman->jumlah) {
        return redirect('bayar/pinjaman')->with('sukses', 'Pembayaran dana pinjaman atos LUNAS');
    }else{
        return redirect('bayar/pinjaman')->with('sukses', 'Pembayaran dana pinjaman atos masuk');
    }
    }

    public function bayar (Request $request) {
        $request->validate(
            [
                'jumlah' => 'required|min:4|max:6',
                'keterangan' => 'required',
                'pembayaran' => 'required',
            ],
            [
                'jumlah.required' => "Nominal kedah di isi",
                'jumlah.min' => "Nominal kedah di isi minimal puluhan",
                'jumlah.max' => "Nominal terlalu besar, cek kembali",
                'keterangan.required' => "Keterangan kedah di isi",
                'pembayaran.required' => "pembayaran kedah di isi"
            ]
        );
        if ($request->foto) {
            $foto = $request->foto;
            $new_foto = date('siHdmY') . "_" . $foto->getClientOriginalName();
            $foto->move('img/keluarga/bukti/', $new_foto);
            $nameFoto = 'img/keluarga/bukti/' . $new_foto;
        }
        $data_bayar = new Pengajuan();
        $data_bayar->pembayaran          = $request->pembayaran;
        $data_bayar->kategori             = 'Bayar_pinjaman';
        $data_bayar->pengeluaran_id       = $request->pengeluaran_id;
        $data_bayar->jumlah              = $request->jumlah;
        $data_bayar->keterangan              = $request->keterangan;
        $data_bayar->status              = $request->proses;
        $data_bayar->lama              = $request->lama;
        $data_bayar->anggota_id            = Auth::id();

        if ($request->foto) {
            $data_bayar->foto          = $nameFoto;
        }
        $data_bayar->save();

        return redirect()->back()->with('sukses', 'Pembayaran dana pinjaman atos masuk, kantun ngantosan di konfirmasi ku bendahara');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bayar_pinjaman  $bayar_pinjaman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data_setor = Pengajuan::orderByRaw('created_at DESC')->get();
        $data_anggota = User::orderByRaw('name ASC')->get();
        $setor = Pengajuan::find($id);

        return view('admin.bayar_pinjaman.bayar_pinjaman_lihat', compact('setor', 'data_setor', 'data_anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bayar_pinjaman  $bayar_pinjaman
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBayar_pinjamanRequest  $request
     * @param  \App\Models\Bayar_pinjaman  $bayar_pinjaman
     * @return \Illuminate\Http\Response
     */
    public function update( )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bayar_pinjaman  $bayar_pinjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
