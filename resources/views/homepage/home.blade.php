@extends('homepage.layouts.app')

@section('title')
Home | EKRAF Jambi
@endsection

@section('content')
      
  <!-- Page content-->
  <style type="text/css">
  	body {
  		background-color: #fcfbf8;
  	}
  </style>
  
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
	            <h1 class="text-light pb-1">Selamat Datang di website <br> Komite Ekonomi Kreatif Jambi</h1>
	            <p class="fs-lg text-light">Lawan Dampak COVID 19 dengan Ekonomi Kreatif.</p>
	          </div>
	        </div>
	    </div>
	    <div class="carousel-item">
	      <div class="bg-dark" style="display: flex; flex-direction: column; justify-content: center; height: 18.75rem; resize: vertical; overflow: auto;">
		    <div style="margin: 0; padding: 0 10vw;">
		      <div class="row align-items-center">
		        <div class="col-lg-5 offset-lg-1 order-lg-2 text-center text-lg-start">
		          <h3 class="text-light">Tentang Komite Ekonomi Kreatif Jambi</h3>
		          <p class="text-light mb-0">Komite Ekonomi Kreatif Jambi merupakan lembaga non struktural di Provinsi Jambi yang membantu Pemerintah Daerah di bidang Pengembangan dan Penerapan Ekonomi Kreatif.</p>
		          <a href="/profil-ekraf">Selengkapnya</a>
		        </div>
		        <div class="col-lg-6 order-lg-1 d-none d-lg-block">
		          <div class="row">
		            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
		              <div class="px-3 text-center"><img class="bg-light rounded-circle mb-2 daftar-img" alt="Daftar">
		                <p class="fs-sm fw-medium text-light mb-0 pt-1">Pendaftaran pelaku Ekraf Provinsi Jambi</p>
		              </div>
		            </div>
		            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
		              <div class="px-3 text-center"><img class="bg-light rounded-circle mb-2 cari-img" alt="Cari">
		                <p class="fs-sm fw-medium text-light mb-0 pt-1">Direktori pelaku Ekraf Provinsi Jambi</p>
		              </div>
		            </div>
		            <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
		              <div class="px-3 text-center"><img class="bg-light rounded-circle mb-2 event-img" alt="Event">
		                <p class="fs-sm fw-medium text-light mb-0 pt-1">Informasi event Ekonomi Kreatif</p>
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
  <section class="container py-5 mb-5 border-bottom">
  	<div class="row">
  		<div class="col-md-3 ps-md-3">
  			<div class="p-3 border rounded-3 bg-secondary">
  				<h5>Temukan Pelaku EKRAF di Jambi</h5>
		  		<form action="/pelaku-ekraf/search" method="get">
		  			<div class="mb-3 pb-1 w-100 mb-sm-4 me-sm-3">
			          <label class="form-label" for="from-destination">Nama Pelaku Ekraf</label>
			          <div class="input-group">
			          	<input type="text" class="form-control" name="nama_usaha" placeholder="Nama usaha/pemilik usaha">
			          </div>
			      </div>
			      <div class="mb-3 pb-1 w-100 mb-sm-4 me-sm-3">
			          <label class="form-label" for="to-destination">Wilayah</label>
			          <select class="form-select" name="kab">
			            <option value="">[Semua Wilayah]</option>
			            @foreach($kab as $k)
				            <option value="{{$k->id}}">{{$k->nama_kab_kota}}</option>
				        @endforeach
			          </select>
			        </div>
			        <div class="mb-3 pb-1 w-100 mb-sm-4 me-sm-3">
			          <label class="form-label" for="to-destination">Sektor</label>
			          <select class="form-select" id="to-destination">
			            <option value="">[Semua Sektor]</option>
			            @foreach($sektor as $s)
			            	<option value="{{$s->id}}">{{$s->nama_sektor}}</option>
			           	@endforeach
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
									  <img src="{{ asset('images/default_thumb_placeholder.jpg') }}"/>
									</div>
									@endif
					            	<!-- <span class="card-floating-text text-light fw-medium">Lihat detail usaha<i class="fas fa-angle-right align-middle fs-lg ms-3"></i></span> -->
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
	            				<h1 class="display-6 mb-1 text-gradient">{{ $kab_kota->count() }}</h1>
		        				<div>
		            				<h6 class="mb-0" style="font-size: 14px;">Wilayah</h6>
		            			</div>
	            			</div>
			            </div>
			            <div class="col-6 col-lg-3 align-items-center px-1 py-1 py-lg-0">
			            	<div class="border rounded-3 py-4 bg-light">
			            		<h1 class="display-6 mb-1 text-gradient">{{ $sektor->count() }}</h1>
		        				<div>
		            				<h6 class="mb-0" style="font-size: 14px">Sub Sektor</h6>
		            			</div>
			            	</div>
			            </div>
			            <div class="col-6 col-lg-3 align-items-center px-1 py-1 py-lg-0">
			            	<div class="border rounded-3 py-4 bg-light">
			            		<h1 class="display-6 mb-1 text-gradient">{{ $usaha->count() }}</h1>
		        				<div>
		            				<h6 class="mb-0" style="font-size: 14px">Pelaku Ekraf</h6>
		            			</div>
			            	</div>
			            </div>
			            <div class="col-6 col-lg-3 align-items-center px-1 py-1 py-lg-0">
			            	<div class="border rounded-3 py-4 bg-light">
			            		<h1 class="display-6 mb-1 text-gradient">{{ $produk->count() }}</h1>
		        				<div>
		            				<h6 class="mb-0" style="font-size: 14px">Produk</h6>
		            			</div>
			            	</div>
			            </div>
	            	</div>
		        </div>
		        <div class="col-lg-6 mt-4 mt-lg-1">
		        	<div class="text-center text-lg-start">
		        		<h6 class="fw-medium">Daftarkan usaha Anda dan jadilah bagian dari Ekonomi Kreatif Jambi</h6>
			        	<div>
			        		<a class="btn btn-gradient btn-sm border-0" href="/pendaftaran-pelaku-ekraf">Daftar sekarang</a>
			        		<a class="fs-sm fw-medium mx-3" style="text-decoration: none" href="/faqaboutekraf">Lihat cara daftar</a>
			        	</div>
		        	</div>
		        </div>
		    </div>
        </div>
    </div>
  </section>
  
  <section class="container">
  	<div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
		<h3 class="widget-title text-nowrap">Berita & Artikel</h3>
		<p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="/berita-info" style="text-decoration: none;">Lainnya<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p>
	</div>

  	<!-- Berita -->
  	<div class="row">
      	
        @foreach ($berita as $berita)
			@if($berita->published == 'Y') <!-- Tampilkan hanya yg status publish: Ya -->
				<!-- Post-->
				<div class="col-lg-3 mb-5 border-bottom">
					<article class="pb-4">
						<a href="/berita-info/read/{{ $berita->judul_seo }}">
						<div class="card mb-4 bg-size-cover" style="background-image: url({{ $berita->getThumbnailBerita() }}); height: 23vh; background-position: center;">
						</div>
						</a>
					    <h2 class="h4 nav-heading mb-2">
			        		<a href="/berita-info/read/{{ $berita->judul_seo }}">{{ $berita->judul }}</a>
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

					    <div class="mb-2">
				            <div class="mb-0 fs-sm">
				            	{!! Str::limit($berita->isi, 150, ' ...') !!} &nbsp;&nbsp;
				            	<a href="/berita-info/read/{{ $berita->judul_seo }}" class="fancy-link">Selengkapnya</a>
				            </div>
				        </div>
					</article>
				</div>
			@endif
		@endforeach
		
  	</div>
  </section>

  <section class="container mb-5 pb-5 border-bottom">
  	<!-- Galeri & Event -->
  	<div class="row">
  		<!-- Galeri -->
      	<div class="col-lg-4 mb-5 mb-lg-0">
      		<div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
	          <h3 class="widget-title text-nowrap">Galeri</h3>
	          <!-- <p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="#" style="text-decoration: none;">Lainnya<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p> -->
	        </div>

	        <div class="border-0 rounded-3 mb-3" style="overflow: hidden;">
	        	<div class="row gallery g-1" style="min-width: 102%">
				@if(count($foto) != 0)
					<div class="alert alert-danger"><center>Tidak ada Foto</center></div>
				@else
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
				 @endif
				</div>
	        </div>

	        <!-- <div>
	        	<div class="w-100">
                    <div class="d-flex justify-content-between align-items-center px-5 px-lg-0">
						<a href="#" class="btn-social bs-facebook bs-lg">
						  <i class="fab fa-facebook-f"></i>
						</a>

						<a href="#" class="btn-social bs-twitter bs-lg">
						  <i class="fab fa-twitter"></i>
						</a>

						<a href="#" class="btn-social bs-instagram bs-lg">
						  <i class="fab fa-instagram"></i>
						</a>

						<a href="#" class="btn-social bs-youtube bs-lg">
						  <i class="fab fa-youtube"></i>
						</a>
                    </div>
                </div>
	        </div> -->
  		</div>

  		<!-- Event -->
  		<div class="col-lg-8">
  			<div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
	          <h3 class="widget-title text-nowrap">Event yang akan datang</h3>
	          <p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="/acara" style="text-decoration: none;">Semua event<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p>
	        </div>

	        <div class="accordion" id="accordionExample">
	        	@if($jmlevent == 0)
					<div class="alert alert-danger"><center>Event Tidak ditemukan</center></div>
				@else
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
				@endif
	    	</div>
  		</div>
  	</div>
  </section>
  <section class="container">
  	<div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
		<h3 class="widget-title text-nowrap">Video</h3>
		<p class="fs-sm fw-medium ps-md-4"><a class="text-nowrap" href="/galery/video" style="text-decoration: none;">Lainnya<i class="fas fa-angle-right align-middle fs-lg ms-2"></i></a></p>
	</div>

  	<!-- Berita -->
  	<div class="row">
    	@foreach ($video as $v)
		<!-- Post-->
		<div class="col-lg-6 mb-5 border-bottom">
			<article class="pb-4">
				
				<iframe width="560" height="315" src="{{$v->link_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				
			    <h2 class="h4 nav-heading mb-2">
	        		<a href="{{$v->link_video}}" target="_blank">{{$v->judul}}</a>
	        	</h2>
	        	
			</article>
		</div>
		@endforeach
		
  	</div>
  </section>
	<!-- FAQ -->
	<!--<section class="container">
		<span id="faq" style="position: relative; top: -120px; visibility: hidden;"></span>
		<div class="mb-5">
			<div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
	          <h3 class="widget-title text-nowrap">FAQ</h3>
	        </div>

	        <div class="accordion" id="faq">
	        	@foreach ($faq as $faq)
	        		<div class="accordion-item shadow bg-white">
		                <h2 class="accordion-header" id="faq-heading-{{ $faq->urutan }}">
		                 	<button class="accordion-button @if($faq->urutan != '1') collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $faq->urutan }}" aria-expanded="{{ $faq->urutan === '1' ? 'true' : 'false' }}" aria-controls="faq-content-{{ $faq->urutan }}">
		                		{!! $faq->pertanyaan !!}
		                	</button>
		                </h2>
		                <div class="accordion-collapse collapse @if($faq->urutan == '1') show @endif" id="faq-content-{{ $faq->urutan }}" aria-labelledby="faq-heading-{{ $faq->urutan }}" data-bs-parent="#faq">
		                  <div class="accordion-body">
		                    <div class="fs-sm">
		                    	{!! $faq->jawaban !!}
		                    </div>
		                  </div>
		                </div>
		            </div>
	        	@endforeach
	        </div>

         <div class="px-md-3">
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
        </div> 
		</div>
	</section>-->

@stop