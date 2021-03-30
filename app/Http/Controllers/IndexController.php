<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; // Utk motong string
use Jenssegers\Date\Date;
use App\Models\Pelaku_ekraf;
use DB;

class IndexController extends Controller
{
	public function __construct()
    {
        Date::setLocale('id');//id kode untuk indonesia
    }

    public function index()
    {
    	$berita = \App\Models\Berita::orderBy('created_at', 'desc')->limit(4)->get();
		$foto = \App\Models\Foto::orderBy('id', 'desc')->limit(9)->get();
        $event = \App\Models\Event::orderBy('id', 'desc')->limit(4)->get();
		$faq = \App\Models\Faq::orderBy('urutan', 'asc')->get();
		

		$pelaku_ekraf = DB::table('pelaku_ekraf as a')
                ->select('a.nama_usaha', 'a.foto_usaha','a.kode_pelaku_ekraf','b.nama_sektor')
                ->join('sektor as b', 'b.id', '=', 'a.sektor_id')
                ->orderBy('a.id', 'desc')
                ->limit(4)
                ->get();
            //dd($pelaku_ekraf);
        return view('homepage.home', compact('berita','foto','event','faq','pelaku_ekraf'));
    }

    public function faq()
    {
    	$faq = \App\Models\Faq::orderBy('urutan', 'asc')->get();
        return view('homepage.faq', compact('faq'));
    }

    public function profil_ekraf()
    {
        return view('homepage.profil_ekraf');
    }

    public function berita()
    {
    	$berita = \App\Models\Berita::orderBy('created_at', 'desc')->get();
        return view('homepage.berita', compact('berita'));
    }

    public function detail_berita($seo)
    {
    	$berita = \App\Models\Berita::where('judul_seo',$seo)->first();
        return view('homepage.detail_berita', compact('berita'));
    }

    public function detailacara($seo)
    {
    	$event = DB::table('event as a')
                ->select('a.*')
                ->where('event_seo',$seo)
                ->first();
        return view('homepage.detail_event', compact('event'));
    }

    public function acara()
    {
    	$event = DB::table('event as a')
                ->select('a.*')
                ->where('published','Y')
                ->orderBy('created_at', 'desc')
                ->get();
    	//$event = \App\Models\Event::where('published','Y')orderBy('created_at', 'desc')->get();
        return view('homepage.event', compact('event'));
    }

    public function album()
    {
    	$album = \App\Models\Album::orderBy('created_at', 'desc')->get();
        return view('homepage.album', compact('album'));
    }

    public function foto_album()
    {
        return view('homepage.foto');
    }

    public function video()
    {
        $video = \App\Models\Album::orderBy('created_at', 'desc')->get();
        return view('homepage.video', compact('video'));
    }

    public function pelaku_ekraf()
    {
        $pelaku_ekraf = DB::table('pelaku_ekraf as a')
                ->select('a.nama_usaha', 'a.foto_usaha','a.kode_pelaku_ekraf','b.nama_sektor')
                ->join('sektor as b', 'b.id', '=', 'a.sektor_id')
                ->orderBy('a.id', 'desc')
                ->limit(9)
                ->get();
        return view('homepage.pelaku_ekraf',compact('pelaku_ekraf'));
    }

    public function pelaku_ekraf_detail($kode)
    {
        $pelaku_ekraf = DB::table('pelaku_ekraf as a')
                ->select('a.*','b.nama_sektor','c.nama_kab_kota','d.nama_badan_hukum')
                ->join('sektor as b', 'b.id', '=', 'a.sektor_id')
                ->join('kab_kota as c', 'c.id', '=', 'a.kab_kota_id')
                ->join('badan_hukum as d', 'd.id', '=', 'a.badan_hukum_id')
                ->orderBy('a.id', 'desc')
                ->where('kode_pelaku_ekraf',$kode)
                ->first();
        return view('homepage.pelaku_ekraf_detail',compact('pelaku_ekraf'));
    }
}
