@extends('frontend.template.layout')

@section('body-content')
<!-- about part start -->
<section class="banner about-banner wow fadeIn" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url({{ asset('frontend/images/Shape1.png') }});" >
	<div class="container">
		<div class="row banner-row">

			<!-- slider start -->
			<div class="about-carousel owl-carousel owl-theme">
    			
				<!-- item start -->
				@foreach( $banners as $banner )
    			<div class="item">
    				<div class="col-md-12">
    					<div class="row">
    						<!-- left part start -->
    						<div class="col-md-12">
    							<h1>{{ $banner->title }}</h1>
    						</div>
    						<!-- left part end -->
    					</div>
    				</div>
    			</div>
    			<!-- item end -->

    			@endforeach

    		</div>
    		<!-- slider end -->

		</div>
	</div>
</section>
<!-- about part end -->


<!-- second section start -->
@foreach( $abcinfos as $abcinfo )
<section class="about-second section-padding wow fadeIn" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url({{ asset('frontend/images/about.png') }});" >
	<div class="container">
		<div class="row">
			<!-- left part start -->
			<div class="col-md-6">
				<div class="left wow bounceInDown" data-wow-duration="1s" data-wow-delay="2s">
					<img src="{{ asset('images/abcinfo/' . $abcinfo->image) }}" class="img-fluid">
				</div>
			</div>
			<!-- left part end -->

			<!-- right part start -->
			<div class="col-md-6">
				<div class="right wow bounceInRight" data-wow-duration="1s" data-wow-delay="2s">
					<h2>what <span>abc</span> stand for</h2>
					<ul>
						<li><span>a</span> = {{ $abcinfo->a }}</li>
						<li><span>b</span> = {{ $abcinfo->b }}</li>
						<li><span>c</span> = {{ $abcinfo->c }}</li>
						<li>Over <span>{{ $abcinfo->year }} years</span> in electrical industries</li>
					</ul>
				</div>
			</div>
			<!-- right part end -->
		</div>
	</div>
</section>
@endforeach
<!-- second section end -->


<!-- about page slider start -->
@if( $clients->count() > 0 )
<section class="about-slider section-padding" style="background-image: url({{ asset('frontend/images/shape7.png') }}); ">
	<div class="container">
		<div class="row">
			<div class="about-carousel owl-carousel owl-theme">

				<!-- item start -->
				@foreach( $clients as $client )
    			<div class="item">
    				<div class="col-md-12">
    					<div class="row">
    						
    						<!-- left part start -->
    						<div class="col-md-6">
    							<div class="left">
    								
    								<h2>{{ $client->cName }}</h2>
    								<p><img src="{{ asset('frontend/images/qoute.png') }}">{{ $client->comments }} </p>
    								<a href="{{ $client->link }}">visit site</a>
    							</div>
    						</div>
    						<!-- left part end -->

    						<!-- right part start -->
    						<div class="col-md-6">
    							<div class="right">
    								<img src="{{ asset('images/client/' . $client->image ) }}" class="img-fluid">
    								<h1>izaz electronics</h1>
    							</div>
    						</div>
    						<!-- right part end -->

    					</div>
    				</div>
				</div>
				@endforeach
    			<!-- item end -->

    			

    		</div>
		</div>
	</div>
</section>
<!-- about page slider end -->
@else

@endif



<!-- team member start -->
<section class="about-member section-padding">
	<div class="container">

		<!-- title row start -->
        <div class="row title-row">
            <div class="col-md-12">
                <h2>team member</h2>
            </div>
        </div>
        <!-- title row end -->

		<div class="row member-carousel-row">
			<div class="member-carousel owl-carousel owl-theme">

				<!-- member item start -->
				@foreach($teams as $team)
    			<div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="1s">
    				<div class="col-md-12">
    					<div class="member-item">
    						<img src="{{ asset('images/team/'. $team->image) }}" class="img-fluid">
    						<h2>{{ $team->name }}</h2>
    						<p>{{ $team->designation }}</p>
    						<p>{{ $team->description }}.</p>
    						
    					</div>
    				</div>
    			</div>
    			<!-- member item start -->
				@endforeach
    		

    		

    		
    			<!-- member item start -->

    		</div>
		</div>
	</div>
</section>
<!-- team member end -->


<!-- third section start -->
<section class="about-third third-section section-padding" style="background-image: url({{ asset('frontend/images/shape2.png') }});">
	<div class="container">
		<div class="row wow bounceInUp" data-wow-duration="1" data-wow-delay="2s">
			<div class="col-md-8">
			    <h2>About ABC Electrical Industries Ltd</h2>
				<ul>
					@foreach( $industries as $industry )
					<li>• {{ $industry->information }}</li>
					@endforeach

				</ul>
			</div>
		</div>
	</div>
</section>
<!-- third section end -->


<!-- fourth section start -->
@foreach ($visions as $vision)
<section class="fourth-section section-padding">
	<div class="container">
		<div class="row">
			
			<!-- left part start -->
			<div class="col-md-6">
				<div class="left">
					<img src="{{ asset('frontend/images/shape3.png') }}" class="img-fluid right-img wow bounceInUp" data-wow-duration="1" data-wow-delay="1.5s">
					<img src="{{ asset('images/vision/'. $vision->image) }}" class="img-fluid main-img wow bounceIn" data-wow-duration="1" data-wow-delay="1.5s">
					<img src="{{ asset('frontend/images/dots.png') }}" class="img-fluid bottom-img wow bounceInDown" data-wow-duration="1" data-wow-delay="1.5s">
				</div>
			</div>
			<!-- left part end -->

			<!-- right part start -->
			<div class="col-md-6">
				<div class="right wow fadeIn" data-wow-duration="1" data-wow-delay="2s">
					<h2>Vision, Mission & Value</h2>
					<ul>
						<li>Vision= {{ $vision->vision }}</li>
						<li>Mission= {{ $vision->mission }}</li>
						<li>Values= {{ $vision->value }}</li>
					</ul>
					<a href="">shop</a>
				</div>
			</div>
			<!-- right part end -->

		</div>
	</div>
</section>
@endforeach
<!-- fourth section end -->


<!-- fifth section start -->
@foreach( $relations as $relation )
<section class="fifth-section section-padding">
	<div class="container">

		<!-- title row start -->
        <div class="row title-row">
            <div class="col-md-12 ">
                <h2>Our Relationship with Customer and Supplier</h2>
                <p>Caring About Customer and giving value</p>
            </div>
        </div>
        <!-- title row end -->

        <!-- bototm row start -->
        <div class="row relation-row">
        	
        	<!-- left part start -->
        	<div class="col-md-6 ">
        		<div class="left wow fadeIn" data-wow-duration="1" data-wow-delay="2s">
        			<h2 >{{ $relation->comments }} </h2>
        		</div>
        	</div>
        	<!-- left part end -->

        	<!-- right part start -->
        	<div class="col-md-6 ">
        		<div class="right">
	        		<img src="{{ asset('images/relation/'. $relation->image) }} " class="img-fluid wow bounceIn" data-wow-duration="1" data-wow-delay="1.5s">
	        	</div>
        	</div>
        	<!-- right part end -->

        </div>
        <!-- bototm row end -->

	</div>
</section>
@endforeach
<!-- fifth section end -->
@endsection