@extends('homepage.layouts.app')

@section('title')
Sektor : {{$nama_sektor->nama_sektor}} | EKRAF Jambi
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
	<div class="content pt-5 mb-2 mb-sm-0 pb-sm-5">
      	<h2 class="mb-4">Data Pelaku Ekraf</h2>
      	<h4>Sektor : {{$nama_sektor->nama_sektor}}</h4>
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
				            <h6 class="nav-heading-title mb-0">{{Str::limit($pelaku_ekraf->nama_usaha, 25, ' ...')}}</h6>
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

@stop