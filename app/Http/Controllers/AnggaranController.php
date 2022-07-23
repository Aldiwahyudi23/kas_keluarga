<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
USE App\Models\Program;
use App\Models\User;

use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = DB::table('anggarans')->join('programs','programs.id','=','anggarans.program_id')->get();


        $data_anggarans = $data->groupBy('nama_program');
        $data_anggaran = Anggaran::orderByRaw('created_at DESC')->get();
        $data_program = Program::orderByRaw('nama_program ASC')->get();
        $data_anggota = User::orderByRaw('name ASC')->get();

        return view('admin.master_data.anggaran.index', compact('data_anggaran', 'data_anggota', 'data_program','data_anggarans'));
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
     * @param  \App\Http\Requests\StoreAnggaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required',
            'nama_anggaran' => 'required|unique:anggarans',
            'deskripsi' => 'required',

        ],
        [
            'program_id.required'  => 'Program teu kengeng kosong',
            'nama_anggaran.required'  => 'Nama Anggran teu kengeng kosong',
            'nama_anggaran.unique'  => 'Nama Anggran atos aya',
            'deskripsi.required'  => 'Deskripsi teu kengeng kosong',
            'persen.required'  => 'Persen teu kengeng kosong',
            'max_orang.required'  => 'limit perorangan teu kengeng kosong',
            'nominal_max_anggaran.required'  => 'limit anggaran teu kengeng kosong',
        ]
    );
        $data_anggaranr = new Anggaran();
        $data_anggaranr->nama_anggaran          = $request->nama_anggaran;
        $data_anggaranr->program_id             = $request->program_id;
        $data_anggaranr->deskripsi              = $request->deskripsi;
        $data_anggaranr->persen              = $request->persen;
        $data_anggaranr->max_orang              = $request->max_orang;
        $data_anggaranr->nominal_max_anggaran              = $request->nominal_max_anggaran;
        $data_anggaranr->save();
        $anggaranr = Anggaran::find($data_anggaranr->id);

        return redirect()->back()->with('sukses', 'Data Anggaran Parantos Ka tambahkeun kana data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $anggaran = Anggaran::find($id);

        return view('admin.master_data.anggaran.show', compact('anggaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $id = Crypt::decrypt($id);
        $anggaran = DB::table('programs')->join('anggarans', 'anggarans.program_id', '=', 'programs.id')->where('nama_program',$id)->get();
        $program = Program::first();

        return view('admin.master_data.anggaran.detail', compact('anggaran','program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $anggaran = Anggaran::findorfail($id);
        $data_anggaran = Anggaran::all();
        $data_program = Program::all();

        return view('admin.master_data.anggaran.edit', compact('anggaran','data_anggaran','data_program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnggaranRequest  $request
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $id = Crypt::decrypt($id); 
        $request->validate(
            [
                'program_id' => 'required',
                'nama_anggaran' => 'required',
                'deskripsi' => 'required',

            ],
            [
                'program_id.required'  => 'Program teu kengeng kosong',
                'nama_anggaran.required'  => 'Nama Anggran teu kengeng kosong',
                'nama_anggaran.unique'  => 'Nama Anggran atos aya',
                'deskripsi.required'  => 'Deskripsi teu kengeng kosong',
                'persen.required'  => 'Persen teu kengeng kosong',
                'max_orang.required'  => 'limit perorangan teu kengeng kosong',
                'nominal_max_anggaran.required'  => 'limit anggaran teu kengeng kosong',
            ]
        );
        $data = Anggaran::find($id);
        $data->nama_anggaran          = $request->nama_anggaran;
        $data->program_id             = $request->program_id;
        $data->deskripsi              = $request->deskripsi;
        $data->persen                 = $request->persen;
        $data->max_orang              = $request->max_orang;
        $data->nominal_max_anggaran   = $request->nominal_max_anggaran;

        $data->update();
        Session::flash('infoes', 'Data Anggaran Parantos di edit');
        return redirect('anggaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $anggaran = Anggaran::find($id);

        $anggaran->delete();

        return redirect()->back()->with('kuning', 'Data Berhasil di hapus (silahkan cek trash data anggaran)');
    }
    public function trash()
    {
        $data_anggaran = Anggaran::onlyTrashed()->get();

        return view('admin.master_data.anggaran.trash', compact('data_anggaran'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $data_anggaran = Anggaran::withTrashed()->findorfail($id);
        $data_anggaran->restore();
        return redirect()->back()->with('infoes', 'Data anggaran berhasil direstore! (Silahkan cek data anggaran)');
    }

    public function kill($id)
    {
        $id = Crypt::decrypt($id);
        $data_anggaran = Anggaran::withTrashed()->findorfail($id);

        $data_anggaran->forceDelete();
        return redirect()->back()->with('kuning', 'Data anggaran berhasil dihapus! (Silahkan cek data anggaran)');
    }



}
