@extends('homepage.layouts.app')

@section('title')
Homepage | EKRAF Jambi
@endsection

@section('content')
      
  <!-- Page content-->
  <div class="container mt-7 mb-2">
  	<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
	    <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
	    <!-- <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li> -->
	  </ol>
	  <div class="carousel-inner rounded-3" style="overflow: hidden;">
	  	<div class="carousel-item active" style="height: 18.75rem">
	      	<div class="bg-gradient py-7">
	      	  <div class="position-absolute top-0 start-0 w-100 h-100 bg-size-cover bg-position-center" style="background-image: url({{ asset('homepage/images/banner-1.jpg') }});">
		      </div>
	          <div class="position-relative container text-center">
	            <h1 class="text-light pb-1">Selamat datang di website EKRAF Jambi</h1>
	            <p class="fs-lg text-light">Makes it easier to experience the world.</p>
	          </div>
	        </div>
	    </div>
	    <div class="carousel-item">
	      <div class="bg-dark" style="display: flex; flex-direction: column; justify-content: center; height: 18.75rem; resize: vertical; overflow: auto;">
		    <div style="margin: 0; padding: 0 10vw;">
		      <div class="row align-items-center">
		        <div class="col-lg-5 offset-lg-1 order-lg-2 text-center text-lg-start">
		          <h2 class="text-light">Tentang EKRAF Jambi</h2>
		          <p class="text-light mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
		          <br>
		          <a href="#" class="fancy-link">Selengkapnya</a>
		        </div>
		        <div class="col-lg-6 order-lg-1 d-none d-lg-block">
		          <div class="row">
		            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
		              <div class="px-3 text-center"><img class="bg-light rounded-circle mb-2 daftar-img" alt="Daftar">
		                <p class="fs-sm fw-medium text-light mb-0 pt-1">Pendaftaran pemilik usaha sebagai pelaku Ekraf</p>
		              </div>
		            </div>
		            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
		              <div class="px-3 text-center"><img class="bg-light rounded-circle mb-2 cari-img" alt="Cari">
		                <p class="fs-sm fw-medium text-light mb-0 pt-1">Direktori dan pencarian data pelaku Ekraf</p>
		              </div>
		            </div>
		            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
		              <div class="px-3 text-center"><img class="bg-light rounded-circle mb-2 event-img" alt="Event">
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
  			<div class="p-3 border rounded-3 bg-secondary">
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
              <p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="/data-pelaku-ekraf" style="text-decoration: none;">Selengkapnya<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p>
            </div>
        	<div class="tns-carousel-wrapper pb-5 pb-lg-0">
        		<div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 4, &quot;controls&quot;: false, &quot;gutter&quot;: 23, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;300&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;900&quot;:{&quot;items&quot;:4}}}">

        		<!-- <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 4, &quot;nav&quot;: false, &quot;gutter&quot;: 23, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;300&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;900&quot;:{&quot;items&quot;:4}}}"> -->
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

        	<!-- Statistik & CTA -->
        	<div class="row">
	            <div class="col-lg-6">
	            	<div class="row text-center px-2">
	            		<div class="col-6 col-lg-3 align-items-center px-1 py-1 py-lg-0">
	            			<div class="border rounded-3 py-4 bg-light">
	            				<h1 class="display-6 mb-1 text-gradient">11</h1>
		        				<div>
		            				<h6 class="mb-0" style="font-size: 14px;">Wilayah</h6>
		            			</div>
	            			</div>
			            </div>
			            <div class="col-6 col-lg-3 align-items-center px-1 py-1 py-lg-0">
			            	<div class="border rounded-3 py-4 bg-light">
			            		<h1 class="display-6 mb-1 text-gradient">17</h1>
		        				<div>
		            				<h6 class="mb-0" style="font-size: 14px">Sub Sektor</h6>
		            			</div>
			            	</div>
			            </div>
			            <div class="col-6 col-lg-3 align-items-center px-1 py-1 py-lg-0">
			            	<div class="border rounded-3 py-4 bg-light">
			            		<h1 class="display-6 mb-1 text-gradient">19</h1>
		        				<div>
		            				<h6 class="mb-0" style="font-size: 14px">Usaha</h6>
		            			</div>
			            	</div>
			            </div>
			            <div class="col-6 col-lg-3 align-items-center px-1 py-1 py-lg-0">
			            	<div class="border rounded-3 py-4 bg-light">
			            		<h1 class="display-6 mb-1 text-gradient">45</h1>
		        				<div>
		            				<h6 class="mb-0" style="font-size: 14px">Produk</h6>
		            			</div>
			            	</div>
			            </div>
	            	</div>
		        </div>
		        <div class="col-lg-6 mt-4 mt-lg-1">
		        	<div class="text-center text-lg-start">
		        		<h6 class="fw-medium">Daftarkan usaha Anda dan jadilah bagian dari komunitas Ekraf Jambi</h6>
			        	<div>
			        		<a class="btn btn-gradient btn-sm border-0" href="/pendaftaran-pelaku-ekraf">Daftar sekarang</a>
			        		<a class="fs-sm fw-medium mx-3" style="text-decoration: none" href="#faq">Lihat cara daftar</a>
			        	</div>
		        	</div>
		        </div>
		    </div>
        </div>
    </div>
  </section>
  
  <!-- Berita -->
  <section class="container py-5">
  	<!-- <h3 class="mb-4 pb-3">Berita & Event Ekraf</h3> -->
  	<div class="row">

        <!-- Content-->
      	<div class="col-lg-6 order-lg-2">
	      	<div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
	          <h3 class="widget-title text-nowrap">Berita & Artikel</h3>
	          <p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="/berita-info" style="text-decoration: none;">Lainnya<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p>
	        </div>
	        
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

      	<div class="col-lg-3 order-lg-1">
      		<!-- Galeri-thumbnail -->
      		<div class="mb-5 pt-4 pt-lg-0">
      			<div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
		          <h3 class="widget-title text-nowrap">Galeri</h3>
		          <!-- <p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="#" style="text-decoration: none;">Lainnya<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p> -->
		        </div>

		        <div class="border-0 rounded-3 mb-3" style="overflow: hidden;">
		        	<div class="row gallery g-1" style="min-width: 102%">
					
					  @foreach ($foto as $foto)
					  	<div class="col-4">
						    <a href="{{ $foto->getImageFoto() }}" class="gallery-item" data-sub-html='<h5 class="fw-light text-light">{{ $foto->keterangan }}</h5>'>
						      	<div class="galeri-thumbnail">
								  <img src="{{ $foto->getThumbnailFoto() }}"/>
								</div>
						      <!-- <span class="gallery-caption">{{ $foto->keterangan }}</span> -->
						    </a>
						  </div>
					  @endforeach

					</div>
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
  			

      		<!-- FAQ -->
      		<span id="faq" style="position: relative; top: -120px; visibility: hidden;"></span>
      		<div class="mb-5">
      			<div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
		          <h3 class="widget-title text-nowrap">FAQ</h3>
		        </div>

		        <div class="accordion" id="faq">
		        	@foreach ($faq as $faq)
		        		<div class="accordion-item shadow">
			                <h2 class="accordion-header" id="faq-heading-{{ $faq->urutan }}">
			                 	<button class="accordion-button @if($faq->urutan != '1') collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $faq->urutan }}" aria-expanded="{{ $faq->urutan === '1' ? 'true' : 'false' }}" aria-controls="faq-content-{{ $faq->urutan }}">
			                		{{ $faq->pertanyaan }}
			                	</button>
			                </h2>
			                <div class="accordion-collapse collapse @if($faq->urutan == '1') show @endif" id="faq-content-{{ $faq->urutan }}" aria-labelledby="faq-heading-{{ $faq->urutan }}" data-bs-parent="#faq">
			                  <div class="accordion-body">
			                    <div class="fs-sm">
			                    	{{ $faq->jawaban }}
			                    </div>
			                  </div>
			                </div>
			            </div>
		        	@endforeach
	            </div>

	            <!-- <div class="px-md-3">
	            	<a href="#" style="text-decoration: none;">
		            	<div class="card mb-3">
			            	<div class="card-body text-center pb-3">
			            		<div class="d-flex align-items-center">
			            			<h1 class="display-5 text-gradient">11</h1>
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
			            			<h1 class="display-5 text-gradient">17</h1>
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
			            			<h1 class="display-5 text-gradient">45</h1>
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
			            			<h1 class="display-5 text-gradient">19</h1>
			                      <div class="w-100 ps-2 ms-2">
			                        <div class="d-flex justify-content-between align-items-center">
			                          <div class="fs-sm pe-1"><h6>Produk/Jasa</h6></div><h6><i class="fas fa-angle-right ms-2 me-1"></i></h6>
			                        </div>
			                      </div>
			                    </div>
			            	</div>
			            </div>
			        </a>
	            </div> -->
      		</div>
  		</div>
      
      <div class="col-lg-3 order-lg-2">

      	<!-- Event -->
	    <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
          <h3 class="widget-title text-nowrap">Event yang akan datang</h3>
          <!-- <p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="#" style="text-decoration: none;">Lainnya<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p> -->
        </div>

        <div class="accordion" id="accordionExample">
			<!-- Item -->
		    <div class="accordion-item card card-hover">
		    	<div class="d-flex">
		    		<div class="fs-sm p-2 bg-secondary" style="border-top-left-radius: 1rem; border-bottom-left-radius: 1rem; max-width: 3.75rem">
		    			<div class="text-center px-0 px-lg-1 py-1">
							<span class="d-sm-block text-primary" style="font-size: 1.685rem; line-height: 1.675rem">15</span>
							<span class="fs-sm text-muted text-uppercase">Mar</span>
						</div>
		    		</div>
		    		<div class="p-2">
		    			<div class="px-2" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
		    				<h6 class="nav-heading pt-1 fs-md fw-medium ">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h6>
		    			</div>

		    			<div class="accordion-collapse collapse px-2" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
		    				<p class="fs-sm mb-0">This is the first item's accordion body. It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.</p>
		    				<hr>
		    				<a href="#" class="btn btn-primary btn-sm mb-2">Lihat event</a>
		    			</div>
		    		</div>
		    	</div>
		  	</div>

		  	<!-- Item -->
		    <div class="accordion-item card card-hover">
		    	<div class="d-flex">
		    		<div class="fs-sm p-2 bg-secondary" style="border-top-left-radius: 1rem; border-bottom-left-radius: 1rem; max-width: 3.75rem">
		    			<div class="text-center px-0 px-lg-1 py-1">
							<span class="d-sm-block text-primary" style="font-size: 1.685rem; line-height: 1.675rem">27</span>
							<span class="fs-sm text-muted text-uppercase">Mar</span>
						</div>
		    		</div>
		    		<div class="p-2">
		    			<div class="px-2" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		    				<h6 class="nav-heading pt-1 fs-md fw-medium ">Lorem ipsum dolor sit amet.</h6>
		    			</div>

		    			<div class="accordion-collapse collapse px-2" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
		    				<p class="fs-sm mb-0">This is the first item's accordion body. It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.</p>
		    				<hr>
		    				<a href="#" class="btn btn-primary btn-sm mb-2">Lihat event</a>
		    			</div>
		    		</div>
		    	</div>
		  	</div>

			<div class="pt-3" style="float: right;">
	          <p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="#" style="text-decoration: none;">Semua event<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p>
	        </div>
    	</div>
    </div>
  </section>

@stop