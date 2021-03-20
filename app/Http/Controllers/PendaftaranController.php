<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Kabupatenkota;
use App\Models\Badanhukum;
use App\Models\Sektor;
use App\Models\User;
use DB;
use DataTables;
use Illuminate\Support\Facades\Hash;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        return view('pendaftaran.index');
    }
    public function form_pendaftaran()
    {
        $kab = Kabupatenkota::select('kab_kota.id','kab_kota.nama_kab_kota')->get();
        $badan = Badanhukum::select('badan_hukum.id','badan_hukum.nama_badan_hukum')->get();
        $sektor = Sektor::select('sektor.id','sektor.nama_sektor')->get();
        return view('pendaftaran-ekraf',compact(['kab','badan','sektor']));
    }

    public function dataTable()
    {
        $pelaku = DB::table('pendaftaran as a')
        ->select('a.nama_usaha',
        	'a.nama_lengkap',
            'a.no_ktp',
        	'a.id as id_daftar',
        	'a.verifikasi',
        	'a.uuid',
        	'b.nama_kab_kota',
        	'c.nama_sektor',
            'd.nama_badan_hukum')
        ->leftjoin('kab_kota as b','a.kab_kota_id','b.id')
        ->leftjoin('sektor as c','a.sektor_id','c.id')
        ->leftjoin('badan_hukum as d','a.badan_hukum_id','d.id')
        ->orderBy('a.id','desc')->get();

        return DataTables::of($pelaku)
            ->addColumn('action', function ($pelaku) {
                return '<button data-toggle="modal" data-target-id="'.$pelaku->uuid.'" data-target="#ShowPendaftaran" class="btn btn-info btn-xs" title="Detail Pendaftaran"><i class="fa fa-eye"></i></button>';
            })
            ->addColumn('nama_ktp', function ($pelaku) {
                return $pelaku->nama_lengkap.'<br>'.$pelaku->no_ktp;
            })
            ->addColumn('verification', function ($pelaku) {
                if($pelaku->verifikasi == 'N'){
                    return '<span class="badge badge-danger">Belum diverifikasi</span>';
                }else{
                    return '<span class="badge badge-success">Diverifikasi</span>';
                }
            })
            ->addIndexColumn()
            ->rawColumns(['action','nama_ktp','verification'])
            ->make(true);
    }

    public function pendaftaran_berhasil()
    {
        return view('pendaftaran.berhasil');
    }

    public function submit_pendaftaran(Request $request)
    {

        //dd($request);
        $this->validate($request,[
            'kode_pelaku_ekraf'=>'required',
            'kab_kota_id'=>'required',
            'sektor_id'=>'required',
            'nama_lengkap'=>'required',
            'no_ktp'=>'required',
            'alamat_domisili'=>'required',
            'no_hp'=>'required',

            'email'=>'required',
            'password'=>'required',
            'konfirmasi_password'=>'required',
            'nama_usaha'=>'required',

            'jenis_usaha'=>'required',
            //'hasil_barang'=>'required',
            //'sifat_produk'=>'required',
            //'dibina'=>'required',
            // 'binaan'=>'required',
            //'sifat_freelance'=>'required',
            //'ada_sertifikat'=>'required',
            //'ada_komunitas'=>'required',
            // 'nama_komunitas'=>'required',

            'mulai_usaha'=>'required',
            'jml_karyawan'=>'required',
            'alamat_usaha'=>'required',
            'ada_legalitas'=>'required',
            // 'nama_legalitas'=>'required',
            'badan_hukum_id'=>'required',
            'sistem_penjualan'=>'required',
            'media_online'=>'required',
            'sosmed'=>'required'
        ]);

        $data = Pendaftaran::where('no_ktp', trim($request->no_ktp))->exists();
        $email = Pendaftaran::where('email', trim($request->email))->exists();
        if($data){ 
            return redirect()->back()->with('info','Data NIK sudah terdaftar');
        }
        if($email){ 
            return redirect()->back()->with('info','Email sudah terdaftar');
        }


        DB::beginTransaction();
        try{
            $pendaftaran = new \App\Models\Pendaftaran;
            $pendaftaran->kode_pelaku_ekraf = $request->kode_pelaku_ekraf;
            $pendaftaran->kab_kota_id = $request->kab_kota_id;
            $pendaftaran->sektor_id = $request->sektor_id;
            $pendaftaran->nama_lengkap = $request->nama_lengkap;
            $pendaftaran->no_ktp = $request->no_ktp;
            $pendaftaran->alamat_domisili = $request->alamat_domisili;
            $pendaftaran->no_hp = $request->no_hp;
            $pendaftaran->email = $request->email;
            $pendaftaran->nama_usaha = $request->nama_usaha;
            $pendaftaran->jenis_usaha = $request->jenis_usaha;

            $pendaftaran->hasil_barang = $request->hasil_barang;
            $pendaftaran->sifat_produk = $request->sifat_produk;
            $pendaftaran->dibina = $request->dibina;
            $pendaftaran->binaan = $request->binaan;
            $pendaftaran->sifat_freelance = $request->sifat_freelance;
            $pendaftaran->ada_sertifikat = $request->ada_sertifikat;
            $pendaftaran->ada_komunitas = $request->ada_komunitas;
            $pendaftaran->nama_komunitas = $request->nama_komunitas;
            $pendaftaran->mulai_usaha = $request->mulai_usaha;
            $pendaftaran->jml_karyawan = $request->jml_karyawan;

            $pendaftaran->alamat_usaha = $request->alamat_usaha;
            $pendaftaran->ada_legalitas = $request->ada_legalitas;
            $pendaftaran->nama_legalitas = $request->nama_legalitas;
            $pendaftaran->badan_hukum_id = $request->badan_hukum_id;
            $pendaftaran->sistem_penjualan = implode(",",$request->sistem_penjualan);
            $pendaftaran->media_online = implode(",",$request->media_online);
            $pendaftaran->sosmed = implode(",",$request->sosmed);
            $pendaftaran->verifikasi = 'N';
            $pendaftaran->save();

            $user = new \App\Models\User;
            $user->kode_pelaku_ekraf    = $request->kode_pelaku_ekraf;
            $user->name                 = $request->nama_lengkap;
            $user->email                = $request->email;
            $user->password             = Hash::make($request->konfirmasi_password);
            $user->role_id              = '3';
            $user->is_active            = 'N';
            $user->verifikasi           = 'N';
            $user->save();


            DB::commit();
            return redirect('/pendaftaran-berhasil')->with('sukses','Pendaftaran berhasil');
        }catch (\Exception $e){
            dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal','Data Gagal Diinput');
        }
    }

    public function detail_pendaftaran($id){
        $pendaftaran = DB::table('pendaftaran as a')
        ->select('a.*',
            'a.id as id_daftar',
            'b.nama_kab_kota',
            'c.nama_sektor','d.nama_badan_hukum')
        ->leftjoin('kab_kota as b','a.kab_kota_id','b.id')
        ->leftjoin('sektor as c','a.sektor_id','c.id')
        ->leftjoin('badan_hukum as d','a.badan_hukum_id','d.id')
        ->where('a.uuid',$id)
        ->orderBy('a.id','desc')->first();
        return view('pendaftaran.detail_pendaftaran',compact(['pendaftaran']));
    }

    public function verifikasi_pendaftaran($id){
        $pendaftaran = Pendaftaran::where('uuid',$id)->first();

        DB::beginTransaction();
        try{

            $pendaftaran->verifikasi = 'Y';
            $pendaftaran->update();

            $pelaku = new \App\Models\Pelaku_ekraf;
            $pelaku->kode_pelaku_ekraf  = $pendaftaran->kode_pelaku_ekraf;
            $pelaku->kab_kota_id        = $pendaftaran->kab_kota_id;
            $pelaku->sektor_id          = $pendaftaran->sektor_id;
            $pelaku->badan_hukum_id     = $pendaftaran->badan_hukum_id;
            $pelaku->nama_usaha         = $pendaftaran->nama_usaha;
            $pelaku->mulai_usaha        = $pendaftaran->mulai_usaha;
            $pelaku->alamat_usaha       = $pendaftaran->alamat_usaha;
            $pelaku->nama_pemilik       = $pendaftaran->nama_lengkap;
            $pelaku->nik_pemilik        = $pendaftaran->no_ktp;
            $pelaku->email_pemilik      = $pendaftaran->email;
            $pelaku->wa_pemilik         = $pendaftaran->no_hp;
            $pelaku->member             = 'Reguler';
            $pelaku->save();


            $user = User::where('kode_pelaku_ekraf',$pendaftaran->kode_pelaku_ekraf)->first();
            $user->is_active            = 'Y';
            $user->verifikasi           = 'Y';
            $user->save();

            \Mail::to('nanang.ms22@gmail.com')->send(new \App\Mail\PostMail($pendaftaran->kode_pelaku_ekraf, $pendaftaran->nama_lengkap));

            DB::commit();
            return redirect('/pendaftaran')->with('sukses','Pendaftaran berhasil diverifikasi');
        }catch (\Exception $e){
            dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal','Data Gagal Diverifikasi');
        }
    }
}
