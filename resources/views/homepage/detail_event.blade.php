@extends('homepage.layouts.app')

@section('title')
Event : {{$event->nama_event}} | EKRAF Jambi
@endsection

@section('header')
<meta property="og:url"           content="{{url('/')}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Ekraf Jambi" />
<meta property="og:description"   content="Tetap Berkarya" />
<meta property="og:image"         content="{{ asset('images/event/'.$event->foto_banner) }}" />

@endsection

@section('content')

<!-- Page content-->
<div class="container mt-7 pt-2 pt-lg-3">
  <div class="row justify-content-center">
    <!-- Content-->
    <div class="col-lg-9 py-4 mb-2 mb-sm-0 pb-sm-5">
      <div class="pb-2" style="">
        <h2>{{ $event->nama_event }}</h2>
        
      </div>

      <div class="card-img mt-3 mb-4">
      	@if($event->foto_banner != Null)
		
		  <img src="{{ asset('images/event/thumb/'.$event->foto_banner) }}"/>
		
		@else
		
		  <img src="{{ asset('images/default_thumb_placeholder.jpg') }}"/>
	
		@endif
      </div>

      <table class="table" width="100%" style="vertical-align: middle;">
      	<tr>
      		<td><h6>Jadwal Pelaksanaan : </h6>{{ TanggalAja($event->tgl_event) }}</td>
      		<td><h6>Lokasi : </h6> {{ $event->lokasi }}</td>
      		
      	</tr>
      </table>
      
     

      <h4>Deskripsi</h4>
      <p>{!! $event->deskripsi !!}</p>
      <!-- Tags + Sharing-->
      <div class="row g-0 position-relative align-items-center border-top border-bottom my-5">
        <div class="col-md-6 ps-md-3 py-2 py-md-3">
          <div class="d-flex align-items-center">
            <h6 class="text-nowrap my-2 me-3">Bagikan Event ini:</h6>
            <a class="btn-social bs-outline bs-facebook ms-2 my-2" href="https://www.facebook.com/share.php?u={{url('acara/detail/'.$event->event_seo)}}" target="_blank"><i class="fa fa-facebook"></i></a>
            <a class="btn-social bs-outline bs-twitter ms-2 my-2" href="https://twitter.com/intent/tweet?url={{url('acara/detail/'.$event->event_seo)}}" target="_blank"><i class="ai-twitter"></i></a>
            <a href="whatsapp://send?text={{url('acara/detail/'.$event->event_seo)}}" data-action="share/whatsapp/share" target="_blank">Bagikan ke WhatsApp</a>
            <div id="share"></div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<script>
    $("#share").jsSocials({
        shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
    });
</script>
@stop