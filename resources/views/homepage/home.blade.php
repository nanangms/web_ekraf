@extends('homepage.layouts.app')

@section('title')
Homepage | EKRAF Jambi
@endsection

@section('content')
      
  <!-- Page content-->
  <!-- Hero-->
  
  <!-- Booking form-->
  <div class="container mt-7 mb-2">
  	<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
	    <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
	    <!-- <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li> -->
	  </ol>
	  <div class="carousel-inner" style="border-radius: 1rem; overflow: hidden;">
	  	<div class="carousel-item active" style="height: 300px">
	      	<div class="bg-gradient py-7">
	      	  <div class="position-absolute top-0 start-0 w-100 h-100 bg-size-cover" style="background-image: url({{ asset('homepage/images/banner-1.jpg') }}); background-position: center;">
		      </div>
	          <div class="position-relative container text-center">
	            <h1 class="text-light pb-1">Selamat datang di website EKRAF Jambi</h1>
	            <p class="fs-lg text-light">Makes it easier to experience the world.</p>
	          </div>
	        </div>
	    </div>
	    <div class="carousel-item" style="height: 300px;">
	      <div class="bg-dark px-4 px-lg-6 py-5">
		    <div class="position-relative container">
		      <div class="row align-items-center">
		        <div class="col-lg-5 offset-lg-1 order-lg-2 pb-6 pb-lg-0 text-center text-lg-start">
		          <h2 class="text-light">Tentang EKRAF Jambi</h2>
		          <p class="text-light mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
		          <br>
		          <a href="#" class="fancy-link">Selengkapnya</a>
		        </div>
		        <div class="col-lg-6 order-lg-1">
		          <div class="row">
		            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
		              <div class="px-2 text-center"><img class="bg-light rounded-circle mb-2" src="{{ asset('homepage/images/daftar-1.png') }}" alt="Daftar" width="105">
		                <p class="fs-sm fw-medium text-light mb-0 pt-1">Pendaftaran pemilik usaha sebagai pelaku Ekraf</p>
		              </div>
		            </div>
		            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
		              <div class="px-2 text-center"><img class="bg-light rounded-circle mb-2" src="{{ asset('homepage/images/cari-1.png') }}" alt="Cari" width="105">
		                <p class="fs-sm fw-medium text-light mb-0 pt-1">Direktori dan pencarian data pelaku Ekraf</p>
		              </div>
		            </div>
		            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
		              <div class="px-2 text-center"><img class="bg-light rounded-circle mb-2" src="{{ asset('homepage/images/event-1.png') }}" alt="Event" width="105">
		                <p class="fs-sm fw-medium text-light mb-0 pt-1">Informasi event Ekonomi kreatif</p>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
	    </div>
	    <!-- <div class="carousel-item" style="height: 300px">
	      <img src="{{ asset('images/rumah_bronis_2.jpg') }}" alt="Image">
	    </div> -->
	  </div>
	  <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Next</span>
	  </a>
	</div>
  </div>

  <!-- Pelaku Ekraf -->
  <section class="container py-5 border-bottom">
  	<div class="row">
  		<div class="col-md-3 ps-md-3">
  			<div class="p-3 border rounded-3" style="background-color: #f7f5ed">
		  		<form>
		  			<div class="mb-3 pb-1 w-100 mb-sm-4 me-sm-3">
			          <label class="form-label" for="from-destination">Pelaku Ekraf</label>
			          <div class="input-group">
			          	<input type="text" class="form-control" name="" placeholder="Nama usaha/pemilik usaha">
			          </div>
			      </div>
			      <div class="mb-3 pb-1 w-100 mb-sm-4 me-sm-3">
			          <label class="form-label" for="to-destination">Wilayah</label>
			          <select class="form-select" id="to-destination">
			            <option value="" selected disabled hidden>Kabupaten/Kota</option>
			            <option value="Kota Jambi">Kota Jambi</option>
			            <option value="Kota Sungai Penuh">Kota Sungai Penuh</option>
			            <option value="Kabupaten Batanghari">Kabupaten Batanghari</option>
			            <option value="Kabupaten Bungo">Kabupaten Bungo</option>
			            <option value="Kabupaten Kerinci">Kabupaten Kerinci</option>
			            <option value="Kabupaten Merangin">Kabupaten Merangin</option>
			            <option value="Kabupaten Muaro Jambi">Kabupaten Muaro Jambi</option>
			            <option value="Kabupaten Sarolangun">Kabupaten Sarolangun</option>
			            <option value="Kabupaten Tanjung Jabung Timur">Kabupaten Tanjung Jabung Timur</option>
			            <option value="Kabupaten Tanung Jabung Barat">Kabupaten Tanung Jabung Barat</option>
			            <option value="Kabupaten Tebo">Kabupaten Tebo</option>
			          </select>
			        </div>
			        <div class="mb-3 pb-1 w-100 mb-sm-4 me-sm-3">
			          <label class="form-label" for="to-destination">Sektor</label>
			          <select class="form-select" id="to-destination">
			            <option value="" selected disabled hidden>Sektor/bidang usaha</option>
			            <option value="Sektor 1">Sektor 1</option>
			            <option value="Sektor 2">Sektor 2</option>
			            <option value="Sektor 3">Sektor 3</option>
			          </select>
			        </div>
			        <div class="text-center text-sm-start mt-2 mt-sm-4">
			          <button class="btn btn-primary w-100" type="submit">Cari pelaku Ekraf</button>
			        </div>
		  		</form>
	        </div>
  		</div>

        <div class="col-md-9 pe-md-3 pt-5 pb-2 py-lg-0">
        	<div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
              <h5 class="text-nowrap mb-4 me-3">Pelaku Ekraf terbaru</h5>
              <p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="#" style="text-decoration: none;">Selengkapnya<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p>
            </div>
        	<div class="tns-carousel-wrapper">
        		<div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 3, &quot;controls&quot;: false, &quot;gutter&quot;: 23, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;540&quot;:{&quot;items&quot;:2},&quot;900&quot;:{&quot;items&quot;:3}}}">
                    <div class="pb-1">
			        	<a class="card border card-hover" href="#">
				            <div class="card-img-top card-img-gradient">
				            	<!-- <img src="{{ asset('images/rumah_bronis_2.jpg') }}" alt="Burano"> -->
				            	<div class="bg-size-cover" style="background-image: url({{ asset('images/rumah_bronis_2.jpg') }}); height: 25vh; background-position: center;">
		    					</div>
				            	<span class="card-floating-text text-light fw-medium">Lihat detail usaha<i class="fas fa-angle-right align-middle fs-lg ms-3"></i></span>
				            </div>
				            <div class="card-body text-center">
				              <h6>Rumah Bronis</h6>
				              <p class="fs-sm text-muted mb-0">Kuliner</p>
				            </div>
				        </a>
				    </div>
				    <div class="pb-1">
			        	<a class="card border card-hover" href="#">
				            <div class="card-img-top card-img-gradient">
				            	<div class="bg-size-cover" style="background-image: url({{ asset('images/rumah_bronis_2.jpg') }}); height: 25vh; background-position: center;">
		    					</div>
				            	<span class="card-floating-text text-light fw-medium">Lihat detail usaha<i class="fas fa-angle-right align-middle fs-lg ms-3"></i></span>
				            </div>
				            <div class="card-body text-center">
				              <h6>Rumah Bronis</h6>
				              <p class="fs-sm text-muted mb-0">Kuliner</p>
				            </div>
				        </a>
				    </div>
				    <div class="pb-1">
			        	<a class="card border card-hover" href="#">
				            <div class="card-img-top card-img-gradient">
				            	<div class="bg-size-cover" style="background-image: url({{ asset('images/rumah_bronis_2.jpg') }}); height: 25vh; background-position: center;">
		    					</div>
				            	<span class="card-floating-text text-light fw-medium">Lihat detail usaha<i class="fas fa-angle-right align-middle fs-lg ms-3"></i></span>
				            </div>
				            <div class="card-body text-center">
				              <h6>Rumah Bronis</h6>
				              <p class="fs-sm text-muted mb-0">Kuliner</p>
				            </div>
				        </a>
				    </div>
				    <div class="pb-1">
			        	<a class="card border card-hover" href="#">
				            <div class="card-img-top card-img-gradient">
				            	<div class="bg-size-cover" style="background-image: url({{ asset('images/rumah_bronis_2.jpg') }}); height: 25vh; background-position: center;">
		    					</div>
				            	<span class="card-floating-text text-light fw-medium">Lihat detail usaha<i class="fas fa-angle-right align-middle fs-lg ms-3"></i></span>
				            </div>
				            <div class="card-body text-center">
				              <h6>Rumah Bronis</h6>
				              <p class="fs-sm text-muted mb-0">Kuliner</p>
				            </div>
				        </a>
				    </div>
				    <div class="pb-1">
			        	<a class="card border card-hover" href="#">
				            <div class="card-img-top card-img-gradient">
				            	<div class="bg-size-cover" style="background-image: url({{ asset('images/rumah_bronis_2.jpg') }}); height: 25vh; background-position: center;">
		    					</div>
				            	<span class="card-floating-text text-light fw-medium">Lihat detail usaha<i class="fas fa-angle-right align-middle fs-lg ms-3"></i></span>
				            </div>
				            <div class="card-body text-center">
				              <h6>Rumah Bronis</h6>
				              <p class="fs-sm text-muted mb-0">Kuliner</p>
				            </div>
				        </a>
				    </div>
        		</div>
        	</div>
        </div>
    </div>
  </section>

  <!-- Features CTA-->
  <!-- <section class="bg-gradient position-relative pt-6 pb-5 py-sm-6">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-size-cover" style="background-image: url(img/demo/booking/bg-pattern01.png);">
    </div>
    <div class="position-relative zindex-5 container py-2">
      <div class="row align-items-center">
        <div class="col-lg-5 offset-lg-1 order-lg-2 pb-5 pb-lg-0 text-center text-lg-start">
          <h2 class="text-light">Tentang EKRAF Jambi</h2>
          <p class="text-light mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="row">
            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
              <div class="px-2 text-center"><img class="bg-light rounded-circle mb-2" src="{{ asset('homepage/images/daftar-1.png') }}" alt="Daftar" width="105">
                <p class="fs-sm fw-medium text-light mb-0 pt-1">Pendaftaran pemilik usaha sebagai pelaku Ekraf</p>
              </div>
            </div>
            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
              <div class="px-2 text-center"><img class="bg-light rounded-circle mb-2" src="{{ asset('homepage/images/cari-1.png') }}" alt="Cari" width="105">
                <p class="fs-sm fw-medium text-light mb-0 pt-1">Direktori dan pencarian data pelaku Ekraf</p>
              </div>
            </div>
            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
              <div class="px-2 text-center"><img class="bg-light rounded-circle mb-2" src="{{ asset('homepage/images/event-1.png') }}" alt="Event" width="105">
                <p class="fs-sm fw-medium text-light mb-0 pt-1">Informasi event Ekonomi kreatif</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Berita -->
  <section class="container py-5">
  	<!-- <h3 class="mb-4 pb-3">Berita & Event Ekraf</h3> -->
  	<div class="row">

      <!-- Content-->
      <div class="col-lg-6 order-lg-2">
      	<div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
          <h3 class="widget-title text-nowrap">Berita & Artikel</h3>
          <p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="#" style="text-decoration: none;">Lainnya<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p>
        </div>

        <!-- Post-->
        <article class="masonry-grid-item py-4 mb-4 border-bottom">
        	<h2 class="h4 nav-heading mb-2">
        		<a href="blog-single-rs.html">Designers should always keep their users in mind</a>
        	</h2>
        	<div class="d-flex meta-link fs-sm align-items-center my-3">
                <div>
                	oleh<span class="fw-semibold ms-1"><a href="">Admin</a></span>
                	<span class="meta-divider"></span>
                	12 Maret 2021
                	<span class="meta-divider"></span>
                	<a class="meta-link fs-xs" href="#"><i class="far fa-comment-alt me-1"></i>&nbsp;2</a>
                </div>
            </div>
		    <div class="card my-3 bg-size-cover" style="background-image: url({{ asset('images/rumah_bronis_2.jpg') }}); height: 25vh; background-position: center;">
		    </div>
		    <div class="mb-2">
	            <p class="mb-0 fs-sm text-muted">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa…&nbsp;&nbsp;<a href="#" class="fancy-link">Selengkapnya</a></p>
	        </div>
		</article>

        <!-- Post-->
        <article class="masonry-grid-item py-4 mb-4 border-bottom">
        	<h2 class="h4 nav-heading mb-2">
        		<a href="blog-single-rs.html">Designers should always keep their users in mind</a>
        	</h2>
        	<div class="d-flex meta-link fs-sm align-items-center my-3">
                <div>
                	oleh<span class="fw-semibold ms-1"><a href="">Admin</a></span>
                	<span class="meta-divider"></span>
                	12 Maret 2021
                	<span class="meta-divider"></span>
                	<a class="meta-link fs-xs" href="#"><i class="far fa-comment-alt me-1"></i>&nbsp;2</a>
                </div>
            </div>
		    <div class="card my-3 bg-size-cover" style="background-image: url({{ asset('images/rumah_bronis_2.jpg') }}); height: 25vh; background-position: center;">
		    </div>
		    <div class="mb-2">
	            <p class="mb-0 fs-sm text-muted">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa…&nbsp;&nbsp;<a href="#" class="fancy-link">Selengkapnya</a></p>
	        </div>
		</article>

		<!-- Post-->
        <article class="masonry-grid-item py-4 mb-4 border-bottom">
        	<h2 class="h4 nav-heading mb-2">
        		<a href="blog-single-rs.html">Designers should always keep their users in mind</a>
        	</h2>
        	<div class="d-flex meta-link fs-sm align-items-center my-3">
                <div>
                	oleh<span class="fw-semibold ms-1"><a href="">Admin</a></span>
                	<span class="meta-divider"></span>
                	12 Maret 2021
                	<span class="meta-divider"></span>
                	<a class="meta-link fs-xs" href="#"><i class="far fa-comment-alt me-1"></i>&nbsp;2</a>
                </div>
            </div>
		    <div class="card my-3 bg-size-cover" style="background-image: url({{ asset('images/rumah_bronis_2.jpg') }}); height: 25vh; background-position: center;">
		    </div>
		    <div class="mb-2">
	            <p class="mb-0 fs-sm text-muted">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa…&nbsp;&nbsp;<a href="#" class="fancy-link">Selengkapnya</a></p>
	        </div>
		</article>
      </div>

      <div class="col-lg-3 order-lg-1">
      		<!-- Galeri -->
      		<div class="mb-5">
      			<div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
		          <h3 class="widget-title text-nowrap">Galeri</h3>
		          <!-- <p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="#" style="text-decoration: none;">Lainnya<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p> -->
		        </div>

		        <div>
		        	<div class="w-100">
                        <div class="d-flex justify-content-between align-items-center px-5 px-lg-0">
                          <!-- Facebook -->
							<a href="#" class="btn-social bs-facebook bs-lg">
							  <i class="fab fa-facebook-f"></i>
							</a>

							<!-- Twitter -->
							<a href="#" class="btn-social bs-twitter bs-lg">
							  <i class="fab fa-twitter"></i>
							</a>

							<!-- Instagram -->
							<a href="#" class="btn-social bs-instagram bs-lg">
							  <i class="fab fa-instagram"></i>
							</a>

							<!-- YouTube -->
							<a href="#" class="btn-social bs-youtube bs-lg">
							  <i class="fab fa-youtube"></i>
							</a>
                        </div>
                      </div>
		        	
		        </div>
      		</div>
  			

      		<!-- Statistik -->
      		<div class="mb-5">
      			<div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
		          <h3 class="widget-title text-nowrap">Statistik</h3>
		          <!-- <p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="#" style="text-decoration: none;">Lainnya<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p> -->
		        </div>

		        <!-- <div style="background-color: white; border-radius: 50%; width: 105px; height: 105px;" class="position-relative">
	          		<div class="position-absolute" style="top: 55%; left: 50%; -ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">
	          			<h1 class="display-4" style="background: -webkit-radial-gradient(#BC9226, #FECB65); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">11</h1>
	          		</div>
	            </div> -->

	            <div class="px-md-3">
	            	<a href="#" style="text-decoration: none;">
		            	<div class="card mb-3">
			            	<div class="card-body text-center pb-3">
			            		<div class="d-flex align-items-center">
			            			<h1 class="display-5" style="background: -webkit-radial-gradient(#BC9226, #FECB65); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">11</h1>
			                      <div class="w-100 ps-2 ms-2">
			                        <div class="d-flex justify-content-between align-items-center">
			                          <div class="fs-sm pe-1"><h6>Kabupaten/Kota</h6></div><h6><i class="fas fa-angle-right ms-2 me-1"></i></h6>
			                        </div>
			                      </div>
			                    </div>
			            	</div>
			            </div>
		            </a>

		            <a href="#" style="text-decoration: none;">
			            <div class="card mb-3">
			            	<div class="card-body text-center pb-3">
			            		<div class="d-flex align-items-center">
			            			<h1 class="display-5" style="background: -webkit-radial-gradient(#BC9226, #FECB65); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">17</h1>
			                      <div class="w-100 ps-2 ms-2">
			                        <div class="d-flex justify-content-between align-items-center">
			                          <div class="fs-sm pe-1"><h6>Sub Sektor</h6></div><h6><i class="fas fa-angle-right ms-2 me-1"></i></h6>
			                        </div>
			                      </div>
			                    </div>
			            	</div>
			            </div>
			        </a>

			        <a href="#" style="text-decoration: none;">
			            <div class="card mb-3">
			            	<div class="card-body text-center pb-3">
			            		<div class="d-flex align-items-center">
			            			<h1 class="display-5" style="background: -webkit-radial-gradient(#BC9226, #FECB65); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">45</h1>
			                      <div class="w-100 ps-2 ms-2">
			                        <div class="d-flex justify-content-between align-items-center">
			                          <div class="fs-sm pe-1"><h6>Usaha</h6></div><h6><i class="fas fa-angle-right ms-2 me-1"></i></h6>
			                        </div>
			                      </div>
			                    </div>
			            	</div>
			            </div>
			        </a>

			        <a href="#" style="text-decoration: none;">
			            <div class="card mb-3">
			            	<div class="card-body text-center pb-3">
			            		<div class="d-flex align-items-center">
			            			<h1 class="display-5" style="background: -webkit-radial-gradient(#BC9226, #FECB65); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">19</h1>
			                      <div class="w-100 ps-2 ms-2">
			                        <div class="d-flex justify-content-between align-items-center">
			                          <div class="fs-sm pe-1"><h6>Produk/Jasa</h6></div><h6><i class="fas fa-angle-right ms-2 me-1"></i></h6>
			                        </div>
			                      </div>
			                    </div>
			            	</div>
			            </div>
			        </a>
	            </div>
      		</div>
  		</div>
      
      <div class="col-lg-3 order-lg-2">

      	<!-- Event -->
	    <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
          <h3 class="widget-title text-nowrap">Event yang akan datang</h3>
          <!-- <p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="#" style="text-decoration: none;">Lainnya<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p> -->
        </div>
        
      </div>
    </div>
  </section>

  <!-- Subscribe CTA-->
  <!-- <section class="bg-gradient position-relative pt-6 pb-5 py-sm-6">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-size-cover" style="background-image: url(img/demo/booking/bg-pattern02.png);"></div>
    <div class="position-relative zindex-5 container pb-3 pt-sm-2">
    	<div class="row">
            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
              <div style="background-color: white; border-radius: 50%; width: 105px; height: 105px;" class="position-relative">
          		<div class="position-absolute" style="top: 55%; left: 50%; -ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">
          			<h1 class="display-4" style="background: -webkit-radial-gradient(#BC9226, #FECB65); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">11</h1>
          		</div>
              </div>
            </div>
            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
              <div class="px-2 text-center"><img class="bg-light rounded-circle mb-2" src="{{ asset('homepage/images/cari-1.png') }}" alt="Cari" width="105">
                <p class="fs-sm fw-medium text-light mb-0 pt-1">Direktori dan pencarian data pelaku Ekraf</p>
              </div>
            </div>
            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
              <div class="px-2 text-center"><img class="bg-light rounded-circle mb-2" src="{{ asset('homepage/images/event-1.png') }}" alt="Event" width="105">
                <p class="fs-sm fw-medium text-light mb-0 pt-1">Informasi event Ekonomi kreatif</p>
              </div>
            </div>
          </div>
    </div>
  </section> -->

@stop