@extends('homepage.layouts.app')

@section('title')
Event | EKRAF Jambi
@endsection

@section('content')
<div class="container mt-7 mb-2">
  <div class="mb-5">
    <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
      <h3 class="widget-title text-nowrap">Event yang akan datang</h3>
    </div>

    <div class="accordion" id="accordionExample">
      @foreach($event as $ev)
      <!-- Item -->
        <div class="accordion-item card card-hover">
          <div class="d-flex">
            <div class="fs-sm p-2 bg-secondary" style="border-top-left-radius: 1rem; border-bottom-left-radius: 1rem; max-width: 3.75rem">
              <div class="text-center px-0 px-lg-1 py-1">
              <span class="d-sm-block text-primary" style="font-size: 1.685rem; line-height: 1.675rem">{{tglnya($ev->tgl_event)}}</span>
              <span class="fs-sm text-muted text-uppercase">{{nama_bulan_pendek($ev->tgl_event)}}</span>
            </div>
            </div>
            <div class="p-2">
              <div class="px-2" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <h6 class="nav-heading pt-1 fs-md fw-medium ">{{$ev->nama_event}}</h6>
              </div>

              <div class="accordion-collapse collapse px-2" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <p class="fs-sm mb-0">{{$ev->deskripsi}}</p>
                <hr>
                <a href="/acara/{{$ev->event_seo}}" class="btn btn-primary btn-sm mb-2">Lihat event</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
</div>
@stop