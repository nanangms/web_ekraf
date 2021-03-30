@extends('homepage.layouts.app')

@section('title')
Data Pelaku Ekraf | EKRAF Jambi
@endsection

@section('content')
<!-- Page content-->
<div class="sidebar-enabled sidebar-end mt-7">
	<div class="container">
	  <div class="row">
	    <div class="col-lg-9 content pt-4 pt-lg-5 mb-2 mb-sm-0 pb-sm-5">
	      <h2 class="mb-5">Pelaku Ekraf</h2>
	      <!-- Blog grid-->
	      <div class="masonry-grid overflow-hidden" data-columns="4">
	      	@foreach ($pelaku_ekraf as $pelaku)
	      		<!-- Post-->
		        <div class="masonry-grid-item">
		          	<a class="nav-heading text-center" href="/data-pelaku-ekraf/{{$pelaku->kode_pelaku_ekraf}}">
		        		<div class="card border-0 bg-transparent">
		        			<div class="card-hover card-img card-img-gradient border-0 shadow mb-3">
		        				<!-- <span class="badge badge-floating badge-floating-end bg-primary fs-sm py-2 px-3">Kuliner</span> -->
		        				@if($pelaku->foto_usaha != Null)
		    					<div class="member-thumbnail">
								  <img src="{{ asset('images/foto_usaha/thumb/'.$pelaku->foto_usaha) }}"/>
								</div>
								@else
								<div class="member-thumbnail">
								  <img src="{{ asset('images/default_thumb_placeholder.jpg') }}"/>
								</div>
								@endif
				            	<span class="card-floating-text text-light fw-medium">Lihat detail usaha<i class="fas fa-angle-right align-middle fs-lg ms-3"></i></span>
				            </div>
				            <h6 class="nav-heading-title mb-0">{{$pelaku->nama_usaha}}</h6>
		        			<span class="fs-sm fw-normal text-muted">{{$pelaku->nama_sektor}}</span>
		        		</div>
		        	</a>
		        </div>
	      	@endforeach
	      </div>

	      <!-- Pagination-->
		  <div class="pt-4 pb-2">
		    <nav class="mb-4" aria-label="Page navigation">
		      <ul class="pagination justify-content-center">
		        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><i class="fas fa-angle-left"></i></a></li>
		        <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 10</span></li>
		        <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
		        
		        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><i class="fas fa-angle-right"></i></a></li>
		      </ul>
		    </nav>
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