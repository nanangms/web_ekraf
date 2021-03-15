<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Album;

class AlbumController extends Controller
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
        return view('galeri.album.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Album();
        return view('galeri.album.form', compact('model'));
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
            'nama_album' => 'required'
        ]);

        $model = Album::create($request->all());
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
        $model = Album::findOrFail($id);
        return view('galeri.album.form', compact('model'));
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
            'nama_album' => 'required'
        ]);

        $model = Album::findOrFail($id);

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
        $model = Album::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Album::query();
        return DataTables::of($model)
            ->addColumn('publish',function($event){
                if($event->published == 'Y'){
                    return '<span class="badge badge-success">Aktif</span>';
                }else{
                   return '<span class="badge badge-danger">Tidak Aktif</span>'; 
                }
            })
            ->addColumn('jml_foto', function ($model) {
                $jml = Album::join('foto','album.id','=','foto.album_id')->where('album.id',$model->id)->count();
                return '<a href="/galeri/foto/'.$model->id.'" class="btn btn-info btn-sm">'.$jml.'</a>';
            })
            ->addColumn('action', function ($model) {
                return view('galeri.album._action', [
                    'model' => $model,
                    'url_edit' => route('album.edit', $model->id),
                    'url_destroy' => route('album.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action','publish','jml_foto'])
            ->make(true);
    }
}
