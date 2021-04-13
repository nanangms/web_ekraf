<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pelaku_ekraf;
use App\Models\Kabupatenkota;
use App\Models\Badanhukum;
use App\Models\Sektor;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class LaporanController extends Controller
{
    public function index()
    {
        $kab = Kabupatenkota::select('kab_kota.id','kab_kota.nama_kab_kota')->get();
        $sektor = Sektor::select('sektor.id','sektor.nama_sektor')->get();
        return view('laporan.index',compact('kab','sektor'));
    }

    public function hasil_filter(Request $request)
    {
        $kab = Kabupatenkota::select('kab_kota.id','kab_kota.nama_kab_kota')->get();
        $sektor = Sektor::select('sektor.id','sektor.nama_sektor')->get();

    	$sektor_id     = $request->sektor_id;
        $kab_kota_id   = $request->kab_kota_id;

    	$hasil = DB::table('pelaku_ekraf as a')
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
        ->where('a.sektor_id','like','%'.$sektor_id.'%')
        ->where('a.kab_kota_id','like','%'.$kab_kota_id.'%')
        ->get();
        return view('laporan.hasil_filter',compact(['hasil','sektor_id','kab_kota_id','kab','sektor']));
    }

    public function exportLaporan(Request $request) 
    {
        $sektor_id     = $request->sektor_id;
        $kab_kota_id   = $request->kab_kota_id;

        return Excel::download(new LaporanExport($sektor_id,$kab_kota_id), 'Laporan Pelaku Ekraf.xlsx');
    }
}
