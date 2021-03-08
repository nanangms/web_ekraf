<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Event;
use Jenssegers\Date\Date;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Event();
        return view('event.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_event' => 'required',
            'tgl_event' => 'required',
            'lokasi' => 'required'
        ]);

        $model = Event::create($request->all());
        return $model;
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
        $model = Event::findOrFail($id);
        return view('event.form', compact('model'));
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

        $model = Event::findOrFail($id);

        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Event::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        Date::setLocale('id');
        $model = Event::query();
        return DataTables::of($model)
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
        ->addColumn('action', function ($model) {
            return view('event._action', [
                'model' => $model,
                'url_edit' => route('event.edit', $model->id),
                'url_destroy' => route('event.destroy', $model->id)
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action','tgl_event','publish'])
        ->make(true);
    }
}
