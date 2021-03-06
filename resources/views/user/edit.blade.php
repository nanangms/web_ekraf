<div class="row">
  <div class="col-md-12 col-sm-6">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Ganti Password</a>
          </li>
         
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
             <form action="/user/{{$user->uuid}}/update" class="form-horizontal" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group row {{$errors->has('name') ? ' has-error':''}}">
                        <label class="label-text col-lg-3 col-form-label text-md-right">Nama</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                            @if($errors->has('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    
                    
                    <div class="form-group row {{$errors->has('email') ? ' has-error':''}}">
                        <label class="label-text col-lg-3 col-form-label text-md-right">Email</label>
                        <div class="col-lg-9">
                            <input type="email" class="form-control" name="email" value="{{$user->email}}"/>
                            @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>
                    
                    
                    <div class="form-group row {{$errors->has('role') ? ' has-error':''}}">
                        <label class="label-text col-lg-3 col-form-label text-md-right">Hak Akses</label>
                        <div class="col-lg-9">  
                            <select name="role_id" class="form-control">
                            <option value="">--Pilih--</option>
                                <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                @foreach($role as $list)
                            <option value="{{$list->id}}" @if($user->role_id == $list->id) selected @endif>{{$list->nama_role}}</option>
                        @endforeach
                            </select>
                            @if($errors->has('role'))
                                <span class="help-block">{{$errors->first('role')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{$errors->has('password') ? ' has-error':''}}">
                        <label class="label-text col-lg-3 col-form-label text-md-right">Status</label>
                            <div class="col-lg-9">                                         
                            <select name="is_active" class="form-control">
                            <option value="">--Pilih--</option>
                                <option value="Y" @if($user->is_active == 'Y') selected @endif>Aktif</option>
                                <option value="N" @if($user->is_active == 'N') selected @endif>Non Aktif</option>
                            </select>
                            @if($errors->has('role'))
                                <span class="help-block">{{$errors->first('role')}}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="label-text col-lg-3 col-form-label text-md-right"></label>
                        <div class="col-lg-9">                                            
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                    
                    </form>
          </div>
          <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
            <form action="/user/{{encrypt($user->id)}}/ganti_password" method="post">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('password') ? ' has-error':''}}">
                        <label class="label-text">Password Baru</label>                              
                            <input type="password" class="form-control" name="password" required/>
                            @if($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                    </div>
                    
                    <div class="form-group {{$errors->has('password_baru') ? ' has-error':''}}">
                        <label class="label-text">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" required/>
                            @if($errors->has('password_baru'))
                                <span class="text-danger">{{$errors->first('password_baru')}}</span>
                            @endif
                        
                    </div>
                    <div class="form-group">                                       
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ubah</button>
                    </div>
            </form>
          </div>
          
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>