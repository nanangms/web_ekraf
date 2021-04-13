<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelaku_ekraf;
use DB;
use DataTables;

class PelakuekrafController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        return view('pelaku_ekraf.index');
    }

    public function dataTable()
    {
        $pelaku = DB::table('pelaku_ekraf as a')
        ->select('a.nama_usaha',
        	'a.nama_pemilik',
        	'a.id as id_hasil',
        	'a.member',
        	'a.verifikasi',
        	'a.uuid',
        	'b.nama_kab_kota',
        	'c.nama_sektor',
        	'd.nama_badan_hukum',)
        ->leftjoin('kab_kota as b','a.kab_kota_id','b.id')
        ->leftjoin('sektor as c','a.sektor_id','c.id')
        ->leftjoin('badan_hukum as d','a.badan_hukum_id','d.id')
        ->orderBy('a.id','desc')->get();

        return DataTables::of($pelaku)
            ->addColumn('action', function ($pelaku) {
                $detail = '<a href="/pelaku_ekraf/'.$pelaku->uuid.'/detail" class="btn btn-info btn-xs" title="Detail Pelaku Ekraf"><i class="fa fa-eye"></i></a>';
                $hapus = '<button class="btn btn-danger btn-xs hapus" pelaku-name="'.$pelaku->nama_usaha.'" pelaku-id="'.$pelaku->uuid.'" title="Hapus"><i class="fas fa-trash-alt"></i></button>';
                if(auth()->user()->role_id == '1'){
                    return $detail.' '.$hapus;
                }else{
                    return $detail;
                }
                
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function detail_pelaku_ekraf($id){
        $pelaku = DB::table('pelaku_ekraf as a')
        ->select('a.*',
            'a.id as id_daftar',
            'b.nama_kab_kota',
            'c.nama_sektor','d.nama_badan_hukum')
        ->leftjoin('kab_kota as b','a.kab_kota_id','b.id')
        ->leftjoin('sektor as c','a.sektor_id','c.id')
        ->leftjoin('badan_hukum as d','a.badan_hukum_id','d.id')
        ->where('a.uuid',$id)
        ->orderBy('a.id','desc')->first();
        return view('pelaku_ekraf.detail',compact(['pelaku']));
    }
}
