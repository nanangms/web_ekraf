@extends('homepage.layouts.app')

@section('title')
Profil Pelaku Ekraf : {{$pelaku_ekraf->nama_usaha}} | EKRAF Jambi
@endsection

@section('content')
<!-- Page content-->
<div class="container mt-7 mb-2 py-lg-5">
	<div class="content">
		<form action="/pelaku-ekraf/search" method="get">
	        <div class="d-lg-flex align-items-center bg-secondary border rounded-3 px-4 pt-3 pb-1">
	          <div class="d-sm-flex align-items-center flex-grow-1">
	          	<div class="me-sm-3 w-100">
	        		<h5>Temukan Pelaku Usaha Ekonomi Kreatif di Jambi</h5>
	        	</div>
	        	<hr>
	            <div class="mb-3 mb-sm-4 me-sm-3 w-100">
	              <label class="form-label" for="nama_usaha">Nama Pelaku Ekraf</label>
		          <div class="input-group">
		          	<input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Nama usaha/pemilik usaha">
		          </div>
	            </div>
	            <div class="mb-3 pb-1 mb-sm-4 me-sm-3 w-100">
	              <label class="form-label" for="kab">Wilayah</label>
		          <select class="form-select" id="kab" name="kab">
		            <option value="0">[Semua Wilayah]</option>
		            @foreach($kab as $k)
			            <option value="{{$k->id}}">{{$k->nama_kab_kota}}</option>
			        @endforeach
		          </select>
	            </div>
	            <div class="mb-3 pb-1 mb-sm-4 me-sm-3 w-100">
	            	<label class="form-label" for="sektor">Sektor</label>
		          	<select class="form-select" id="sektor" name="sektor">
			            <option value="0">[Semua Sektor]</option>
			            @foreach($sektor as $s)
			            <option value="{{$s->id}}">{{$s->nama_sektor}}</option>
			           	@endforeach
			          </select>
	            </div>
	            <div class="mt-2 mt-sm-4 mb-4 text-center text-sm-start">
	            	<button class="btn btn-primary" type="submit">Cari pelaku Ekraf</button>
	            </div>
	          </div>
	        </div>
	    </form>
	</div>

	<div class="content pt-5 pt-lg-4 mb-2 mb-sm-0 pb-sm-5">
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
	                  		<td width="34%">Nama Usaha/Perusahaan</td>
	                  		<td width="1%">:</td>
	                  		<td>{{$pelaku_ekraf->nama_usaha}}</td>
	                  	</tr>
	                  	<tr>
	                  		<td>Sektor Usaha</td>
	                  		<td>:</td>
	                  		<td><a href="/pelaku-ekraf/sektor/{{$pelaku_ekraf->seo_sektor}}">{{$pelaku_ekraf->nama_sektor}}</a></td>
	                  	</tr>
	                  	<tr>
	                  		<td>Kota/Kabupaten</td>
	                  		<td>:</td>
	                  		<td><a href="/pelaku-ekraf/kab-kota/{{$pelaku_ekraf->seo_kab_kota}}">{{$pelaku_ekraf->nama_kab_kota}}</a></td>
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
                			<td>No. Telpon / WA</td>
                			<td>:</td>
                			<td>{{$pelaku_ekraf->wa_pemilik}}</td>
                		</tr>
                		<tr>
                			<td>Media sosial</td>
                			<td>:</td>
                			<td>
                				<div>
									<a href="https://facebook.com/{{$pelaku_ekraf->facebook_usaha}}" class="btn-social bs-facebook" title="{{$pelaku_ekraf->fb_pemilik}}">
									  <i class="fab fa-facebook-f"></i>
									</a>

									<a href="https://twitter.com/{{$pelaku_ekraf->twitter_usaha}}" class="btn-social bs-twitter" title="{{$pelaku_ekraf->twitter_usaha}}">
									  <i class="fab fa-twitter"></i>
									</a>

									<a href="https://instagram.com/{{$pelaku_ekraf->ig_usaha}}" class="btn-social bs-instagram" title="{{$pelaku_ekraf->ig_usaha}}">
									  <i class="fab fa-instagram"></i>
									</a>

									<a href="mailto:{{$pelaku_ekraf->email_usaha}}" class="btn-social bs-instagram" title="{{$pelaku_ekraf->email_usaha}}">
									  <i class="fa fa-envelope"></i>
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
	                			<td width="34%">No. Telpon / WA</td>
	                			<td width="1%">:</td>
	                			<td>{{$pelaku_ekraf->wa_pemilik}}</td>
	                		</tr>
	                		<tr>
	                			<td>Media sosial</td>
	                			<td>:</td>
	                			<td>
	                				<div>
										<a href="https://facebook.com/{{$pelaku_ekraf->fb_pemilik}}" class="btn-social bs-facebook" target="_blank" title="{{$pelaku_ekraf->fb_pemilik}}">
										  <i class="fab fa-facebook-f"></i>
										</a>

										<a href="https://twitter.com/{{$pelaku_ekraf->twitter_pemilik}}" class="btn-social bs-twitter" target="_blank" title="{{$pelaku_ekraf->twitter_pemilik}}">
										  <i class="fab fa-twitter"></i>
										</a>

										<a href="https://instagram.com/{{$pelaku_ekraf->ig_pemilik}}" class="btn-social bs-instagram" target="_blank" title="{{$pelaku_ekraf->ig_pemilik}}">
										  <i class="fab fa-instagram"></i>
										</a>

										<a href="https://t.me/{{$pelaku_ekraf->telegram_pemilik}}" class="btn-social bs-telegram" target="_blank" title="{{$pelaku_ekraf->telegram_pemilik}}">
										  <i class="fab fa-telegram"></i>
										</a>

										<a href="https://www.linkedin.com/{{$pelaku_ekraf->linkedin_pemilik}}" class="btn-social bs-linkedin" target="_blank" title="{{$pelaku_ekraf->linkedin_pemilik}}">
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
			    <p>{!!$pelaku_ekraf->deskripsi!!}</p>
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

        <div class="mb-4 pb-3 border-bottom">
        	<h5 class="text-nowrap mb-4 me-3">Produk Unggulan</h5>
        	<hr>
			<div class="masonry-grid overflow-hidden" data-columns="4">
			  @foreach ($produk as $p)
			  	<!-- Post-->
		        <div class="masonry-grid-item">
		          	<a class="nav-heading text-center" href="#">
		        		<div class="card border-0 bg-transparent">
		        			<div class="card-hover card-img card-img-gradient border-0 shadow mb-3">
		        				<!-- <span class="badge badge-floating badge-floating-end bg-primary fs-sm py-2 px-3">Kuliner</span> -->
		        				@if($p->gambar != Null)
		    					<div class="member-thumbnail">
								  <img src="{{ asset('images/produk/thumb/'.$p->gambar) }}"/>
								</div>
								@else
								<div class="member-thumbnail">
								  <img src="{{ asset('images/default_thumb_placeholder.jpg') }}"/>
								</div>
								@endif
				            	<!-- <span class="card-floating-text text-light fw-medium">Lihat detail usaha<i class="fas fa-angle-right align-middle fs-lg ms-3"></i></span> -->
				            </div>
				            <h6 class="nav-heading-title mb-0">{{$p->nama_produk}}</h6>
		        			<span class="fs-sm fw-normal text-muted">Rp {{number_format($p->harga)}}</span>
		        		</div>
		        	</a>
		        </div>
			  @endforeach
			</div>
        </div>
        
    </div>
</div>
@stop