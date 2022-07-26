<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Pemasukan;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;


class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePengajuanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate(
                [
                    'jumlah' => 'required|min:4|max:6',
                    'keterangan' => 'Required',
                ],
                [
                    'jumlah.required' => "Nominal Kedah di isi",

                    'jumlah.min' => "Nominal kedah di isi minimal puluhan",
                    'jumlah.max' => "Nominal terlalu besar, cek kembali",
                    'keterangan.required' => "Keterangan Kedah di isi",
                    'pembayaran.required' => "Pemabayaran Kedah di isi",
                ]
            );

        $jumlah_pemasukan = Pemasukan::sum('pemasukans.jumlah');
        $jumlah_pemasukan_asli = $jumlah_pemasukan / 2; //Jumlah semua pemasukan
        $pinjams = $jumlah_pemasukan_asli * 90 / 100; // Menghitung Jumlah anggaran pinjaman dari semua pemasukan
        $pinjam = $pinjams / 2;
        
        if ($request->jumlah == $pinjam){
            return redirect()->back()->with('kuning','Punten pengajuanna terlalu ageng, maxsimal 30% tina uang pinjaman');
        }else{

        if ($request->foto) {
                $file = $request->file('foto');
                $nama = 'bukti-' . date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/img/bukti'), $nama);
        }
        $tanggal = Carbon::now();

            $data = new Pengajuan;
            $data->jumlah = $request->jumlah;
            $data->tanggal = $tanggal;
            $data->keterangan = $request->keterangan;
            $data->kategori = $request->kategori;
            $data->pembayaran = $request->pembayaran;
            $data->status = $request->status;
            $data->anggota_id = Auth::id();
            if ($request->foto) {
                $data->foto          = "/img/bukti/$nama";
            }

            $data->save();
            if ($request->kategori == 'Kas'){
            return redirect()->back()->with('sukses', 'Data pembayaran uang kas anu nembe parantos di input teu acan tiasa lebet kana Pendataan. Data bakal lebet saatos di konfirmasi ku bendahara sesuai keterangan anu di input  ');
            }else{
            return redirect()->back()->with('sukses', 'Peminjaman anu nembe di input bade di konfirmasi heula ku pihak pengurus, bade ningal heula kondisi saldo sareng di tinjau heula alsanna. ');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengajuan = Pengajuan::find($id);

        return view('admin.pengajuan.show',compact('data_pengajuan'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengajuanRequest  $request
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
    if (Auth::user()->role == 'Bendahara') {
        $request->validate(
            [
                'bendahara' => 'required'
            ],
            [
                'bendahara.required' => "Laporan kedah di isi supaya jelas",
            ]
        );
            $data = Pengajuan::find($id);
            $data->update($request->all());

            return redirect('pengajuans/pinjaman')->with('infoes', 'Laporan parantos masuk kantun ngantosan keputusan ti ketua');

    }elseif(Auth::user()->role == 'Sekertaris') {
        $request->validate(
            [
                'sekertaris' => 'required'
            ],
            [
                'sekertaris.required' => "Laporan kedah di isi supaya jelas",
            ]
        );
            $data = Pengajuan::find($id);
            $data->update($request->all());

            return redirect('pengajuans/pinjaman')->with('infoes', 'Laporan parantos masuk kantun ngantosan keputusan ti ketua');

    }elseif(Auth::user()->role == 'Ketua') {
        $request->validate(
            [
                'ketua' => 'required'
            ],
            [
                'ketua.required' => "Laporan kedah di isi supaya jelas",
            ]
        );
            $data = Pengajuan::find($id);
            $data->update($request->all());

            return redirect('pengajuans/pinjaman')->with('infoes', 'Peminjaman di tunda heula, tiasa di terima pami atos pas');

    }
    else{
            $request->validate(
                [
                    'ketua' => 'required',
                ],
                [
                    'ketua.required' => "Laporan kedah di isi supaya jelas",
                ]
            );
            $data = Pengajuan::find($id);
            $data->update($request->all());
    
            return redirect('pengajuans/pinjaman')->with('infoes', 'Laporan parantos masuk kantun ngantosan keputusan ti ketua');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }

    public function bayar()
    {

        $data_pengajuan = Pengajuan::where('kategori', 'Kas')->get();
        return view('admin.pengajuan.index', compact('data_pengajuan'));
    }
    public function pinjaman()
    {

        $data_pengajuan = Pengajuan::orderByRaw('created_at DESC')->where('kategori','Pinjaman')->get();

        return view('admin.pengajuan.index', compact('data_pengajuan'));
    }
    public function tunda_pengajuan($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengajuan = Pengajuan::find($id);

        return view('admin.pengajuan.tunda',compact('data_pengajuan'));
    }
    public function tabungan()
    {
        $data_pengajuan = Pengajuan::orderByRaw('created_at DESC')->where('kategori', 'Tabungan')->get();

        return view('admin.pengajuan.index', compact('data_pengajuan'));
    }
}
