<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use Illuminate\Http\Request;
use App\Http\Requests\DataKeluargaRequest;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
USE Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Whoops\Exception\ErrorException;

class DataKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AnggotaKeluarga::all();
        $data_keluarga_role = $data->groupBy('nama_hubungan');
        $data_keluarga = AnggotaKeluarga::all();
        return view('admin.master_data.data_keluarga.index',compact('data_keluarga','data_keluarga_role'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|unique:keluargas',
            'jk'  => 'required',
            'tmp_lahir'  => 'required',
            'tgl_lahir'  => 'required',
            'alamat'  => 'required',
            'no_hp'  => 'unique:keluargas|max:13',
            'nik'  => 'unique:keluargas|min:15|max:17',
            'nama_hubungan'  => 'required',
            'hubungan'  => 'required',
            'pekerjaan'  => 'required',
        ],
            [
                'nama.required'        => "Nama teu kengeng kosong.",
                'nama.unique'        => "Nama ieu atos aya di data (kasih ini sial di pengker nami.",
                'jk.required'        => "teu kengeng kosong.",
                'tmp_lahir.required'        => "Tempat lahir teu kengeng kosong.",
                'tgl_lahir.required'        => "Tanggal lahir teu kengeng kosong.",
                'alamat.required'        => "alamat teu kengeng kosong.",
                'no_hp.required'        => "no hp teu kengeng kosong.",
                'no_hp.unique'        => "no hp atos terdaftar.",
                'no_hp.max'        => "Max jumlah angka 13.",
                'nama_hubungan.required'        => "nama teu kengeng kosong.",
                'hubungan.required'        => "hubungan teu kengeng kosong.",
                'pekerjaan.required'        => "pekerjaan teu kengeng kosong.",
                'nik.required'        => "nik teu kengeng kosong.",
                'nik.unique'        => "nik atos terdaftar.",
                'nik.min'        => "jumlah angka NIK kedah 15.", 
                'nik.max'        => "jumlah angka NIK kedah di bawah 17.", 
                
            ]
        );
        if ($request->foto) {
            $file = $request->file('foto');
            $nama = 'logo-' . date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img/profile'), $nama);
        } else {
            if ($request->jk == 'Laki-Laki') {
                $nameFoto = 'img/keluarga/52471919042020_male.jpg';
            } else {
                $nameFoto = 'img/keluarga/52471919042020_female.jpg';
            }
        }
            $lahir = Date ('dmY',strtotime($request->tgl_lahir));
            $no_induk = $request->nik - $lahir;

            $data = new AnggotaKeluarga;
            $data->nama      = $request->nama;
            $data->jenis_kelamin      = $request->jk;
            $data->tempat_lahir      = $request->tmp_lahir;
            $data->tanggal_lahir      = $request->tgl_lahir;
            $data->alamat      = $request->alamat;
            $data->no_hp      = $request->no_hp;
            $data->nik      = $no_induk;
            $data->nama_hubungan      = $request->nama_hubungan;
            $data->hubungan      = $request->hubungan;
            $data->pekerjaan      = $request->pekerjaan;
            $data->anak_ke      = $request->anak_ke;
            $data->foto      = "/img/profile/$nama";

            $data->save();

            


            Session::flash('sukses', 'Data Anggota Keluarga Parantos ka simpen');
            return redirect()->back();
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

        $data_keluarga = AnggotaKeluarga::findorFail($id);

        return view('admin.master_data.data_keluarga.show',compact('data_keluarga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = AnggotaKeluarga::all();
        $data_keluarga_role = $data->groupBy('nama_hubungan');
        $data_keluarga = AnggotaKeluarga::where('nama_hubungan',$id)->get();
        $data_hubungan = $data_keluarga->groupBy('nama_hubungan');

        return view('admin.master_data.data_keluarga.detail',compact('data_keluarga','data_hubungan','data_keluarga_role'));
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
        $data_keluargas = AnggotaKeluarga::all();
        $data_keluarga = AnggotaKeluarga::findorfail($id);

        return view('admin.master_data.data_keluarga.edit',compact('data_keluarga', 'data_keluargas'));
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
                'nama'     => 'required',
                'jk'  => 'required',
                'tmp_lahir'  => 'required',
                'tgl_lahir'  => 'required',
                'alamat'  => 'required',
                'no_hp'  => 'max:13',
                'nik'  => 'min:15|max:17',
                'nama_hubungan'  => 'required',
                'hubungan'  => 'required',
                'pekerjaan'  => 'required',
            ],
            [
                'nama.required'        => "Nama teu kengeng kosong.",
                'nama.unique'        => "Nama ieu atos aya di data (kasih ini sial di pengker nami.",
                'jk.required'        => "teu kengeng kosong.",
                'tmp_lahir.required'        => "Tempat lahir teu kengeng kosong.",
                'tgl_lahir.required'        => "Tanggal lahir teu kengeng kosong.",
                'alamat.required'        => "alamat teu kengeng kosong.",
                'no_hp.required'        => "no hp teu kengeng kosong.",
                'no_hp.unique'        => "no hp atos terdaftar.",
                'no_hp.max'        => "Max jumlah angka 13.",
                'nama_hubungan.required'        => "nama teu kengeng kosong.",
                'hubungan.required'        => "hubungan teu kengeng kosong.",
                'pekerjaan.required'        => "pekerjaan teu kengeng kosong.",
                'nik.required'        => "nik teu kengeng kosong.",
                'nik.unique'        => "nik atos terdaftar.",
                'nik.min'        => "jumlah angka NIK kedah 15.",
                'nik.max'        => "jumlah angka NIK kedah di bawah 17.",

            ]
        );
        if ($request->foto) {
            $file = $request->file('foto');
            $nama = 'logo-' . date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img/profile'), $nama);
        } else {
              
        }



        $data = AnggotaKeluarga::find($id);
        $data->nama      = $request->nama;
        $data->jenis_kelamin      = $request->jk;
        $data->tempat_lahir      = $request->tmp_lahir;
        $data->tanggal_lahir      = $request->tgl_lahir;
        $data->alamat      = $request->alamat;
        $data->no_hp      = $request->no_hp;
        $data->nik      = $request->nik;
        $data->pekerjaan      = $request->pekerjaan;
        $data->nama_hubungan      = $request->nama_hubungan;
        $data->hubungan      = $request->hubungan;
        $data->anak_ke      = $request->anak_ke;
        if ($request->foto) {
            $data->foto      = "/img/profile/$nama";
        }else{

        }
        $data->update();

        if (Auth::user()->role == 'Admin') {
            Session::flash('infoes', 'Data Anggota Keluarga Parantos di edit');
            return redirect()->back();
        }else{
            return redirect()->back()->with('infoes','Selamat Ayeuna profilena atos di robah');
        }
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
        $data_keluarga = AnggotaKeluarga::find($id);
        $anggota = Anggota::find($id);
        $hitung_anggota = Anggota::where('keluarga_id',$data_keluarga->id)->count();
        if ($hitung_anggota >=1){
            $data_keluarga->delete();
            $anggota->delete();

            return redirect()->back()->with('kuning','Data Berhasil di hapus (silahkan cek trash data keluarga)');
        }else{
            $data_keluarga->delete();

            return redirect()->back()->with('kuning','Data Berhasil di hapus (silahkan cek trash data keluarga)');
        }
    }
    public function trash()
    {
        $data_keluarga = AnggotaKeluarga::onlyTrashed()->get();

        return view('admin.master_data.data_keluarga.trash', compact('data_keluarga'));
    }

    public function restore($id)
    {
        $id = Crypt::decrypt($id);
        $data_keluarga = AnggotaKeluarga::withTrashed()->findorfail($id);
        $countAnggota = Anggota::withTrashed()->where('keluarga_id', $data_keluarga->id)->count();
        if ($countAnggota >= 1) {
            $anggota = Anggota::withTrashed()->where('id', $data_keluarga->id)->first();
            $data_keluarga->restore();
            $anggota->restore();
            return redirect()->back()->with('infoes', 'Data Anggota Kleuarga berhasil direstore! (Silahkan cek data keluarga)');
        } else {
            $data_keluarga->restore();
            return redirect()->back()->with('infoes', 'Data Anggota Kleuarga berhasil direstore! (Silahkan cek data keluarga)');
        }
    }

    public function kill($id)
    {
        $id = Crypt::decrypt($id);
        $data_keluarga = AnggotaKeluarga::withTrashed()->findorfail($id);
        $countAnggota = Anggota::withTrashed()->where('keluarga_id', $data_keluarga->id)->count();
        if ($countAnggota >= 1) {
            $anggota = Anggota::withTrashed()->where('id', $data_keluarga->id)->first();
            $data_keluarga->forceDelete();
            $anggota->forceDelete();
            return redirect()->back()->with('kuning', 'Data Anggota Kleuarga berhasil dihapus! (Silahkan cek data siswa)');
        } else {
            $data_keluarga->forceDelete();
            return redirect()->back()->with('kuning', 'Data Anggota Kleuarga berhasil dihapus! (Silahkan cek data siswa)');
        }
    }

