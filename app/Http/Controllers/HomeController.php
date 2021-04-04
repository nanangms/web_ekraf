<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Pelaku_ekraf;
use App\Models\Berita;
use App\Models\Produk;
use App\Models\Event;
use App\Models\Sektor;
use App\Models\Kabupatenkota;

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
        $pendaftaran = Pendaftaran::where('verifikasi','N')->count();
        $pelaku = Pelaku_ekraf::count();
        $berita = Berita::count();
        $produk = Produk::count();
        $event = Event::count();

        $sektor = Sektor::all();
        $categories_sektor = [];
        $data1 = [];
        foreach($sektor as $s){
            $categories_sektor[] = $s->nama_sektor;
            $data1[] = Pelaku_ekraf::where('sektor_id',$s->id)->count();
        }

        $kab = Kabupatenkota::all();
        $categories_kab = [];
        $data2 = [];
        foreach($kab as $k){
            $categories_kab[] = $k->nama_kab_kota;
            $data2[] = Pelaku_ekraf::where('kab_kota_id',$k->id)->count();
        }

        return view('home',compact('pendaftaran','pelaku','berita','produk','event','categories_sektor','sektor','data1','categories_kab','data2'));
    }
}
