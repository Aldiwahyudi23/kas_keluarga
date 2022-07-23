<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Anggaran;

use Symfony\Component\HttpFoundation\Request;
use App\Http\Requests\StorePengeluaranRequest;
use App\Http\Requests\UpdatePengeluaranRequest;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Crypt;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_tarik = Pengeluaran::orderByRaw('created_at DESC')->get();
        $data_anggota = User::orderByRaw('name ASC')->get();
        $data_anggaran = Anggaran::orderByRaw('nama_anggaran ASC')->get();
        $data_pinjam = Pengeluaran::where('anggota_id', Auth::user()->id)->orderBy('anggota_id')->get();
        $data_pinjam_pengajuan = Pengajuan::where('anggota_id', Auth::user()->id)->orderBy('anggota_id')->get();

        $dana_darurat = Pengeluaran::where('anggaran_id', 1)->get();
        $dana_amal = Pengeluaran::where('anggaran_id', 2)->get();
        $dana_pinjam = Pengeluaran::where('anggaran_id', 3)->get();
        $dana_usaha = Pengeluaran::where('anggaran_id', 4)->get();
        $dana_acara = Pengeluaran::where('anggaran_id', 5)->get();
        $dana_lain = Pengeluaran::where('anggaran_id', 6)->get();

        return view('admin.pengeluaran.index', compact('data_tarik', 'data_anggota', 'data_anggaran', 'dana_darurat', 'dana_amal', 'dana_pinjam', 'dana_usaha', 'dana_acara', 'dana_lain', 'data_pinjam','data_pinjam_pengajuan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_pengeluaran = Pengeluaran::orderByRaw('created_at DESC')->get();

        return view('admin.pengeluaran.lihat_semua',compact('data_pengeluaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePengeluaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->id_pengajuan) {
            $request->validate(
                [
                    'bendahara' => 'required'
                ],
                [
                    'bendahara.required' => "Laporan kedah di isi supaya jelas"
                ]
                );
        } else {
            $request->validate(
                [
                    'anggaran_id' => 'required',
                    'jumlah' => 'required',
                    'keterangan' => 'required',
                ],
                [
                    'anggaran_id.required' => "Anggaran kedah di isi",
                    'jumlah.required' => "Nominal kedah di isi",
                    'keterangan.required' => "Keterangan kedah di isi",
                ]
                );
        }

            $data = new Pengeluaran;
            $data->jumlah = $request->jumlah;
            $data->alasan = $request->keterangan;
            $data->anggaran_id = $request->anggaran_id;

            $data->save();
            

            if ($request->id_pengajuan){
                $data->bendahara = $request->bendahara;
                $data->sekertaris = $request->sekertaris;
                $data->ketua = $request->ketua;
                $data->tanggal = $request->tanggal;
                $data->status = $request->status;
                    $data->anggota_id = $request->anggota_id;
                $data->save();
                
            // sekalian hapus data pengajuan
            $pengajuan = Pengajuan::find($request->id_pengajuan);
            $pengajuan->delete();
            return redirect('pengajuans/pinjaman')->with('sukses','Pengajuan Pinjaman atos di setujui ku ketua. kantun penarikan uang sareng serah terima');
        }else{
            return redirect()->back()->with('sukses','Data parantos berhasil, mangga manfaatkeun anggaranna sesuai kebutuhan');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengeluaran = Pengeluaran::find($id);


        return view('admin.pengeluaran.show',compact('data_pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengeluaran = Pengeluaran::find($id);
        $data_semua = Pengeluaran::orderByRaw('created_at DESC')->get();

        $data_anggota = User::orderByRaw('name ASC')->get();
        $data_anggaran = Anggaran::orderByRaw('nama_anggaran ASC')->get();

        $dana_darurat = Pengeluaran::where('anggaran_id', 1)->get();
        $dana_amal = Pengeluaran::where('anggaran_id', 2)->get();
        $dana_pinjam = Pengeluaran::where('anggaran_id', 3)->get();
        $dana_usaha = Pengeluaran::where('anggaran_id', 4)->get();
        $dana_acara = Pengeluaran::where('anggaran_id', 5)->get();
        $dana_lain = Pengeluaran::where('anggaran_id', 6)->get();

        return view('admin.pengeluaran.edit', compact('data_pengeluaran','data_semua', 'data_anggota','data_anggaran','dana_darurat', 'dana_amal', 'dana_pinjam', 'dana_usaha', 'dana_lain','dana_acara'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengeluaranRequest  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        $id = Crypt::decrypt($id);
        if ($request->anggaran_id == 3){
            $request->validate(
                [
                    'anggaran_id' => 'required',
                    'jumlah' => 'required',
                    'alasan' => 'required',
                    'ketua' => 'required',
                    'sekertaris' => 'required',
                    'bendahara' => 'required',
                ],
            [
                'anggaran_id.required' => "Anggaran kedah di isi",
                'jumlah.required' => "Nominal kedah di isi",
                'alasan.required' => "alasan kedah di isi",
                'bendahara.required' => "Laporan Bendahara kedah di isi supaya jelas",
                'ketua.required' => "Laporan Ketua kedah di isi supaya jelas",
                'sekertaris.required' => "Laporan Sekertaris kedah di isi supaya jelas"
            ]
        );
    }else{
            $request->validate(
                [
                    'anggaran_id' => 'required',
                    'jumlah' => 'required',
                    'alasan' => 'required',
                ],
                [
                    'anggaran_id.required' => "Anggaran kedah di isi",
                    'jumlah.required' => "Nominal kedah di isi",
                    'alasan.required' => "alasan kedah di isi",
                ]
            );
    }
            $data = Pengeluaran::find($id);
            $data->update($request->all());

            return  redirect('pengeluaran')->with('infoes','Data parantos di edit');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $pengeluaran = Pengeluaran::find($id);

        $pengeluaran->delete();

        return redirect()->back()->with('kuning', 'Data Berhasil di hapus (silahkan cek trash data Pengeluaran)');
    }
    public function trash()
    {
        $data_pengeluaran = Pengeluaran::onlyTrashed()->get();

        return view('admin.pengeluaran.trash', compact('data_pengeluaran'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengeluaran = Pengeluaran::withTrashed()->findorfail($id);
        $data_pengeluaran->restore();
        return redirect()->back()->with('infoes', 'Data Pengeluaran berhasil direstore! (Silahkan cek data Pengeluaran)');
    }

    public function kill($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengeluaran = Pengeluaran::withTrashed()->findorfail($id);

        $data_pengeluaran->forceDelete();
        return redirect()->back()->with('kuning', 'Data Pengeluaran berhasil dihapus! (Silahkan cek data Pengeluaran)');
    }


    public function Lihat($id)
    {
        $id = Crypt::decrypt($id);
        $data_pengeluaran = Pengeluaran::orderByRaw('created_at DESC')->where('anggaran_id',$id)->get();

        return view('admin.pengeluaran.lihat_semua',compact('data_pengeluaran'));
}
}
