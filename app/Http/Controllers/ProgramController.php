<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;

use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_program = Program::all();

        return view('admin.master_data.program.index',compact('data_program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProgramRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $request->validate(
            [
                'nama_program' => 'Required|unique:programs',
                'deskripsi' => 'required'
                
            ],
            [
                'nama_program.required'  => "Program Kedah di isian",
                'nama_program.unique'  => "Program atos aya",
                'deskripsi.required'  => "Deskripsi kedah di isi sareng detail" 
            ]
            );

            $data = new Program;
            $data->nama_program     = $request->nama_program;
            $data->penjelasan        = $request->deskripsi;

            $data -> save();

            Session::flash('sukses', 'Data Program Parantos ka simpen');
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $program = Program::find($id);

        return view('admin.master_data.program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $program = Program::find($id);

        return view('admin.master_data.program.edit',compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProgramRequest  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $id = Crypt::decrypt($id);
        $request->validate(
            [
                'nama_program' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'nama_program.required'  => "Program Kedah di isian",
                'nama_program.unique'  => "Program atos aya",
                'deskripsi.required'  => "Deskripsi kedah di isi sareng detail" 
            ]
        );
        $data = Program::find($id);
        $data->nama_program = $request->nama_program;
        $data->penjelasan = $request->deskripsi;

        $data->update();
        Session::flash('infoes', 'Data Program Parantos di edit');
        return redirect('program');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $program = Program::find($id);

        $program->delete();

        return redirect()->back()->with('kuning', 'Data Berhasil di hapus (silahkan cek trash data Program)');

    }
    public function trash()
    {
        $data_program = Program::onlyTrashed()->get();

        return view('admin.master_data.program.trash', compact('data_program'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $data_program = Program::withTrashed()->findorfail($id);
        $data_program->restore();
        return redirect()->back()->with('infoes', 'Data program berhasil direstore! (Silahkan cek data Program)');
    }

    public function kill($id)
    {
        $id = Crypt::decrypt($id);
        $data_program = Program::withTrashed()->findorfail($id);

        $data_program->forceDelete();
        return redirect()->back()->with('kuning', 'Data program berhasil dihapus! (Silahkan cek data Program)');
    }
}
