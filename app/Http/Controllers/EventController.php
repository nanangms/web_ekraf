<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Event;
use Jenssegers\Date\Date;
use DB;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class EventController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event.index');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_event' => 'required',
            'tgl_event' => 'required',
            'lokasi' => 'required'
        ]);

        if ($request->hasFile('foto_banner')) {
            $foto = $request->file('foto_banner');
            $image_name1 = str_replace(' ', '_', $request->nama_event).'_'.kode_acak(5).'.'.$foto->getClientOriginalExtension();
            // for save original image
            $ImageUpload = Image::make($foto);
            $ImageUpload->save('images/event/'.$image_name1);

            // for save thumbnail image
            $ImageUpload->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
            $ImageUpload->save('images/event/thumb/'.$image_name1);

            DB::beginTransaction();
            try{
                $event = new \App\Models\Event;
                $event->foto_banner = $image_name1;     
                $event->nama_event  = $request->nama_event;
                $event->published   = $request->published;
                $event->lokasi      = $request->lokasi;  
                $event->deskripsi   = $request->deskripsi;  
                $event->tgl_event   = $request->tgl_event;   
                $event->save();
                
                DB::commit();
                return redirect('/event')->with('sukses','Data berhasil ditambah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }else{
            DB::beginTransaction();
            try{
                $event = new \App\Models\Event;
                $event->nama_event  = $request->nama_event;
                $event->published   = $request->published;
                $event->lokasi      = $request->lokasi;  
                $event->deskripsi   = $request->deskripsi;  
                $event->tgl_event   = $request->tgl_event;   
                $event->save();
                
                DB::commit();
                return redirect('/event')->with('sukses','Data berhasil ditambah');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::where('uuid',$id)->firstOrFail();
        return view('event.edit',compact(['event']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_event' => 'required',
            'tgl_event' => 'required',
            'lokasi' => 'required'
        ]);

        $event = Event::where('uuid',$id)->firstOrFail();

        if ($request->hasFile('foto_banner')) {
            File::delete('images/event/'.$event->foto_banner);   
            File::delete('images/event/thumb/'.$event->foto_banner);
            $foto = $request->file('foto_banner');
            $image_name1 = str_replace(' ', '_', $request->nama_event).'_'.kode_acak(5).'.'.$foto->getClientOriginalExtension();
            // for save original image
            $ImageUpload = Image::make($foto);
            $ImageUpload->save('images/event/'.$image_name1);

            // for save thumbnail image
            $ImageUpload->resize(500, null, function ($constraint) {$constraint->aspectRatio(); });
            $ImageUpload->save('images/event/thumb/'.$image_name1);

            DB::beginTransaction();
            try{
                $event->foto_banner = $image_name1;     
                $event->nama_event  = $request->nama_event;
                $event->published   = $request->published;
                $event->lokasi      = $request->lokasi;  
                $event->deskripsi   = $request->deskripsi;  
                $event->tgl_event   = $request->tgl_event;   
                $event->save();
                
                DB::commit();
                return redirect('/event')->with('sukses','Data berhasil di simpan');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Disimpan');
            }
        }else{
            DB::beginTransaction();
            try{
                $event->nama_event  = $request->nama_event;
                $event->published   = $request->published;
                $event->lokasi      = $request->lokasi;  
                $event->deskripsi   = $request->deskripsi;  
                $event->tgl_event   = $request->tgl_event;   
                $event->save();
                
                DB::commit();
                return redirect('/event')->with('sukses','Data berhasil disimpan');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal disimpan');
            }
        }

    }

    public function delete($id){

        $event = Event::where('uuid',$id)->firstOrFail();
        $event->delete();
        File::delete('images/event/'.$event->foto_banner);   
        File::delete('images/event/thumb/'.$event->foto_banner);            
    }

    public function dataTable()
    {
        Date::setLocale('id');
        $model = Event::query();
        return DataTables::of($model)
        ->addColumn('foto_banner', function ($event) {
            return '<a href="'.$event->getImageEvent().'" target="_blank"><img src="'.$event->getImageEvent().'" width="100px"></a>';
        })
        ->addColumn('tgl_event',function($event){
            return Date::parse($event->tgl_event)->format('j F Y');
        })
        ->addColumn('publish',function($event){
            if($event->published == 'Y'){
                return '<span class="badge badge-success">Aktif</span>';
            }else{
             return '<span class="badge badge-danger">Tidak Aktif</span>'; 
         }
     })
        ->addColumn('action', function ($event) {
            return '<a href="/event/'.$event->uuid.'/edit" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a> <button class="btn btn-danger btn-xs hapus" event-name="'.$event->judul.'" event-id="'.$event->uuid.'" title="Hapus"><i class="fas fa-trash-alt"></i></button>';
        })
        ->addIndexColumn()
        ->rawColumns(['action','tgl_event','publish','foto_banner'])
        ->make(true);
    }
}
