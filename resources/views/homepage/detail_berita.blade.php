@extends('homepage.layouts.app')

@section('title')
{{$berita->judul_seo}} | EKRAF Jambi
@endsection

@section('content')
<div class="container mt-7 mb-2">
  <div class="mb-5">
    <article class="py-4 mb-4 border-bottom">
            <h2 class="h4 nav-heading mb-2">
              <a href="/post/{{ $berita->judul_seo }}">{{ $berita->judul }}</a>
            </h2>
            <div class="d-flex meta-link fs-sm align-items-center my-3">
                  <div>
                    oleh<span class="fw-semibold ms-1"><a href="#">Admin</a></span>
                    <span class="meta-divider"></span>
                    {{ TanggalAja($berita->created_at) }}
                    <span class="meta-divider"></span>
                    <a class="meta-link fs-xs" href="#"><i class="far fa-comment-alt me-1"></i>&nbsp;2</a>
                  </div>
              </div>

          @if($berita->gambar != '')
          <img src="{{ $berita->getThumbnailBerita() }}" width="100%">
          @endif

          <div class="mb-2">
            <div class="mb-0 fs-sm">
              {!! $berita->isi !!}
            </div>
          </div>
      </article>
  </div>
</div>
@stop