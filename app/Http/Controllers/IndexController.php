<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; // Utk motong string
use Jenssegers\Date\Date;
use App\Models\Pelaku_ekraf;
use DB;
use App\Models\Kabupatenkota;
use App\Models\Sektor;
use App\Models\Produk;


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
        $kab_kota = \App\Models\Kabupatenkota::all();
        $kab = Kabupatenkota::select('kab_kota.id','kab_kota.nama_kab_kota')->get();
        $sektor = \App\Models\Sektor::all();
        $usaha = \App\Models\Pelaku_ekraf::all();
        $produk = \App\Models\Produk::all();

		$pelaku_ekraf = DB::table('pelaku_ekraf as a')
                ->select('a.nama_usaha', 'a.foto_usaha','a.kode_pelaku_ekraf','b.nama_sektor')
                ->join('sektor as b', 'b.id', '=', 'a.sektor_id')
                ->orderBy('a.id', 'desc')
                ->limit(4)
                ->get();
            //dd($pelaku_ekraf);
        return view('homepage.home', compact('berita','foto','event','faq','kab_kota','kab','sektor','usaha','produk','pelaku_ekraf'));
    }

    public function faq()
    {
    	$faq = \App\Models\Faq::orderBy('urutan', 'asc')->get();
        return view('homepage.faq', compact('faq'));
    }

    public function kontak()
    {
        return view('homepage.kontak');
    }

    public function syarat_ketentuan()
    {
        return view('homepage.syarat_ketentuan');
    }

    public function profil_ekraf()
    {
        return view('homepage.profil_ekraf');
    }

    public function berita()
    {
    	$beritas = \App\Models\Berita::orderBy('created_at', 'desc')->paginate(8);
        return view('homepage.berita', compact('beritas'));
    }

    public function detail_berita($seo)
    {
    	$berita = \App\Models\Berita::where('judul_seo',$seo)->first();
        $baca_juga = \App\Models\Berita::where('kategori_id',$berita->kategori_id)->orderBy('created_at', 'desc')->limit(4)->get();
        return view('homepage.detail_berita', compact('berita','baca_juga'));
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
        $kab = Kabupatenkota::select('kab_kota.id','kab_kota.nama_kab_kota')->get();
        $sektor = Sektor::select('sektor.id','sektor.nama_sektor')->get();
        $pelaku_ekrafs = DB::table('pelaku_ekraf as a')
                ->select('a.nama_usaha','a.kode_pelaku_ekraf', 'a.foto_usaha','a.kode_pelaku_ekraf','b.nama_sektor')
                ->join('sektor as b', 'b.id', '=', 'a.sektor_id')
                ->orderBy('a.id', 'desc')
                ->paginate(9);
                //dd($pelaku_ekrafs);
        return view('homepage.pelaku_ekraf',compact('pelaku_ekrafs','kab','sektor'));
    }

    public function pelaku_ekraf_detail($kode)
    {
        $kab = Kabupatenkota::select('kab_kota.id','kab_kota.nama_kab_kota')->get();
        $sektor = Sektor::select('sektor.id','sektor.nama_sektor')->get();
        $pelaku_ekraf = DB::table('pelaku_ekraf as a')
                ->select('a.*','b.nama_sektor','c.nama_kab_kota','d.nama_badan_hukum','b.seo_sektor','c.seo_kab_kota')
                ->join('sektor as b', 'b.id', '=', 'a.sektor_id')
                ->join('kab_kota as c', 'c.id', '=', 'a.kab_kota_id')
                ->join('badan_hukum as d', 'd.id', '=', 'a.badan_hukum_id')
                ->orderBy('a.id', 'desc')
                ->where('kode_pelaku_ekraf',$kode)
                ->first();
        $produk = Produk::where('kode_pelaku_ekraf',$kode)->get();
        return view('homepage.pelaku_ekraf_detail',compact('pelaku_ekraf','kab','sektor','produk'));
    }

    public function search_pelaku_ekraf(Request $r)
    {
        $key_nama=$r->nama_usaha;
        $key_kab=$r->kab;
        $key_sektor=$r->sektor;

        $kab = Kabupatenkota::select('kab_kota.id','kab_kota.nama_kab_kota')->get();
        $sektor = Sektor::select('sektor.id','sektor.nama_sektor')->get();

        $nama_kab = Kabupatenkota::where('id',$r->kab)->first();
        $nama_sektor = Sektor::where('id',$r->sektor)->first();
        

        $pelaku_ekrafs = DB::table('pelaku_ekraf as a')
                ->select('a.nama_usaha','a.kode_pelaku_ekraf', 'a.foto_usaha','a.kode_pelaku_ekraf','b.nama_sektor','a.kab_kota_id','a.sektor_id')
                ->join('sektor as b', 'b.id', '=', 'a.sektor_id')
                ->orderBy('a.id', 'desc');

        if($r->input('nama_usaha')){
             $pelaku_ekrafs->where('nama_usaha','like', '%'.$r->nama_usaha.'%');
        }
        if($r->input('kab')){
            $pelaku_ekrafs->where('kab_kota_id','like', '%'.$r->kab.'%');
        }
        if($r->input('sektor')){
            $pelaku_ekrafs->where('sektor_id', $r->sektor);
        }
    
        $pelaku_ekrafs = $pelaku_ekrafs->paginate(9);

        $jml_pelaku = DB::table('pelaku_ekraf as a')
                ->select('a.nama_usaha','a.kode_pelaku_ekraf', 'a.foto_usaha','a.kode_pelaku_ekraf','b.nama_sektor','a.kab_kota_id','a.sektor_id')
                ->join('sektor as b', 'b.id', '=', 'a.sektor_id')
                ->orderBy('a.id', 'desc');

        if($r->input('nama_usaha')){
             $jml_pelaku->where('nama_usaha','like', '%'.$r->nama_usaha.'%');
        }
        if($r->input('kab')){
            $jml_pelaku->where('kab_kota_id','like', '%'.$r->kab.'%');
        }
        if($r->input('sektor')){
            $jml_pelaku->where('sektor_id', $r->sektor);
        }
    
        $jml_pelaku = $jml_pelaku->count();

        return view('homepage.search_pelaku_ekraf',compact('pelaku_ekrafs','kab','sektor','key_nama','key_kab','key_sektor','nama_kab','nama_sektor','jml_pelaku'));
    }

    public function pelaku_ekraf_by_sektor($seo_sektor)
    {
        $kab = Kabupatenkota::select('kab_kota.id','kab_kota.nama_kab_kota')->get();
        $sektor = Sektor::select('sektor.id','sektor.nama_sektor')->get();
        $nama_sektor = Sektor::where('seo_sektor',$seo_sektor)->first();

        $pelaku_ekrafs = DB::table('pelaku_ekraf as a')
                ->select('a.nama_usaha','a.kode_pelaku_ekraf', 'a.foto_usaha','a.kode_pelaku_ekraf','b.nama_sektor','b.seo_sektor')
                ->join('sektor as b', 'b.id', '=', 'a.sektor_id')
                ->orderBy('a.id', 'desc')
                ->where('b.seo_sektor',$seo_sektor)
                ->paginate(9);
                //dd($pelaku_ekrafs);
        return view('homepage.pelaku_ekraf_sektor',compact('pelaku_ekrafs','kab','sektor','nama_sektor'));
    }

    public function pelaku_ekraf_by_kab($seo_kab)
    {
        $kab = Kabupatenkota::select('kab_kota.id','kab_kota.nama_kab_kota')->get();
        $sektor = Sektor::select('sektor.id','sektor.nama_sektor')->get();
        $nama_kab = Kabupatenkota::where('seo_kab_kota',$seo_kab)->first();

        $pelaku_ekrafs = DB::table('pelaku_ekraf as a')
                ->select('a.nama_usaha','a.kode_pelaku_ekraf', 'a.foto_usaha','a.kode_pelaku_ekraf','b.nama_sektor','b.seo_sektor')
                ->join('sektor as b', 'b.id', '=', 'a.sektor_id')
                ->join('kab_kota as c', 'c.id', '=', 'a.kab_kota_id')
                ->orderBy('a.id', 'desc')
                ->where('c.seo_kab_kota',$seo_kab)
                ->paginate(9);
                //dd($pelaku_ekrafs);
        return view('homepage.pelaku_ekraf_kabupaten',compact('pelaku_ekrafs','kab','sektor','nama_kab'));
    }
}