// Profile
    public function profile() 
    {
        $id = User::find(Auth::user()->id) ;
        $data_keluarga = AnggotaKeluarga::find($id->keluarga_id);

        return view('admin.profile.index',compact('data_keluarga'));
    }

    public function profile_edit($id) 
    {
        $id = Crypt::decrypt($id) ;
        $data_keluarga = AnggotaKeluarga::find($id);
        $data_keluargas = AnggotaKeluarga::all();

        return view('admin.profile.edit',compact('data_keluarga','data_keluargas'));
    }
    public function edit_email()
    {
        return view('admin.profile.email');
    }

    public function ubah_email(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email'
        ]);
        $user = User::findorfail(Auth::user()->id);
        $cekUser = User::where('email', $request->email)->count();
        if ($cekUser >= 1) {
            return redirect()->back()->with('error', 'Maaf email ini sudah terdaftar!');
        } else {
            $user_email = [
                'email' => $request->email,
            ];
            $user->update($user_email);
            return redirect()->back()->with('success', 'Email anda berhasil diperbarui!');
        }
    }

    public function edit_password()
    {
        return view('admin.profile.password');
    }

    public function ubah_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user = User::findorfail(Auth::user()->id);
        if ($request->password_lama) {
            if (Hash::check($request->password_lama, $user->password)) {
                if ($request->password_lama == $request->password) {
                    return redirect()->back()->with('error', 'Maaf password yang anda masukkan sama!');
                } else {
                    $user_password = [
                        'password' => Hash::make($request->password),
                    ];
                    $user->update($user_password);
                    return redirect()->back()->with('success', 'Password anda berhasil diperbarui!');
                }
            } else {
                return redirect()->back()->with('error', 'Tolong masukkan password lama anda dengan benar!');
            }
        } else {
            return redirect()->back()->with('error', 'Tolong masukkan password lama anda terlebih dahulu!');
        }
    }
}
                                                                   