<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foto;
use DataTables;
use DB;
use Jenssegers\Date\Date;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class FotoController extends Controller
{
    public function index($id)
    {
        $album = \App\Models\Album::where('id',$id)->first();
        $foto = \App\Models\Foto::where('album_id',$id)->get();
        return view('galeri.foto.index',compact('album','foto'));
    }

    public function create(Request $request, $id)
    {
        $id_album = $id;
        $this->validate($request,[
            'gambar'=>'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $keterangan = $request->keterangan;
            $image_name1 = str_replace(' ', '_', $request->nama_album).'_'.kode_acak(5).'.'.$foto->getClientOriginalExtension();
            // for save original image
            $ImageUpload = Image::make($foto);
            $ImageUpload->save(public_path('images/foto/'.$image_name1));

            // for save thumbnail image
            $ImageUpload->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
            $ImageUpload->save(public_path('images/foto/thumb/'.$image_name1));


            DB::beginTransaction();
            try{
                $foto = new \App\Models\Foto;
                $foto->gambar = $image_name1;     
                $foto->keterangan = $keterangan;
                $foto->album_id = $id;     
                $foto->save();
                
                DB::commit();
                return redirect('/galeri/foto/'.$id_album)->with('sukses','Data berhasil ditambah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }
    }

    public function delete($id){

        $foto = Foto::where('uuid',$id)->firstOrFail();
        $foto->delete();
        File::delete('images/foto/'.$foto->gambar);   
        File::delete('images/foto/thumb/'.$foto->gambar);            
    }

    public function dataTable($id)
    {
        Date::setLocale('id');//id kode untuk indonesia
        $foto = Foto::select('foto.*')->where('album_id',$id);
        return DataTables::of($foto)
        ->addColumn('action', function ($foto) {
            return '
            <button class="btn btn-danger btn-xs hapus" foto-name="'.$foto->judul.'" foto-id="'.$foto->uuid.'" title="Hapus"><i class="fas fa-trash-alt"></i></button>';
        })
        ->addColumn('keterangan', function ($foto) {
            return $foto->keterangan;
        })
        ->addColumn('gambar', function ($foto) {
            return '<a href="'.$foto->getImageFoto().'" target="_blank"><img src="'.asset('images/foto/thumb/'.$foto->gambar).'" width="100px"></a>';
        })
        ->addIndexColumn()
        ->rawColumns(['action','gambar'])
        ->make(true);
    }
}
