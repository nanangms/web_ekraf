<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Badanhukum;

class BadanhukumController extends Controller
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
        return view('data-master.badan_hukum.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Badanhukum();
        return view('data-master.badan_hukum.form', compact('model'));
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
            'nama_badan_hukum' => 'required'
        ]);

        $model = Badanhukum::create($request->all());
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
        $model = Badanhukum::findOrFail($id);
        return view('data-master.badan_hukum.form', compact('model'));
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
            'nama_badan_hukum' => 'required'
        ]);

        $model = Badanhukum::where('id',$id)->first();
		$model->nama_badan_hukum      = $request->nama_badan_hukum;
        $model->update();

        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Badanhukum::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Badanhukum::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('data-master.badan_hukum._action', [
                    'model' => $model,
                    'url_edit' => route('badanhukum.edit', $model->id),
                    'url_destroy' => route('badanhukum.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
