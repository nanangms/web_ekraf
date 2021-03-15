<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use DataTables;
use DB;
use Jenssegers\Date\Date;
use File;
use Intervention\Image\ImageManagerStatic as Image;

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
        $this->validate($request,[
            'judul'=>'required',
            'isi'=>'required',
            'published'=>'required',
            'gambar'=>'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $image_name1 = str_replace(' ', '_', $request->judul).'_'.kode_acak(5).'.'.$foto->getClientOriginalExtension();
            // for save original image
            $ImageUpload = Image::make($foto);
            $ImageUpload->save(public_path('images/berita/'.$image_name1));

            // for save thumbnail image
            $ImageUpload->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
            $ImageUpload->save(public_path('images/berita/thumb/'.$image_name1));


            DB::beginTransaction();
            try{
                $berita = new \App\Models\Berita;
                $berita->judul = $request->judul;
                $berita->published = $request->published;
                $berita->kategori_id = $request->kategori_id;
                $berita->tag = implode(",",$request->tag);
                $berita->user_id = auth()->user()->id;
                $berita->isi = $request->isi;  
                $berita->gambar = $image_name1;     
                $berita->save();
                
                DB::commit();
                return redirect('/berita')->with('sukses','Data berhasil ditambah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }
    }

    public function edit($id)
    {
        $berita = Berita::where('uuid',$id)->firstOrFail();
        return view('berita.edit',compact('berita'));   
    }

    public function update(Request $request,$id)
    {   
        $this->validate($request,[
            'judul'=>'required',
            'isi'=>'required',
            'published'=>'required',
            'gambar'=>'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        $berita = Berita::where('uuid',$id)->firstOrFail();
        if ($request->hasFile('gambar')) {
            File::delete('images/berita/'.$berita->gambar);   
            File::delete('images/berita/thumb/'.$berita->gambar);
            $foto = $request->file('gambar');
            $image_name1 = str_replace(' ', '_', $request->judul).'_'.kode_acak(5).'.'.$foto->getClientOriginalExtension();
            // for save original image
            $ImageUpload = Image::make($foto);
            $ImageUpload->save(public_path('images/berita/'.$image_name1));

            // for save thumbnail image
            $ImageUpload->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
            $ImageUpload->save(public_path('images/berita/thumb/'.$image_name1));


            DB::beginTransaction();
            try{
                
                $berita->judul = $request->judul;
                $berita->judul_seo       = null;
                $berita->kategori_id = $request->kategori_id;
                $berita->tag = implode(",",$request->tag);
                $berita->published = $request->published;
                $berita->user_id = auth()->user()->id;
                $berita->isi = $request->isi;  
                $berita->gambar = $image_name1;     
                $berita->save();
                
                DB::commit();
                return redirect('/berita')->with('sukses','Data berhasil ditambah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
            
        }else{
            DB::beginTransaction();
            try{
                $berita->judul = $request->judul;
                $berita->judul_seo       = null;
                $berita->kategori_id = $request->kategori_id;
                $berita->tag = implode(",",$request->tag);
                $berita->published = $request->published;
                $berita->isi = $request->isi;  
                $berita->save();
                
                DB::commit();
                return redirect('/berita')->with('sukses','Data berhasil ditambah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }

        return redirect('berita')->with('sukses','Data berhasil diubah');          
    }

    public function delete($id){

        $berita = Berita::where('uuid',$id)->firstOrFail();
        $berita->delete();
        File::delete('images/berita/'.$berita->gambar);   
        File::delete('images/berita/thumb/'.$berita->gambar);    
        
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
            return '<a href="berita/'.$berita->uuid.'/edit" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
            <button class="btn btn-danger btn-xs hapus" berita-name="'.$berita->judul.'" berita-id="'.$berita->uuid.'" title="Hapus"><i class="fas fa-trash-alt"></i></button>';
        })
        ->addColumn('gambar', function ($berita) {
            return '<a href="'.$berita->getImageBerita().'" target="_blank"><img src="'.asset('images/berita/thumb/'.$berita->gambar).'" width="100px"></a>';
        })
        ->addColumn('published',function($berita){
            if($berita->published == 'Y'){
               return '<span class="badge badge-success">Ya</span>';
           }else{
               return '<span class="badge badge-danger">Draft</span>'; 
           }

       })
        ->addIndexColumn()
        ->rawColumns(['action','tgl_publish','gambar','published'])
        ->make(true);
    }
}
