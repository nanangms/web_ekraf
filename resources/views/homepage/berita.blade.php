@extends('homepage.layouts.app')

@section('title')
Berita & Artikel | EKRAF Jambi
@endsection

@section('content')
  
<div class="container mt-7 mb-2 pt-4 pt-lg-5">

  <h2 class="mb-4">Berita & Artikel</h2>
  <div class="row">
    @foreach ($berita as $berita)
      @if($berita->published == 'Y') <!-- Tampilkan hanya yg status publish: Ya -->
        <!-- Post-->
        <div class="col-md-3 border-bottom mb-5">
          <article class="pb-5">

            @if($berita->gambar != '')
            <div class="card my-3 bg-size-cover" style="background-image: url({{ $berita->getThumbnailBerita() }}); height: 23vh; background-position: center;">
            </div>
            @endif

            <h2 class="h4 nav-heading mb-2">
              <a href="/berita-info/{{ $berita->judul_seo }}">{{ $berita->judul }}</a>
            </h2>
            <div class="d-flex meta-link fs-sm align-items-center my-3">
              oleh<span class="fw-semibold ms-1"><a href="#">Admin</a></span>
              <span class="meta-divider"></span>
              {{ TanggalAja($berita->created_at) }}
              <span class="meta-divider"></span>
              <a class="meta-link fs-xs" href="#"><i class="far fa-comment-alt me-1"></i>&nbsp;2</a>
            </div>

            <div class="mb-2">
              <div class="mb-0 fs-sm">
                {!! Str::limit($berita->isi, 150, ' ...') !!} &nbsp;&nbsp;
                <a href="/berita-info/{{ $berita->judul_seo }}" class="fancy-link">Selengkapnya</a>
              </div>
            </div>
            
          </article>
        </div>

        <!-- <article class="py-4 mb-4 border-bottom">
            <h2 class="h4 nav-heading mb-2">
              <a href="/berita-info/{{ $berita->judul_seo }}">{{ $berita->judul }}</a>
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
                <a href="/berita-info/{{ $berita->judul_seo }}" class="fancy-link">Selengkapnya</a>
              </div>
            </div>
        </article> -->
      @endif
    @endforeach
  </div>

  <!-- Pagination-->
  <div class="pt-3 pb-2">
    <nav class="mb-4" aria-label="Page navigation">
      <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><i class="fas fa-angle-left"></i></a></li>
        <li class="page-item d-sm-none"><span class="page-link page-link-static">2 / 10</span></li>
        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">1</a></li>
        <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">2<span class="visually-hidden">(current)</span></span></li>
        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
        <li class="page-item d-none d-sm-block">...</li>
        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">10</a></li>
        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><i class="fas fa-angle-right"></i></a></li>
      </ul>
    </nav>
  </div>
  
</div>
@stop