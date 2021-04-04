@extends('homepage.layouts.app')

@section('title')
Profil Pelaku Ekraf : {{$pelaku_ekraf->nama_usaha}} | EKRAF Jambi
@endsection

@section('content')
<!-- Page content-->
<div class="container mt-7 mb-2 py-4 py-lg-5">
	<div class="row">
	  	<div class="col-lg-12 content pt-4 pt-lg-5">
	  		
	  			<div class="p-3 border rounded-3 bg-secondary">
	  				<h4>Temukan Pelaku Usaha Ekonomi Kreatif di Jambi</h4>
	  				<hr>
			  		<form action="#" method="get">
			  			<div class="row">
			  				<div class="col-md-3">
			  					
						          <div class="input-group">
						          	<input type="text" class="form-control" name="nama_usaha" placeholder="Nama usaha/pemilik usaha">
						          </div>
			  				</div>
			  				<div class="col-md-3">
			  					
						          <select class="form-select" name="kab">
						            <option value="" selected disabled hidden>Kabupaten/Kota</option>
						            @foreach($kab as $k)
						            <option value="{{$k->id}}">{{$k->nama_kab_kota}}</option>
						           	@endforeach
						          </select>
			  				</div>
			  				<div class="col-md-3">
			  					
						          <select class="form-select" name="sektor">
						            <option value="" selected disabled hidden>Sektor/bidang usaha</option>
						            @foreach($sektor as $s)
						            <option value="{{$s->id}}">{{$s->nama_sektor}}</option>
						           	@endforeach
						          </select>
			  				</div>
			  				<div class="col-md-3">
			  					
			  					<button class="btn btn-primary w-100" type="submit">Cari pelaku Ekraf</button>
			  				</div>
			  			</div>
			  		</form>
		        </div>
		      
	  	</div>
	</div>
	<div class="row">
	    <div class="col-lg-12 content pt-4 pt-lg-5 mb-2 mb-sm-0 pb-sm-5">
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
		                  		<td width="45%">Nama Usaha/Perusahaan</td>
		                  		<td width="1%">:</td>
		                  		<td>{{$pelaku_ekraf->nama_usaha}}</td>
		                  	</tr>
		                  	<tr>
		                  		<td>Sektor Usaha</td>
		                  		<td>:</td>
		                  		<td><a href="/data-pelaku-ekraf/sektor/{{$pelaku_ekraf->seo_sektor}}">{{$pelaku_ekraf->nama_sektor}}</a></td>
		                  	</tr>
		                  	<tr>
		                  		<td>Kota/Kabupaten</td>
		                  		<td>:</td>
		                  		<td><a href="/data-pelaku-ekraf/kab_kota/{{$pelaku_ekraf->seo_kab_kota}}">{{$pelaku_ekraf->nama_kab_kota}}</a></td>
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
<<<<<<< HEAD
				    <p>{!!$pelaku_ekraf->deskripsi!!}</p>
=======
				    {!! $pelaku_ekraf->deskripsi !!}
>>>>>>> ed44b531df8540b8e9f487eb197267fc78089836
				  </div>
				  <div class="tab-pane fade" id="keahlian" role="tabpanel">
				    {!! $pelaku_ekraf->keahlian !!}
				  </div>
				  <div class="tab-pane fade" id="pengalaman" role="tabpanel">
				    <p>{!! $pelaku_ekraf->pengalaman !!}</p>
				  </div>
				  <div class="tab-pane fade" id="portofolio" role="tabpanel">
				    <p>{!! $pelaku_ekraf->portofolio !!}</p>
				  </div>
				</div>
	        </div>

	        <div>
	        	<h5 class="text-nowrap mb-4 me-3">Kontak</h5>
	        </div>
	    </div>
	</div>
</div>













@stop