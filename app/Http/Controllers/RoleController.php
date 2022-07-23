<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Crypt;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_role = Role::all();

        return view('admin.master_data.role.index',compact('data_role'));
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
                'nama_role' => 'Required|unique:roles',

            ],
            [
                'nama_role.required' => "Nama Role Kedah di isi, teu kengeng kosong",
                'nama_role.unique' => "Nama Role Atos Aya"
            ]
            );

            $data = new Role;
            $data->nama_role = $request->nama_role;
            $data->deskripsi = $request->deskripsi;

            $data -> save();

            return redirect()->back()->with('sukses','Data Role parantos di dimpen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $role = Role::find($id);

        return view('admin.master_data.role.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $role = Role::find($id);
        $data_role = Role::all();

        return view('admin.master_data.role.edit',compact('data_role','role'));
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
        $id = Crypt::decrypt($id);
        $request->validate(
            [
                'nama_role' => 'required',
            ],
            [
                'nama_role.required' => "Role Kedah di esian"
            ]
            );

            $data = Role::find($id);
            $data->nama_role = $request->nama_role;
            $data->Deskripsi = $request->deskripsi;

            $data->update();
            return redirect('role')->with('infoes','Data Atos di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $role = Role::find($id);

        $role->delete();

        return redirect()->back()->with('kuning', 'Data Berhasil di hapus (silahkan cek trash data role)');
    }
    public function trash()
    {
        $data_role = Role::onlyTrashed()->get();

        return view('admin.master_data.role.trash', compact('data_role'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $data_role = Role::withTrashed()->findorfail($id);
        $data_role->restore();
        return redirect()->back()->with('infoes', 'Data role berhasil direstore! (Silahkan cek data role)');
    }

    public function kill($id)
    {
        $id = Crypt::decrypt($id);
        $data_role = Role::withTrashed()->findorfail($id);

        $data_role->forceDelete();
        return redirect()->back()->with('kuning', 'Data role berhasil dihapus! (Silahkan cek data role)');
    }
}

