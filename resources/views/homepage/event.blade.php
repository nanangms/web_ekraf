@extends('homepage.layouts.app')

@section('title')
Event | EKRAF Jambi
@endsection

@section('content')
<div class="container mt-7 mb-2 pt-4 pt-lg-5">

  <h2 class="mb-4">Event</h2>
  <div class="row">
<div class="accordion" id="accordionExample">
	        	@foreach ($event as $event)
	        		<!-- Item -->
				    <div class="accordion-item card card-hover" style="overflow: hidden;">
				    	<div class="d-flex">
				    		<div class="fs-sm py-2 bg-secondary text-center" style="border-top-left-radius: 1rem; border-bottom-left-radius: 1rem; min-width: 6rem">
				    			<div class="text-center px-0 px-lg-1 py-1">
									<span class="d-block text-primary" style="font-size: 1.75rem;">
										{{ tglnya($event->tgl_event) }}
									</span>
									<span class="text-muted text-uppercase">{{ nama_bulan_pendek($event->tgl_event) }}</span>
									<span class="d-block text-primary" style="font-size: 1rem;">
										{{ tahunnya($event->tgl_event) }}
									</span>
								</div>
				    		</div>
				    		<div class="p-2">
				    			<button class="btn px-2" data-bs-toggle="collapse" data-bs-target="#collapse{{ $event->id }}" aria-expanded="false" aria-controls="collapse{{ $event->id }}" type="button">
				    				<h3 class="h5 nav-heading text-wrap text-start">{{ $event->nama_event }}</h3>
				    			</button>

				    			<div class="accordion-collapse collapse px-2 w-100" id="collapse{{ $event->id }}" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
				    				@if($event->foto_banner != Null)
			    					
									  <img src="{{ asset('images/event/thumb/'.$event->foto_banner) }}" width="100%" />
									
									@else
									
									  <img src="{{ asset('images/default_thumb_placeholder.jpg') }}" width="100%"/>
									
									@endif
				    				<!-- <p class="fs-sm mb-0">{{ $event->deskripsi }}</p> -->
				    				<hr>
				    				<a href="/acara/detail/{{$event->event_seo}}" class="btn btn-primary btn-sm mb-2">Lihat detail event</a>
				    			</div>
				    		</div>
				    	</div>
				  	</div>
	        	@endforeach
				
	    	</div>
	    </div>
	</div>
@stop