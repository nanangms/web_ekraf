<?php

namespace App\Exports;

use App\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Jenssegers\Date\Date;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class LaporanExport implements FromView, ShouldAutoSize, WithEvents
{
    use Exportable;
    public function __construct($sektor_id,$kab_kota_id){
        $this->sektor_id = $sektor_id;
        $this->kab_kota_id = $kab_kota_id;
    }

    public function view(): View
    {
        $sektor_id = $this->sektor_id;
        $kab_kota_id = $this->kab_kota_id;
        return view('laporan.excel',[
            'data' => DB::table('pelaku_ekraf as a')
        ->select('a.*',
            'b.nama_kab_kota',
            'c.nama_sektor',
            'd.nama_badan_hukum',
            'e.jenis_usaha')
        ->leftjoin('kab_kota as b','a.kab_kota_id','b.id')
        ->leftjoin('sektor as c','a.sektor_id','c.id')
        ->leftjoin('badan_hukum as d','a.badan_hukum_id','d.id')
        ->leftjoin('pendaftaran as e','a.kode_pelaku_ekraf','e.kode_pelaku_ekraf')
        ->where('a.sektor_id','like','%'.$sektor_id.'%')
        ->where('a.kab_kota_id','like','%'.$kab_kota_id.'%')
        ->get()
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
