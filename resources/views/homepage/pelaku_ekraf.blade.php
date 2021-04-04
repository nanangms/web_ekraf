@extends('homepage.layouts.app')

@section('title')
Data Pelaku Ekraf | EKRAF Jambi
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
	      	<h2>Pelaku Ekraf</h2>
	      	<!-- Blog grid-->
	      	<div class="masonry-grid overflow-hidden" data-columns="4">
		      	@foreach ($pelaku_ekrafs as $pelaku_ekraf)
		      		<!-- Post-->
			        <div class="masonry-grid-item">
			          	<a class="nav-heading text-center" href="/data-pelaku-ekraf/{{$pelaku_ekraf->kode_pelaku_ekraf}}">
			        		<div class="card border-0 bg-transparent">
			        			<div class="card-hover card-img card-img-gradient border-0 shadow mb-3">
			        				<!-- <span class="badge badge-floating badge-floating-end bg-primary fs-sm py-2 px-3">Kuliner</span> -->
			        				@if($pelaku_ekraf->foto_usaha != Null)
			    					<div class="member-thumbnail">
									  <img src="{{ asset('images/foto_usaha/thumb/'.$pelaku_ekraf->foto_usaha) }}"/>
									</div>
									@else
									<div class="member-thumbnail">
									  <img src="{{ asset('images/default_thumb_placeholder.jpg') }}"/>
									</div>
									@endif
					            	<span class="card-floating-text text-light fw-medium">Lihat detail usaha<i class="fas fa-angle-right align-middle fs-lg ms-3"></i></span>
					            </div>
					            <h6 class="nav-heading-title mb-0">{{$pelaku_ekraf->nama_usaha}}</h6>
			        			<span class="fs-sm fw-normal text-muted">{{$pelaku_ekraf->nama_sektor}}</span>
			        		</div>
			        	</a>

			        </div>
		      	@endforeach
	      	</div>
	      
	      	<!-- Pagination-->
		  	<div class="pt-4 pb-2">
			    <nav class="mb-4" aria-label="Page navigation">
			      <div class="pagination justify-content-center">
			        {{ $pelaku_ekrafs->links() }}
			      </div>
			    </nav>
		  	</div>
	    </div>
	</div>
</div>

@stop