<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengumuman;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_login = User::select('*')
        ->whereNotNull('last_seen')
        ->orderBy('last_seen', 'DESC')
        ->paginate(10);
        $pengumuman = Pengumuman::first();

        return view('home', compact('pengumuman','data_login'));
    }

    public function saveToken(Request $request)
    {
        Auth::user()->update(['device_token' => $request->token]);
        return response()->json(['token saved successfully.']);
    }

    public function peraturan (){
        $keluarga = User::find(Auth::user()->id);
        return view('admin.peraturan.index',compact('keluarga'));
    }

}
