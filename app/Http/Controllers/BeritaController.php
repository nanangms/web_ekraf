<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use DataTables;
use DB;
use Jenssegers\Date\Date;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = \App\Models\Berita::all();
        return view('berita.index',['berita' => $berita]);
    }

    public function tambah()
    {
        return view('berita.tambah');
    }

    public function create(Request $request)
    {
        $user = auth()->user()->id;

        $this->validate($request,[
            'judul'=>'required',
            'isi'=>'required',
            'published'=>'required',
            'gambar'=> 'mimes:jpg,png,jpeg'
        ]);

        $berita = new \App\Models\Berita;
        $berita->judul = $request->judul;
        $berita->published = $request->published;
        $berita->user_id = auth()->user()->id;
        $berita->isi = $request->isi;                  

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('images/berita/',$request->file('gambar')->getClientOriginalName());
            $berita->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $berita->save();
        
        return redirect('/berita')->with('sukses','Data berhasil ditambah');
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('berita.edit',compact('berita'));   
    }

    public function update(Request $request, Berita $berita)
    {   
        if ($request->hasFile('gambar')) {
            if($berita->gambar != ""){
                File::delete('images/berita/'.$berita->gambar);
            }
            $request->file('gambar')->move('images/berita/',$request->file('gambar')->getClientOriginalName());

            $berita->user_id = auth()->user()->id;
            $berita->judul = $request->judul;
            $berita->isi = $request->isi;
            $berita->published = $request->published;
            $berita->gambar = $request->file('gambar')->getClientOriginalName();
            $berita->update();
            
        }else{
            $berita->user_id = auth()->user()->id;
            $berita->judul = $request->judul;
            $berita->judul_seo = null;
            $berita->isi = $request->isi;
            $berita->published = $request->published;
            $berita->update(); 
        }

        return redirect('berita')->with('sukses','Data berhasil diubah');          
    }

    public function delete(Berita $berita){  
        DB::table('berita')->where('id', $berita)->delete();      
        $berita->delete();
        File::delete('images/berita/'.$berita->gambar);
        return redirect('/berita')->with('hapus','Data Berhasil dihapus');
    }

    public function dataTable()
    {
        Date::setLocale('id');//id kode untuk indonesia
        $berita = Berita::select('berita.*')->get();
        return DataTables::of($berita)
        ->addColumn('tgl_publish',function($berita){
            return Date::parse($berita->created_at)->format('j F Y');
        })
        ->addColumn('action', function ($berita) {
            return '<a href="berita/'.$berita->id.'/edit" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
            <button class="btn btn-danger btn-xs hapus" berita-name="'.$berita->judul.'" berita-id="'.$berita->id.'" title="Hapus"><i class="fas fa-trash-alt"></i></button>';
        })
        ->addColumn('gambar', function ($berita) {
            return '<a href="'.$berita->getImageBerita().'" target="_blank"><img src="'.$berita->getImageBerita().'" width="100px"></a>';
        })
        ->addColumn('published',function($berita){
            if($berita->published == 'Y'){
               return '<span class="badge badge-success">Aktif</span>';
           }else{
               return '<span class="badge badge-danger">Tidak Aktif</span>'; 
           }

       })
        ->addIndexColumn()
        ->rawColumns(['action','tgl_publish','gambar','published'])
        ->make(true);
    }
}
