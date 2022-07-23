<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Program;
use App\Models\RoleProgram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class RoleProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data_role_program = User::find($id);
        $data_program = Program::all();

        return view('admin.master_data.anggota.role_program.index', compact('data_role_program','data_program'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'program' => 'required'
            ],
            [
                'program.required' => "Program kedah di pilih"
            ]
            );

            $anggota = DB::table('keluargas')->join('users','users.keluarga_id','=','keluargas.id')->get();
            $user = $anggota->first();
            if ($user->pekerjaan == "Bekerja"){
                if ($request->program == 1){
                $data = Anggota::find(Auth::user()->id);
                        $data->program1 = "Kas";
                        $data->update();
                        return redirect()->back()->with('sukses','Program Kas Keluraga atos di pilih, MANTAP Ayeunamah anjen wajib iuran bulanan Rp. 50.000,00 ');
                    }
            } elseif ($request->program == 2) {
                $data = Anggota::find(Auth::user()->id);
                $data->program2 = "Tabungan";
                $data->update();
                return redirect()->back()->with('sukses', 'Progra atos di pilih, MANTAP');
            
        }else{
            return redirect()->back()->with('kuning','Punten Saudara/saudari keluarga Alm. Ma haya. Program Kas Keluarga kanggo anu anggota na atos damel, pami teu acan damel teu acan tiasa ngiringan heula. Mangga seer nabung we supados aya bekel');

        }

            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
