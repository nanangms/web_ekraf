<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Video;

class VideoController extends Controller
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
        return view('galeri.video.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Video();
        return view('galeri.video.form', compact('model'));
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
            'judul' => 'required',
            'link_video' => 'required'
        ]);

        $model = Video::create($request->all());
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
        $model = Video::findOrFail($id);
        return view('galeri.video.form', compact('model'));
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
            'judul' => 'required',
            'link_video' => 'required',
            'published' => 'required'
        ]);

        $model = Video::findOrFail($id);

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
        $model = Video::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Video::query();
        return DataTables::of($model)
        ->addColumn('link_video',function($video){
            return '<a href="'.$video->link_video.'" target="_blank">'.$video->link_video.'</a>';
        })
        ->addColumn('publish',function($video){
            if($video->published == 'Y'){
                return '<span class="badge badge-success">Aktif</span>';
            }else{
               return '<span class="badge badge-danger">Tidak Aktif</span>'; 
            }
        })
        ->addColumn('action', function ($model) {
            return view('galeri.video._action', [
                'model' => $model,
                'url_edit' => route('video.edit', $model->id),
                'url_destroy' => route('video.destroy', $model->id)
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action','link_video','publish'])
        ->make(true);
    }
}
