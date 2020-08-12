@extends('user.master')
@section('title','SchoolSis')
@section('content')

{{-- jumbotron --}}
    <div class="hero-wrap" style="background-image: url('template/images/bg_1.jpg'); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
              <h1 class="my-5">DAFTARKAN DIRIMU !!</h1>
              <h2 style="color: rgb(243, 243, 243)">SMA/SMK Terbaik Dan Terfavorit Di Kota TANGERANG</h2>
              
              <p class="my-5">
				  <a href="{{ route('login') }}" class="btn btn-primary px-4 py-3 mr-2">SIGN IN</a>
                 <a href="{{ route('register') }}" class="btn btn-secondary px-4 py-3">SIGN UP</a>
			  </p>
			  <div class="text order-first" style="margin-top: 150px">
				<span class="date text-white">Aug 20, 2018</span>
				<h2 style="color: rgb(255, 255, 255); font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">SchoolSis adalah Platform</h2>
				<p class="text-white">Dimana kami merekomendasikan calon siswa-siswi untuk mendapatkan sekolah terbaik dan sesuai dengan nilai standart mereka.</p>
			</div>
            </div>
          </div>
        </div>
      </div>
    {{-- End jumbotron --}}

    {{-- Section 2 --}}
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-3 py-4 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center mb-3"><span class="flaticon-exam"></span></div>
              <div class="media-body px-3">
                <h3 class="heading">Admission</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-3 py-4 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center mb-3"><span class="flaticon-blackboard"></span></div>
              <div class="media-body px-3">
                <h3 class="heading">Notice Board</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-3 py-4 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center mb-3"><span class="flaticon-books"></span></div>
              <div class="media-body px-3">
                <h3 class="heading">Our Library</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>    
          </div>
        </div>
    	</div>
    </section>
    {{-- Section 2 --}}

    {{-- Section 3 --}}
    <section class="ftco-section-3 img" style="background-image: url(template/images/bg_3.jpg);">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row d-md-flex justify-content-center">
    			<div class="col-md-9 about-video text-center">
    				<h2 class="ftco-animate">Datanglah Dan Bawa Dokumen Lengkap Mu Kesekolah Yang Sudah Kami Rekomendasikan</h2>
    				<div class="video d-flex justify-content-center">
    					<a href="https://vimeo.com/45830194" class="button popup-vimeo d-flex justify-content-center align-items-center"><span class="ion-ios-play"></span></a>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    {{-- End Section 3 --}}
    {{-- Section 4 --}}
    <section class="ftco-counter bg-light" id="section-counter">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="10300">0</strong>
		                <span>Satisfied Students</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="7896">0</strong>
		                <span>Courses Completed</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="400">0</strong>
		                <span>Experts Advisors</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="200">0</strong>
		                <span>Schools</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>
    {{-- End Section 4 --}}

    
@endsection