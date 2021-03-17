<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; // Utk motong string
use Jenssegers\Date\Date;

class IndexController extends Controller
{
    public function index()
    {
    	Date::setLocale('id');//id kode untuk indonesia

    	$berita = \App\Models\Berita::orderBy('created_at', 'desc')->limit(5)->get();
		$foto = \App\Models\Foto::orderBy('id', 'desc')->limit(9)->get();
		$faq = \App\Models\Faq::orderBy('urutan', 'asc')->get();
        return view('homepage.home', compact('berita','foto','faq'));
    }
}
