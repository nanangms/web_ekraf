@extends('homepage.layouts.app')

@section('title')
Berita | EKRAF Jambi
@endsection

@section('content')
<div class="container mt-7 mb-2">
  @foreach ($berita as $berita)
    @if($berita->published == 'Y') <!-- Tampilkan hanya yg status publish: Ya -->
      <!-- Post-->
      <article class="py-4 mb-4 border-bottom">
            <h2 class="h4 nav-heading mb-2">
              <a href="/berita/{{ $berita->judul_seo }}">{{ $berita->judul }}</a>
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
          <div class="card my-3 bg-size-cover" style="background-image: url({{ $berita->getThumbnailBerita() }}); height: 23vh; background-position: center;">
          </div>
          @endif

          <div class="mb-2">
            <div class="mb-0 fs-sm">
              {!! Str::limit($berita->isi, 300, ' ...') !!} &nbsp;&nbsp;
              <a href="/berita/{{ $berita->judul_seo }}" class="fancy-link">Selengkapnya</a>
            </div>
          </div>
      </article>
    @endif
  @endforeach
</div>
@stop