<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\Role;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('checkRole:Super Admin');
    }
    
    public function index()
    {
    	if(auth()->user()->role->nama_role == "Super Admin"){
          $role = Role::select('role.id','role.nama_role')->get();
        }else{
          $role = Role::select('role.id','role.nama_role')->whereIn('id', array(2,3))->get();
        }
    	
        return view('user.index',compact(['role']));
    }

    public function dataTable()
    {
        if(auth()->user()->role->nama_role == "Super Admin"){
          $user = User::select('users.*')->with('role')->orderby('id','desc')->get();
        }else{
          $user = User::select('users.*')->with('role')->whereIn('role_id', array(2,3))->orderby('id','desc')->get();  
        }
        
        return DataTables::of($user)
            ->addColumn('action', function ($user) {
                return '<button data-toggle="modal" data-target-id="'.$user->uuid.'" data-target="#ShowEDIT" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm hapus" user-name="'.$user->name.'" user-id="'.$user->uuid.'" title="Delete"><i class="fa fa-trash"></i></button>';
            })
            ->addColumn('nama_role', function ($user) {
             
                    return $user->role->nama_role;
               
            })

            ->addColumn('nama', function ($user) {
                return '<img src="'.$user->getAvatarProfil().'" alt="avatar" style="object-fit: cover; position: relative; width: 40px; height: 40px; overflow: hidden; border-radius: 50%;"> | '.$user->name;
            })
            ->addColumn('status', function ($user) {
                if($user->aktif == 'Y'){
                    return '<span class="label label-success">Aktif</span>';
                }else{
                    return '<span class="label label-danger">Non Aktif</span>';
                }
                
            })
            
            ->addIndexColumn()
            ->rawColumns(['action','nama_role','status','nama','opd'])
            ->make(true);
    }

    public function add_user(Request $request){
        //dd($request);
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'role_id'=>'required',
            'is_active'=>'required'
        ]);

        DB::beginTransaction();
        try{
            $user = new \App\Models\User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;
            $user->is_active = $request->is_active;
            $user->save();
            DB::commit();
            return redirect('/user')->with('sukses','User berhasil Disimpan');
        }catch (\Exception $e){
        	//dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal','Data Gagal Diinput');
        }
    }

    public function delete($id){
    	$user = User::where('uuid',$id)->first();
        $user->delete();
        return redirect('/user')->with('sukses','Data Berhasil dihapus');
    }

    public function edit($id){
    	if(auth()->user()->role->nama_role == "Super Admin"){
          $role = Role::select('role.id','role.nama_role')->get();
        }else{
          $role = Role::select('role.id','role.nama_role')->whereIn('id', array(2,3))->get();
        }
    	$user = User::where('uuid',$id)->first();
        return view('user.edit',compact(['role','user']));
    }

    public function update(Request $request,$id){
        $user = User::where('uuid',$id)->first();

        
            DB::beginTransaction();
            try{
                $user->name        = $request->name;
                $user->email       = $request->email;
                $user->role_id 	   = $request->role_id;
            	$user->is_active   = $request->is_active;
                $user->save();

                DB::commit();
                return redirect('/user')->with('sukses','Data Berhasil diupdate');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->with('gagal','Data Gagal Diinput');
            }
        
    }
}
