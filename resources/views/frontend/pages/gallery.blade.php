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
        <!-- Ph oto Grid -->
        <div class="row photo-gallery"> 
          <div class="column">
            <div class="gallery-image">
                <img src="{{ asset('frontend/images/gallery-3.png') }}" style="width:100%">
                <div class="gallery-hover">
                    <a href="{{ asset('frontend/images/gallery-3.png') }}" data-fancybox data-caption="">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </div>
          </div>
​
          <div class="column">

            <div class="gallery-image">
                <img src="{{ asset('frontend/images/gallery-2.png') }}" style="width:100%">
                <div class="gallery-hover">
                    <a href="{{ asset('frontend/images/gallery-2.png') }}" data-fancybox data-caption="">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </div>
          </div>
​
          <div class="column">
            <div class="gallery-image">
                <img src="{{ asset('frontend/images/gallery-4.png') }}" style="width:100%">
                <div class="gallery-hover">
                    <a href="{{ asset('frontend/images/gallery-4.png') }}" data-fancybox data-caption="">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </div>

          </div>
        </div>
        <!-- main gallery end -->
​
	</div>
</section>
<!-- gallery section end -->
​
@endsection 