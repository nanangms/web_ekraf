@extends('homepage.layouts.app')

@section('title')
Data Pelaku Ekraf | EKRAF Jambi
@endsection

@section('content')
<div class="container mt-7 mb-2">
  <div class="mb-5">
    <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
      <h3 class="widget-title text-nowrap">Pelaku Ekraf</h3>
    </div>
<div class="tns-carousel-wrapper pb-5 pb-lg-0">
        		<div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 4, &quot;controls&quot;: false, &quot;gutter&quot;: 23, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;300&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;900&quot;:{&quot;items&quot;:4}}}">
    @foreach ($pelaku_ekraf as $pelaku)
				    <div>
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
									  <img src="{{ asset('images/no_ekraf.jpg') }}"/>
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
  </div>
</div>
@stop