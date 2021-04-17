@extends('homepage.layouts.app')

@section('title')
{{$berita->judul}} | EKRAF Jambi
@endsection

@section('content')

<!-- Page content-->
<div class="container mt-7 pt-2 pt-lg-3">
  <div class="row justify-content-center">
    <!-- Content-->
    <div class="col-lg-9 py-4 mb-2 mb-sm-0 pb-sm-5">
      <div class="pb-4" style="">
        <h2>{{ $berita->judul }}</h2>
        <div class="d-flex meta-link fs-sm align-items-center">
          oleh<span class="fw-semibold ms-1"><a href="#">Admin</a></span>
          <span class="meta-divider"></span>
          {{ TanggalAja($berita->created_at) }}
          <!-- <span class="meta-divider"></span>
          <a class="meta-link fs-xs" href="#"><i class="far fa-comment-alt me-1"></i>&nbsp;0</a> -->
        </div>
      </div>

      <div class="card-img mt-3 mb-4 news-image">
        <img src="{{ asset($berita->getImageBerita()) }}"/>
      </div>
      
      <!-- Post content-->
      <p>{!! $berita->isi !!}</p>
      <!-- Tags + Sharing-->
      <div class="row g-0 position-relative align-items-center border-top border-bottom my-5">
        <div class="col-md-6 py-2 py-dm-3 pe-md-3 text-center text-md-start">
          <a class="btn-tag me-2 my-2" href="#">#{!! $berita->tag !!}</a>
        </div>
        <div class="d-none d-md-block position-absolute border-start h-100" style="top: 0; left: 50%; width: 1px;"></div>
        <div class="col-md-6 ps-md-3 py-2 py-md-3">
          <div class="d-flex align-items-center justify-content-center justify-content-md-end">
            <h6 class="text-nowrap my-2 me-3">Bagikan post ini:</h6>
            <a class="btn-social bs-outline bs-facebook ms-2 my-2" href="https://www.facebook.com/share.php?u={{url('berita-info/read/'.$berita->judul_seo)}}" target="_blank"><i class="fa fa-facebook"></i></a>
            <a class="btn-social bs-outline bs-twitter ms-2 my-2" href="https://twitter.com/intent/tweet?url={{url('berita-info/read/'.$berita->judul_seo)}}" target="_blank"><i class="ai-twitter"></i></a>
            <a href="whatsapp://send?text={{url('berita-info/read/'.$berita->judul_seo)}}" data-action="share/whatsapp/share" target="_blank">Bagikan ke WhatsApp</a>

            <a class="btn-social bs-outline bs-email ms-2 my-2" href="#"><i class="ai-mail"></i></a>
          </div>
        </div>
      </div>

      <h3>Baca Juga</h3>
      <hr>
      <div class="row">
    @foreach ($baca_juga as $b)
      @if($b->published == 'Y') <!-- Tampilkan hanya yg status publish: Ya -->
        <!-- Post-->
        <div class="col-md-3 border-bottom mb-5">
          <article class="">

            <a href="/berita-info/read/{{ $b->judul_seo }}">
              <div class="card my-2 bg-size-cover" style="background-image: url({{ $b->getThumbnailBerita() }}); height: 10vh; background-position: center;">
              
              </div>
            </a>

            <h5 class="h5 nav-heading">
              <a href="/berita-info/read/{{ $b->judul_seo }}">{{ $b->judul }}</a>
            </h5>
          </article>
        </div>
       
      @endif
    @endforeach
  </div>
      <!-- Prev / Next post navigation-->
      <!-- <nav class="d-flex justify-content-between pb-4 mb-5" aria-label="Entry navigation"><a class="entry-nav me-3" href="#">
          <h3 class="h5 pb-sm-2">Prev post</h3>
          <div class="d-flex align-items-start">
            <div class="entry-nav-thumb flex-shrink-0 d-none d-sm-block"><img class="rounded" src="img/blog/th04.jpg" alt="Post thumbnail"></div>
            <div class="ps-sm-3">
              <h4 class="nav-heading fs-md fw-medium mb-0">How technology affect our decisions</h4><span class="fs-xs text-muted">by Jessica Miller</span>
            </div>
          </div></a><a class="entry-nav ms-3" href="#">
          <h3 class="h5 pb-sm-2 text-end">Next post</h3>
          <div class="d-flex align-items-start">
            <div class="text-end pe-sm-3">
              <h4 class="nav-heading fs-md fw-medium mb-0">Open space - new trend in office design</h4><span class="fs-xs text-muted">by Daniel Adams</span>
            </div>
            <div class="entry-nav-thumb flex-shrink-0 d-none d-sm-block"><img class="rounded" src="img/blog/th05.jpg" alt="Post thumbnail"></div>
          </div></a></nav> -->
      <!-- Comments-->
      <!-- <div class="pb-4 mb-5" id="comments">
        <h2 class="h5 pb-4">Belum ada komentar</h2>
        <a class="btn btn-translucent-primary border-primary border-1 d-block w-100" href="#comment-form" data-bs-toggle="collapse">Tambahkan komentar</a>
        <div class="collapse" id="comment-form">
          <form class="needs-validation bg-light rounded-3 shadow p-4 p-lg-5 mt-4" novalidate>
            <div class="row">
              <div class="col-sm-6 mb-3">
                <label class="form-label" for="com-name">Nama<sup class="text-danger ms-1">*</sup></label>
                <input class="form-control" type="text" id="com-name" placeholder="Enter your name" required>
                <div class="invalid-feedback">Please enter your name.</div>
                <div class="valid-feedback">Looks good!</div>
              </div>
              <div class="col-sm-6 mb-3">
                <label class="form-label" for="com-email">Email<sup class="text-danger ms-1">*</sup></label>
                <input class="form-control" type="email" id="com-email" placeholder="Enter your email" required>
                <div class="invalid-feedback">Please provide a vild email address.</div>
                <div class="valid-feedback">Looks good!</div>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="com-text">Komentar<sup class="text-danger ms-1">*</sup></label>
              <textarea class="form-control" id="com-text" rows="6" placeholder="Write your comment here" required></textarea>
              <div class="invalid-feedback">Please write your comment.</div>
              <div class="valid-feedback">Looks good!</div>
            </div>
            <button class="btn btn-primary" type="submit">Post comment</button>
          </form>
        </div>
      </div> -->
    </div>
  </div>
</div>
@stop