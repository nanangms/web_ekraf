<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupatenkota;
use App\Models\Badanhukum;
use App\Models\Sektor;
use App\Models\Produk;
use Auth;
use DB;
use App\Models\Pelaku_ekraf;
use Intervention\Image\ImageManagerStatic as Image;
use DataTables;
use File;

class PenggunaController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $kode = Auth::user()->kode_pelaku_ekraf;
        $pelaku = DB::table('pelaku_ekraf as a')
        ->select('a.*',
            'a.id as id_daftar',
            'b.nama_kab_kota',
            'c.nama_sektor','d.nama_badan_hukum')
        ->leftjoin('kab_kota as b','a.kab_kota_id','b.id')
        ->leftjoin('sektor as c','a.sektor_id','c.id')
        ->leftjoin('badan_hukum as d','a.badan_hukum_id','d.id')
        ->where('a.kode_pelaku_ekraf',$kode)
        ->first();
        return view('pengguna.dashboard',compact('pelaku'));
    }

    public function profil_usaha()
    {
        $kode = Auth::user()->kode_pelaku_ekraf;
        $kab = Kabupatenkota::select('kab_kota.id','kab_kota.nama_kab_kota')->get();
        $badan = Badanhukum::select('badan_hukum.id','badan_hukum.nama_badan_hukum')->get();
        $sektor = Sektor::select('sektor.id','sektor.nama_sektor')->get();
        $pelaku = DB::table('pelaku_ekraf as a')
        ->select('a.*',
            'a.id as id_daftar',
            'b.nama_kab_kota',
            'c.nama_sektor','d.nama_badan_hukum')
        ->leftjoin('kab_kota as b','a.kab_kota_id','b.id')
        ->leftjoin('sektor as c','a.sektor_id','c.id')
        ->leftjoin('badan_hukum as d','a.badan_hukum_id','d.id')
        ->where('a.kode_pelaku_ekraf',$kode)
        ->first();
        return view('pengguna.profil_usaha',compact(['kab','badan','sektor','pelaku']));
    }

    public function produk_usaha()
    {
        $kode = Auth::user()->kode_pelaku_ekraf;
        $produks = Produk::latest()->where('kode_pelaku_ekraf',$kode)->when(request()->q, function($users) {
            $produks = $produks->where('nama_produk', 'like', '%'. request()->q . '%');
        })->paginate(10);
        return view('pengguna.produk_usaha', compact('produks'));
    }

    public function update_profil_usaha(Request $request)
    {
        $this->validate($request,[
            'kode_pelaku_ekraf'=>'required',
            'kab_kota_id'=>'required',
            'sektor_id'=>'required',
            'badan_hukum_id'=>'required',
            'nama_usaha'=>'required',
            'mulai_usaha'=>'required',
            'foto_usaha'=>'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);
        $kode = $request->kode_pelaku_ekraf;
        $pelaku_ekraf = Pelaku_ekraf::where('kode_pelaku_ekraf',$kode)->firstOrFail();

        if ($request->hasFile('foto_usaha')) {
            File::delete('images/foto_usaha/'.$pelaku_ekraf->foto_usaha);
            File::delete('images/foto_usaha/thumb/'.$pelaku_ekraf->foto_usaha);
            $foto = $request->file('foto_usaha');
            $image_name1 = str_replace(' ', '_', $request->nama_usaha).'_'.kode_acak(5).'.'.$foto->getClientOriginalExtension();
            // for save original image
            $ImageUpload = Image::make($foto);
            $ImageUpload->save('images/foto_usaha/'.$image_name1);

            // for save thumbnail image
            $ImageUpload->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
            $ImageUpload->save('images/foto_usaha/thumb/'.$image_name1);


            DB::beginTransaction();
            try{
                $pelaku_ekraf->sektor_id      = $request->sektor_id;
                $pelaku_ekraf->kab_kota_id    = $request->kab_kota_id;
                $pelaku_ekraf->badan_hukum_id = $request->badan_hukum_id;
                $pelaku_ekraf->nama_usaha     = $request->nama_usaha;
                $pelaku_ekraf->siup_usaha     = $request->siup_usaha;
                $pelaku_ekraf->mulai_usaha    = $request->mulai_usaha;
                $pelaku_ekraf->deskripsi      = $request->deskripsi;
                $pelaku_ekraf->keahlian       = $request->keahlian;
                $pelaku_ekraf->pengalaman     = $request->pengalaman;
                $pelaku_ekraf->portofolio     = $request->portofolio;
                $pelaku_ekraf->foto_usaha     = $image_name1;     
                $pelaku_ekraf->save();
                
                DB::commit();
                return redirect()->back()->with('sukses','Data berhasil dirubah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }else{
            DB::beginTransaction();
            try{
                $pelaku_ekraf->sektor_id      = $request->sektor_id;
                $pelaku_ekraf->kab_kota_id    = $request->kab_kota_id;
                $pelaku_ekraf->badan_hukum_id = $request->badan_hukum_id;
                $pelaku_ekraf->nama_usaha     = $request->nama_usaha;
                $pelaku_ekraf->siup_usaha     = $request->siup_usaha;
                $pelaku_ekraf->mulai_usaha    = $request->mulai_usaha;
                $pelaku_ekraf->deskripsi      = $request->deskripsi;
                $pelaku_ekraf->keahlian       = $request->keahlian;
                $pelaku_ekraf->pengalaman     = $request->pengalaman;
                $pelaku_ekraf->portofolio     = $request->portofolio;
                $pelaku_ekraf->save();
                
                DB::commit();
                return redirect()->back()->with('sukses','Data berhasil dirubah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }
    }

    public function kontak_profil_usaha(Request $request)
    {
        $kode = $request->kode_pelaku_ekraf;
        $pelaku_ekraf = Pelaku_ekraf::where('kode_pelaku_ekraf',$kode)->firstOrFail();

        DB::beginTransaction();
            try{
                $pelaku_ekraf->alamat_usaha      = $request->alamat_usaha;
                $pelaku_ekraf->kode_pos          = $request->kode_pos;
                $pelaku_ekraf->email_usaha       = $request->email_usaha;
                $pelaku_ekraf->telepon_usaha     = $request->telepon_usaha;
                $pelaku_ekraf->facebook_usaha    = $request->facebook_usaha;
                $pelaku_ekraf->twitter_usaha     = $request->twitter_usaha;
                $pelaku_ekraf->ig_usaha          = $request->ig_usaha;
                $pelaku_ekraf->web_usaha         = $request->web_usaha;
                $pelaku_ekraf->save();
                
                DB::commit();
                return redirect()->back()->with('sukses','Data berhasil dirubah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
    }
    public function kontak_pemilik(Request $request)
    {
        $this->validate($request,[
            'foto_pemilik'=>'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        $kode = $request->kode_pelaku_ekraf;
        $pelaku_ekraf = Pelaku_ekraf::where('kode_pelaku_ekraf',$kode)->firstOrFail();

        if ($request->hasFile('foto_pemilik')) {
            File::delete('images/foto_pemilik/'.$pelaku_ekraf->foto_pemilik);
            File::delete('images/foto_pemilik/thumb/'.$pelaku_ekraf->foto_pemilik);
            $foto = $request->file('foto_pemilik');
            $image_name1 = str_replace(' ', '_', $request->nama_pemilik).'_'.kode_acak(5).'.'.$foto->getClientOriginalExtension();
            // for save original image
            $ImageUpload = Image::make($foto);
            $ImageUpload->save(public_path('images/foto_pemilik/'.$image_name1));

            // for save thumbnail image
            $ImageUpload->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
            $ImageUpload->save(public_path('images/foto_pemilik/thumb/'.$image_name1));


            DB::beginTransaction();
                try{
                    $pelaku_ekraf->foto_pemilik      = $image_name1;
                    $pelaku_ekraf->nama_pemilik      = $request->nama_pemilik;
                    $pelaku_ekraf->nik_pemilik       = $request->nik_pemilik;
                    $pelaku_ekraf->email_pemilik     = $request->email_pemilik;
                    $pelaku_ekraf->wa_pemilik        = $request->wa_pemilik;
                    $pelaku_ekraf->web_pemilik       = $request->web_pemilik;
                    $pelaku_ekraf->fb_pemilik        = $request->fb_pemilik;
                    $pelaku_ekraf->twitter_pemilik   = $request->twitter_pemilik;
                    $pelaku_ekraf->ig_pemilik        = $request->ig_pemilik;
                    $pelaku_ekraf->web_pemilik       = $request->web_pemilik;
                    $pelaku_ekraf->linkedin_pemilik  = $request->linkedin_pemilik;
                    $pelaku_ekraf->telegram_pemilik  = $request->telegram_pemilik;
                    $pelaku_ekraf->save();
                    
                    DB::commit();
                    return redirect()->back()->with('sukses','Data berhasil dirubah');
                }catch (\Exception $e){
                    DB::rollback();
                    return redirect()->back()->with('gagal','Data Gagal Diinput');
                }
        }else{
            DB::beginTransaction();
                try{
                    $pelaku_ekraf->nama_pemilik      = $request->nama_pemilik;
                    $pelaku_ekraf->nik_pemilik       = $request->nik_pemilik;
                    $pelaku_ekraf->email_pemilik     = $request->email_pemilik;
                    $pelaku_ekraf->wa_pemilik        = $request->wa_pemilik;
                    $pelaku_ekraf->web_pemilik       = $request->web_pemilik;
                    $pelaku_ekraf->fb_pemilik        = $request->fb_pemilik;
                    $pelaku_ekraf->twitter_pemilik   = $request->twitter_pemilik;
                    $pelaku_ekraf->ig_pemilik        = $request->ig_pemilik;
                    $pelaku_ekraf->web_pemilik       = $request->web_pemilik;
                    $pelaku_ekraf->linkedin_pemilik  = $request->linkedin_pemilik;
                    $pelaku_ekraf->telegram_pemilik  = $request->telegram_pemilik;
                    $pelaku_ekraf->save();
                    
                    DB::commit();
                    return redirect()->back()->with('sukses','Data berhasil dirubah');
                }catch (\Exception $e){
                    DB::rollback();
                    return redirect()->back()->with('gagal','Data Gagal Diinput');
                }
        }
    }

    public function dataTable($kode)
    {
        $model = Produk::where('kode_pelaku_ekraf',$kode);
        return DataTables::of($model)
        ->addColumn('harga',function($produk){
            return 'Rp. '.number_format($produk->harga).'';
        })
        ->addColumn('gambar', function ($produk) {
            return '<a href="'.$produk->getImageProduk().'" target="_blank"><img src="'.$produk->getImageProduk().'" width="100px"></a>';
        })
        ->addColumn('action', function ($produk) {
            return '<a href="/pengguna/produk-usaha/'.$produk->uuid.'/edit" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
             <button class="btn btn-danger btn-xs hapus" produk-name="'.$produk->nama_produk.'" produk-id="'.$produk->uuid.'" title="Hapus"><i class="fas fa-trash-alt"></i></button>';
        })
        ->addIndexColumn()
        ->rawColumns(['action','gambar','harga'])
        ->make(true);
    }

    public function edit_produk($id){
        $produk = Produk::where('uuid',$id)->first();
        return view('pengguna.edit_produk',compact(['produk']));
    }

    public function tambah_produk(Request $request)
    {
        $this->validate($request,[
            'nama_produk'=>'required',
            'deskripsi'=>'required',
            'harga'=>'required',
            'gambar'=>'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $image_name1 = str_replace(' ', '_', $request->nama_produk).'_'.kode_acak(5).'.'.$foto->getClientOriginalExtension();
            // for save original image
            $ImageUpload = Image::make($foto);
            $ImageUpload->save(public_path('images/produk/'.$image_name1));

            // for save thumbnail image
            $ImageUpload->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
            $ImageUpload->save(public_path('images/produk/thumb/'.$image_name1));

            DB::beginTransaction();
            try{
                $produk = new Produk();
                $produk->kode_pelaku_ekraf  = Auth::user()->kode_pelaku_ekraf;
                $produk->nama_produk   = $request->nama_produk;
                $produk->deskripsi     = $request->deskripsi;
                $produk->harga         = $request->harga;
                $produk->gambar        = $image_name1;
                $produk->save();
                
                DB::commit();
                return redirect()->back()->with('sukses','Produk berhasil ditambah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }else{
            DB::beginTransaction();
            try{
                $produk = new Produk();
                $produk->kode_pelaku_ekraf  = Auth::user()->kode_pelaku_ekraf;
                $produk->nama_produk   = $request->nama_produk;
                $produk->deskripsi     = $request->deskripsi;
                $produk->harga         = $request->harga;
                $produk->save();
                
                DB::commit();
                return redirect()->back()->with('sukses','Produk berhasil ditambah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }
    }

    public function update_produk(Request $request,$id)
    {
        $this->validate($request,[
            'nama_produk'=>'required',
            'deskripsi'=>'required',
            'harga'=>'required',
            'gambar'=>'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);
        $produk = Produk::where('uuid',$id)->firstOrFail();
        if ($request->hasFile('gambar')) {
            File::delete('images/produk/'.$produk->gambar);
            File::delete('images/produk/thumb/'.$produk->gambar);
            $foto = $request->file('gambar');
            $image_name1 = str_replace(' ', '_', $request->nama_produk).'_'.kode_acak(5).'.'.$foto->getClientOriginalExtension();
            // for save original image
            $ImageUpload = Image::make($foto);
            $ImageUpload->save(public_path('images/produk/'.$image_name1));

            // for save thumbnail image
            $ImageUpload->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
            $ImageUpload->save(public_path('images/produk/thumb/'.$image_name1));

            DB::beginTransaction();
            try{
                
                $produk->kode_pelaku_ekraf  = Auth::user()->kode_pelaku_ekraf;
                $produk->nama_produk   = $request->nama_produk;
                $produk->deskripsi     = $request->deskripsi;
                $produk->harga         = $request->harga;
                $produk->gambar        = $image_name1;
                $produk->save();
                
                DB::commit();
                return redirect('/pengguna/produk-usaha')->with('sukses','Produk berhasil ditambah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }else{
            DB::beginTransaction();
            try{
                $produk->kode_pelaku_ekraf  = Auth::user()->kode_pelaku_ekraf;
                $produk->nama_produk   = $request->nama_produk;
                $produk->deskripsi     = $request->deskripsi;
                $produk->harga         = $request->harga;
                $produk->save();
                
                DB::commit();
                return redirect('/pengguna/produk-usaha')->with('sukses','Produk berhasil ditambah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }
    }

    public function delete_produk($id){
        $produk = Produk::where('uuid',$id)->first();
            File::delete('images/produk/'.$produk->gambar);
            File::delete('images/produk/thumb/'.$produk->gambar);
        $produk->delete();
        return redirect('/pengguna/produk-usaha')->with('sukses','Data Berhasil dihapus');
    }
}
