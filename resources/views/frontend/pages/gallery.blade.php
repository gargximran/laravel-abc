@extends('frontend.template.layout')
@section('body-content')
​
<!-- page indicator start -->
<section class="page-indicator">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul>
					<li>
						<a href="{{ url('/') }}">home</a>
					</li>
					<li>
						<a href="{{ route('gallery') }}">gallery</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- page indicator end -->
​
​
<!-- gallery section start -->
<section class="gallery section-padding">
	<div class="container">
​
		<!-- title row start -->
        <div class="row title-row">
            <div class="col-md-12">
                <h2>Company Photo & Videos</h2>
            </div>
        </div>
        <!-- title row end -->
​
        <!-- main gallery start -->
        <div class="row photo-gallery"> 

            <!-- gallery item start -->
            @foreach( $gallerys as $gallery )
            <div class="col-md-4">
                <div class="gallery-image">
                    <img src="{{ asset('images/gallery/' . $gallery->image ) }}" style="width:100%">
                    <div class="gallery-hover">
                        <p>
                            <i class="fas fa-eye show-gallery-popup" id="{{ $gallery->id }}"></i>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- gallery item end --> 

        </div>
        <!-- main gallery end -->

        <!-- gallery popup slideshow start -->
        <div class="gallery-slideshow">
            <div class="gallery-close">
                <i class="fas fa-times"></i>
            </div>
            <div class="container">
                <div class="row gallery-slideshow-row">
                    <div class="col-md-6 offset-md-3 slider">

                        <!-- item start -->
                        @foreach( $gallerys as $gallery )
                        <div class="gallery-popup-image  {{ $gallery->id }}">
                            <img src="{{ asset('images/gallery/' . $gallery->image ) }}" style="width:100%" >
                            <p>{{ $gallery->caption }}</p>
                        </div>
                        @endforeach
                        <!-- item end-->
                        
                        
                    </div>

                    <!-- slide change button start -->
                    <div class="col-md-12 slideshow-button">
                        <button class="previous" onclick="changeSlide('previous')">Previous</button>
                        <input type="button" class="start Slideshow" onclick="slideshow(this)" value="Start Slideshow" >
                        <button class="next" onclick="changeSlide('next')">Next</button>
                    </div>
                    <!-- slide change button end -->

                </div>
            </div>
        </div>
        <!-- gallery popup slideshow end -->
​
	</div>
</section>
<!-- gallery section end -->
​
@endsection 