<!-- Sign In Modal-->
<div class="modal fade" id="modal-signin" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0">
      <div class="view show" id="modal-signin-view">
        <div class="modal-header border-0 bg-dark px-4">
          <h4 class="modal-title text-light">Sign in</h4>
          <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="btn-close "></button>
        </div>
        <div class="modal-body px-4">
          <p class="fs-ms text-muted">Masuk ke akun anda menggunakan email dan password yang telah terdaftar.</p>
          <form method="post" action="{{ route('login') }}" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
              <div class="input-group"><i class="fas fa-envelope position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                <input class="form-control rounded" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
              </div>
              @error('email')
                  <span class="text-danger fs-sm" role="alert">
                      {{ $message }}
                  </span>
              @enderror
            </div>
            <div class="mb-3">
              <div class="input-group"><i class="fas fa-lock position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                <div class="password-toggle w-100">
                  <input class="form-control" type="password" name="password" placeholder="Password" required>
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>

              @error('password')
                  <span class="text-danger fs-sm" role="alert">
                      {{ $message }}
                  </span>
              @enderror
            </div>
            <button class="btn btn-primary d-block w-100" type="submit">Sign in</button>
            <p class="fs-sm pt-3 mb-0">Belum punya akun? <a href='#' class='fw-medium' data-view='#modal-signup-view'>Daftar</a></p>
          </form>
        </div>
      </div>
      <div class="view" id="modal-signup-view">
        <div class="modal-header border-0 bg-dark px-4">
          <h4 class="modal-title text-light">Daftar</h4>
          <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body px-4">
          <p class="fs-ms text-muted">Buat akun dengan mengisi form di bawah ini. Akun dibutuhkan untuk mendaftarkan usaha anda.</p>
          <form class="needs-validation" novalidate>
            <div class="mb-3">
              <input class="form-control" type="text" placeholder="Nama lengkap" required>
            </div>
            <div class="mb-3">
              <input class="form-control" type="text" placeholder="Email" required>
            </div>
            <div class="mb-3 password-toggle">
              <input class="form-control" type="password" placeholder="Password" required>
              <label class="password-toggle-btn" aria-label="Show/hide password">
                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
              </label>
            </div>
            <div class="mb-3 password-toggle">
              <input class="form-control" type="password" placeholder="Konfirmasi password" required>
              <label class="password-toggle-btn" aria-label="Show/hide password">
                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
              </label>
            </div>
            <button class="btn btn-primary d-block w-100" type="submit">Daftar</button>
            <p class="fs-sm pt-3 mb-0">Sudah punya akun? <a href='#' class='fw-medium' data-view='#modal-signin-view'>Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Navbar (Floating light)-->
<!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
<header class="header navbar navbar-expand-lg navbar-light navbar-floating navbar-sticky" data-scroll-header data-fixed-element>
  <div class="container px-0 px-xl-3 py-2">
    <button class="navbar-toggler ms-n2 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand flex-shrink-0 order-lg-1 mx-auto ms-lg-0 pe-lg-2 me-lg-4" href="/">
      <img class="navbar-floating-logo d-none d-lg-block" src="{{ asset('homepage/images/logo-ekraf.png') }}" alt="Logo ekraf" width="153">
      <img class="navbar-stuck-logo" src="{{ asset('homepage/images/logo-ekraf.png') }}" alt="Logo ekraf" width="153">
      <img class="d-lg-none" src="{{ asset('homepage/images/logo-ekraf.png') }}" alt="Logo ekraf" width="108">
    </a>
    <div class="d-flex align-items-center order-lg-3 ms-lg-auto">
      <a class="nav-link-style text-nowrap" href="#modal-signin" data-bs-toggle="modal" data-view="#modal-signin-view">
        <i class="fs-xl me-2 align-middle"></i>Sign in
      </a>
      <a class="btn btn-primary ms-grid-gutter d-none d-lg-inline-block navbar-btn" href="#modal-signin" data-bs-toggle="modal" data-view="#modal-signup-view">Daftar</a>
      <a class="btn btn-primary ms-grid-gutter d-none d-lg-inline-block navbar-stuck-btn" href="#modal-signin" data-bs-toggle="modal" data-view="#modal-signup-view">Daftar</a>
    </div>
    <div class="offcanvas offcanvas-collapse order-lg-2" id="primaryMenu">
      <div class="offcanvas-cap navbar-shadow">
        <img class="d-lg-none" src="{{ asset('homepage/images/logo-ekraf.png') }}" alt="Logo ekraf" width="125">
        <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <!-- Menu-->
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/" data-bs-toggle="dropdown">Beranda</a>
          </li>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Informasi</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profil Ekraf Jambi</a></li>
              <li class="dropdown">
                <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Galeri</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="coming-soon-image.html">Foto</a></li>
                  <li><a class="dropdown-item" href="coming-soon-illustration.html">Video</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="dropdown">Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="dropdown">Pelaku Ekraf</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="dropdown">Event</a>
          </li>
        </ul>
        <div class="d-lg-none mt-4">
          <a class="btn btn-primary w-100" href="#modal-signin" data-bs-toggle="modal" data-view="#modal-signup-view">Daftar</a>
        </div>
        
      </div>
    </div>
  </div>
</header>