<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Produk;
use Jenssegers\Date\Date;
use DB;
use File;

class ProdukController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        return view('produk.index');
    }

    public function delete($id){

        $produk = Produk::where('uuid',$id)->firstOrFail();
        $produk->delete();
        File::delete('images/produk/'.$produk->gambar);   
        File::delete('images/produk/thumb/'.$produk->gambar);            
    }

    public function detail($id){
        $produk = Produk::
        select('produk.*',
            'b.nama_usaha')
        ->leftjoin('pelaku_ekraf as b','produk.pelaku_ekraf_id','b.id')
        ->where('produk.uuid',$id)
        ->orderBy('produk.id','desc')->first();
        return view('produk.detail',compact(['produk']));
    }

    public function dataTable()
    {
        Date::setLocale('id');
        $model = Produk::query();
        return DataTables::of($model)
        ->addColumn('nama_usaha',function($produk){
            return $produk->pelaku_ekraf->nama_usaha;
        })
        ->addColumn('harga',function($produk){
            return 'Rp. '.number_format($produk->harga).'';
        })
        ->addColumn('gambar', function ($produk) {
            return '<a href="'.$produk->getImageProduk().'" target="_blank"><img src="'.$produk->getImageProduk().'" width="100px"></a>';
        })
        ->addColumn('action', function ($produk) {
            return '<button data-toggle="modal" data-target-id="'.$produk->uuid.'" data-target="#ShowProduk" class="btn btn-info btn-xs" title="Detail Produk Pelaku Ekraf"><i class="fa fa-eye"></i></button> <button class="btn btn-danger btn-xs hapus" produk-name="'.$produk->nama_produk.'" produk-id="'.$produk->uuid.'" title="Hapus"><i class="fas fa-trash-alt"></i></button>';
        })
        ->addIndexColumn()
        ->rawColumns(['action','tgl_produk','publish','nama_usaha','gambar','harga'])
        ->make(true);
    }
}
