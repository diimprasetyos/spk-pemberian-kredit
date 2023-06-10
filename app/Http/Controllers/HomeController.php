<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Pemohon;
use App\Models\Berkas;
use App\Models\Riwayat;



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
        $users = User::all();
        $riwayatpengajuan = Riwayat::all();
        $berkas = Berkas::count();
        $pemohonCount = Pemohon::count();
        return view('home', compact('users', 'berkas', 'pemohonCount', 'riwayatpengajuan'));
    }
}
