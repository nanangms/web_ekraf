<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Role_menu;

class RolemenuController extends Controller
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
        return view('setting.role_menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Role_menu();
        return view('setting.role_menu.form', compact('model'));
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
            'role_id' => 'required',
            'menu_id' => 'required'
        ]);

        $model = Role_menu::create($request->all());
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
        $model = Role_menu::findOrFail($id);
        return view('setting.role_menu.form', compact('model'));
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
            'role_id' => 'required',
            'menu_id' => 'required'
        ]);

        $model = Role_menu::findOrFail($id);

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
        $model = Role_menu::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Role_menu::all();
        return DataTables::of($model)
        ->addColumn('action', function ($model) {
            return view('setting.role_menu._action', [
                'model' => $model,
                'url_edit' => route('role_menu.edit', $model->id),
                'url_destroy' => route('role_menu.destroy', $model->id)
            ]);
        })
        ->addColumn('nama_menu', function ($model) {
            return $model->menu->nama_menu;
        })
        ->addColumn('nama_role', function ($model) {
            return $model->role->nama_role;
        })
        ->addIndexColumn()
        ->rawColumns(['action','nama_role','nama_menu'])
        ->make(true);
    }
}
