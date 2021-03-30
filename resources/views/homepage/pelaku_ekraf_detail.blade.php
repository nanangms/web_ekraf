@extends('homepage.layouts.app')

@section('title')
Profil Pelaku Ekraf : {{$pelaku_ekraf->nama_usaha}} | EKRAF Jambi
@endsection

@section('content')
<div class="sidebar-enabled sidebar-end mt-7">
	<div class="container">
	  <div class="row">
	    <div class="col-lg-9 content pt-4 pt-lg-3 mb-2 mb-sm-0 pb-sm-5">
	      	<!-- Content-->
          	<div class="d-sm-flex align-items-center justify-content-between pb-4 text-center text-sm-start">
	         	<h1 class="h3 mb-2 text-nowrap">{{$pelaku_ekraf->nama_usaha}}</h1>
	         	<!-- Nav tabs -->
				<ul class="nav nav-tabs mt-4" role="tablist" style="font-size: 1rem">
				  <li class="nav-item">
				    <a href="#profil_usaha" class="nav-link active" data-bs-toggle="tab" role="tab">
				      Profil usaha
				    </a>
				  </li>
				  <li class="nav-item">
				    <a href="#profil_pemilik" class="nav-link" data-bs-toggle="tab" role="tab">
				      Profil pemilik usaha
				    </a>
				  </li>
				  
				</ul>
	        </div>
	        <div class="row mb-3">
	        	<div class="col-lg-5">
	        		<div class="member-image rounded-3 shadow-lg mb-4" style="overflow: hidden">
				  	  @if($pelaku_ekraf->foto_usaha != Null)
    					<img src="{{ asset('images/foto_usaha/'.$pelaku_ekraf->foto_usaha) }}"/>
					  @else
						<img src="{{ asset('images/default_placeholder.jpg') }}"/>
					  @endif
				  	</div>
	        	</div>
	        	<div class="col-lg-7">
	        		<!-- Tabs content -->
					<div class="tab-content">
					  <div class="tab-pane fade show active" id="profil_usaha" role="tabpanel">
					    <table class="table" width="100%" style="vertical-align: middle;">
		                  	<tr>
		                  		<td width="47%">Nama Usaha/Perusahaan</td>
		                  		<td width="3%">:</td>
		                  		<td>{{$pelaku_ekraf->nama_usaha}}</td>
		                  	</tr>
		                  	<tr>
		                  		<td>Sektor Usaha</td>
		                  		<td>:</td>
		                  		<td>{{$pelaku_ekraf->nama_sektor}}</td>
		                  	</tr>
		                  	<tr>
		                  		<td>Kota/Kabupaten</td>
		                  		<td>:</td>
		                  		<td>{{$pelaku_ekraf->nama_kab_kota}}</td>
		                  	</tr>
		                  	<tr>
		                  		<td>Bentuk Usaha/Perusahaan</td>
		                  		<td>:</td>
		                  		<td>{{$pelaku_ekraf->nama_badan_hukum}}</td>
		                  	</tr>
		                  	<tr>
		                  		<td>Tanggal Berdiri Usaha</td>
		                  		<td>:</td>
		                  		<td>{{TanggalAja($pelaku_ekraf->mulai_usaha)}}</td>
		                  	</tr>
		                </table>
					  </div>
					  <div class="tab-pane fade mt-4 mt-lg-0" id="profil_pemilik" role="tabpanel">
					    <div class="d-block d-sm-flex align-items-center text-center text-sm-start border-bottom pb-3 mb-3">
					    	@if($pelaku_ekraf->foto_pemilik != Null)
		    					<div class="d-block rounded-3 mx-sm-0 mx-auto mb-3 mb-sm-0 bg-size-cover bg-position-center" style="background-image: url({{ asset('images/foto_pemilik/thumb/'.$pelaku_ekraf->foto_pemilik) }}); width: 100px; height: 100px">
					    		</div>
							@else
								<div class="d-block shadow-3 rounded-3 mx-sm-0 mx-auto mb-3 mb-sm-0 bg-size-cover bg-position-center" style="background-image: url({{ asset('images/foto_pemilik/default.jpg') }}); width: 100px; height: 100px">
					    		</div>
							@endif
		                    <div class="ps-0 ps-lg-3">
		                      <h5 class="nav-heading mb-1">{{$pelaku_ekraf->nama_pemilik}}</h5>
		                      <div class="fs-md text-muted mb-2 pb-1">{{$pelaku_ekraf->email_pemilik}}</div>
		                      <span class="badge bg-primary p-2">{{$pelaku_ekraf->member}}</span>
		                    </div>
		                </div>
		                <div>
		                	<table class="table" width="100%" style="vertical-align: middle;">
		                		<tr>
		                			<td width="32%">No. Telpon / WA</td>
		                			<td width="3%">:</td>
		                			<td>{{$pelaku_ekraf->wa_pemilik}}</td>
		                		</tr>
		                		<tr>
		                			<td>Media sosial</td>
		                			<td>:</td>
		                			<td>
		                				<div>
											<a href="#" class="btn-social bs-facebook">
											  <i class="fab fa-facebook-f"></i>
											</a>

											<a href="#" class="btn-social bs-twitter">
											  <i class="fab fa-twitter"></i>
											</a>

											<a href="#" class="btn-social bs-instagram">
											  <i class="fab fa-instagram"></i>
											</a>

											<a href="#" class="btn-social bs-telegram">
											  <i class="fab fa-telegram"></i>
											</a>

											<a href="#" class="btn-social bs-linkedin">
											  <i class="fab fa-linkedin"></i>
											</a>
					                    </div>
					                </td>
		                		</tr>
		                	</table>
		                </div>
					  </div>
					</div>
	        		
	        	</div>
	        </div>

	        <div class="mb-4 pb-3 border-bottom">
	        	<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				  <li class="nav-item">
				    <a href="#deskripsi" class="nav-link active" data-bs-toggle="tab" role="tab">
				      Deskripsi
				    </a>
				  </li>
				  <li class="nav-item">
				    <a href="#keahlian" class="nav-link" data-bs-toggle="tab" role="tab">
				      Keahlian
				    </a>
				  </li>
				  <li class="nav-item">
				    <a href="#pengalaman" class="nav-link" data-bs-toggle="tab" role="tab">
				      Pengalaman
				    </a>
				  </li>
				  <li class="nav-item">
				    <a href="#portofolio" class="nav-link" data-bs-toggle="tab" role="tab">
				      Portofolio
				    </a>
				  </li>
				</ul>

				<!-- Tabs content -->
				<div class="tab-content">
				  <div class="tab-pane fade show active" id="deskripsi" role="tabpanel">
				    <p>{{$pelaku_ekraf->deskripsi}}</p>
				  </div>
				  <div class="tab-pane fade" id="keahlian" role="tabpanel">
				    <p>{{$pelaku_ekraf->keahlian}}</p>
				  </div>
				  <div class="tab-pane fade" id="pengalaman" role="tabpanel">
				    <p>{{$pelaku_ekraf->pengalaman}}</p>
				  </div>
				  <div class="tab-pane fade" id="portofolio" role="tabpanel">
				    <p>{{$pelaku_ekraf->portofolio}}</p>
				  </div>
				</div>
	        </div>

	        <div>
	        	<h5 class="text-nowrap mb-4 me-3">Kontak</h5>
	        </div>
	    </div>

	    <!-- Sidebar-->
	    <div class="sidebar col-lg-3 pt-lg-5">
	      <div class="offcanvas offcanvas-end offcanvas-collapse" id="blog-sidebar">
	        <div class="offcanvas-cap navbar-shadow px-4 mb-3">
	          <h5 class="mt-1 mb-0">Sidebar</h5>
	          <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	        </div>
	        <div class="offcanvas-body px-4 pt-3 pt-lg-0 pe-lg-0 ps-lg-2 ps-xl-4" data-simplebar>
	        	<h3 class="widget-title">Cari pelaku ekraf</h3>
	        	<form>
		  			<div class="mb-3 pb-1 w-100 mb-sm-4 me-sm-3">
			          <label class="form-label" for="from-destination">Pelaku Ekraf</label>
			          <div class="input-group">
			          	<input type="text" class="form-control" name="" placeholder="Nama usaha/pemilik usaha">
			          </div>
			      </div>
			      <div class="mb-3 pb-1 w-100 mb-sm-4 me-sm-3">
			          <label class="form-label" for="to-destination">Wilayah</label>
			          <select class="form-select" id="to-destination">
			            <option value="" selected disabled hidden>Kabupaten/Kota</option>
			            <option value="Kota Jambi">Kota Jambi</option>
			            <option value="Kota Sungai Penuh">Kota Sungai Penuh</option>
			            <option value="Kabupaten Batanghari">Kabupaten Batanghari</option>
			            <option value="Kabupaten Bungo">Kabupaten Bungo</option>
			            <option value="Kabupaten Kerinci">Kabupaten Kerinci</option>
			            <option value="Kabupaten Merangin">Kabupaten Merangin</option>
			            <option value="Kabupaten Muaro Jambi">Kabupaten Muaro Jambi</option>
			            <option value="Kabupaten Sarolangun">Kabupaten Sarolangun</option>
			            <option value="Kabupaten Tanjung Jabung Timur">Kabupaten Tanjung Jabung Timur</option>
			            <option value="Kabupaten Tanung Jabung Barat">Kabupaten Tanung Jabung Barat</option>
			            <option value="Kabupaten Tebo">Kabupaten Tebo</option>
			          </select>
			        </div>
			        <div class="mb-3 pb-1 w-100 mb-sm-4 me-sm-3">
			          <label class="form-label" for="to-destination">Sektor</label>
			          <select class="form-select" id="to-destination">
			            <option value="" selected disabled hidden>Sektor/bidang usaha</option>
			            <option value="Sektor 1">Sektor 1</option>
			            <option value="Sektor 2">Sektor 2</option>
			            <option value="Sektor 3">Sektor 3</option>
			          </select>
			        </div>
			        <div class="text-center text-sm-start mt-2 mt-sm-4">
			          <button class="btn btn-primary w-100" type="submit">Cari pelaku Ekraf</button>
			        </div>
		  		</form>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</div>
@stop