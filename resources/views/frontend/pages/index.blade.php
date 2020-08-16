@extends('frontend.template.layout')

@section('body-content')
<!-- banner part start -->
<section class="banner wow fadeIn" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url({{ asset('frontend/images/Shape1.png') }});" >
	<div class="container">
		<div class="row banner-row">

			<!-- slider start -->
			<div class="banner-carousel owl-carousel owl-theme">
    			
                <!-- item start -->
                @foreach( $homebanners as $homebanner )
    			<div class="item">
    				<div class="col-md-12">
    					<div class="row">
    						<!-- right part start -->
    						<div class="col-md-6 for-mob bounceInDown" data-wow-duration="1s" data-wow-delay="2s">
    							<img src="{{ asset('images/banner/' . $homebanner->image) }}" class="img-fluid">
    						</div>
    						<!-- right part end -->

    						<!-- left part start -->
    						<div class="col-md-6 ">
    							<h1>{{ $homebanner->title }}</h1>
    							<p>{{ $homebanner->description }}.</p>
    							<a href="{{ $homebanner->link }}">Know more </a>
                                <form action="{{route('search')}}" method="get">
                                    <div class="form-group search-product">
                                        <input type="text" class="form-control" placeholder="Search your products"  name="search">
                                        <button type="submit" class="search-btn">Search</button>
                                    </div>
                                </form>
    						</div>
    						<!-- left part end -->

    						<!-- right part start -->
    						<div class="col-md-6 for-pc wow bounceInDown" data-wow-duration="1s" data-wow-delay="2s">
    							<img src="{{ asset('images/banner/' . $homebanner->image) }}" class="img-fluid">
    						</div>
    						<!-- right part end -->
    					</div>
    				</div>
                </div>
                @endforeach
    			<!-- item end -->

            </div>
            
    		<!-- slider end -->

		</div>
	</div>
</section>
<!-- banner part end -->



<!-- second section start -->
@foreach( $homedisplays as $homedisplay)
<section class="second-section section-padding wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
    <div class="container">
        <div class="row">
             
            <!-- left part start -->
            <div class="col-md-7">
                <div class="row">
                    
                    <!-- left image div start -->
                    <div class="col-md-6 shrape-div left-div wow bounceInLeft" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url({{ asset('frontend/images/design_1.png') }});">
                        <div>
                            <div class="shrape-div-text">
                                <h2>{{ $homedisplay->titleOne }}</h2>
                                <p>{{ $homedisplay->descriptionOne }}</p>
                            </div>
                        </div>
                        <div class="shrape-div-img">
                            <img src="{{ asset('images/homedisplay/' . $homedisplay->imageOne) }}" class="img-fluid">
                        </div>
                    </div>
                    <!-- left image div end -->

                    <!-- right image div start -->
                    <div class="col-md-6">
                        <div class="row">
                            
                            <!-- top image div start -->
                            <div class="col-md-12 shrape-div top-div wow bounceInDown" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url({{ asset('frontend/images/design_1.png') }});">
                                <div class="shrape-div-text">
                                    <h2>{{ $homedisplay->titleTwo }}</h2>
                                    <p>{{ $homedisplay->descriptionTwo }}</p>
                                </div>
                                <div class="shrape-div-img">
                                    <img src="{{ asset('images/homedisplay/' . $homedisplay->imageTwo) }}" class="img-fluid">
                                </div>
                            </div>
                            <!-- top image div end -->

                            <!-- bottom image div start -->
                            <div class="col-md-12 shrape-div wow bounceInUp" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url({{ asset('frontend/images/design_1.png') }});">
                                <div class="shrape-div-text">
                                    <h2>{{ $homedisplay->titleThree }}</h2>
                                    <p>{{ $homedisplay->descriptionThree }}</p>
                                </div>
                                <div class="shrape-div-img">
                                    <img src="{{ asset('images/homedisplay/' . $homedisplay->imageThree) }}" class="img-fluid">
                                </div>
                            </div>
                            <!-- bottom image div end -->

                        </div>                        
                    </div>
                    <!-- right image div end -->

                </div>
            </div>
            <!-- left part end -->

            <!-- right part start -->
            <div class="col-md-5 second-section-right wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
                <div class="second-section-right-box">
                    <h2>{{ $homedisplay->title }}</h2>
                    <p>{{ $homedisplay->description }}.</p>
                </div>
            </div>
            <!-- right part end -->

        </div>
    </div>
</section>
@endforeach
<!-- second section end -->



<!-- third section start -->
<section class="third-section section-padding">
    <div class="container">

        <!-- title row start -->
        <div class="row title-row">
            <div class="col-md-12">
                <h2>We Have Lots Of Excellent & High Quality Product</h2>
            </div>
        </div>
        <!-- title row end -->

        <div class="row third-section-bottom-row">
            <div class="home-product-carousel owl-carousel owl-theme">


                <!-- item part start -->
                @foreach ($exclusiveProducts as $exclusiveItem)
                <div class="item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.5s">
                    <div class="col-md-12">
                        <div class="third-section-left">
                            <div class="row">
                                <!-- left -->
                                <div class="col-md-6 img-box">
                                    <img src="{{ asset('images/product/'.$exclusiveItem->image[0]->name) }}" class="img-fluid">
                                </div>

                                <!-- right -->
                                <div class="col-md-6 right">
                                    <h2>{{$exclusiveItem->name}}</h2>
                                    <ul>
                                        <li>{{__('Size : ').$exclusiveItem->size}} </li>
                                        <li>{{__('Brand : ').$exclusiveItem->brand}} </li>
                                        <li>{{__('Model : ').$exclusiveItem->model}} </li>
                                        <li>3 Years Replacement Guranted </li>
                                    </ul>
                                    @if ($exclusiveItem->offer_price)
                                        <p>{{$exclusiveItem->offer_price}} tk</p>
                                        @else
                                        <p>{{$exclusiveItem->regular_price}} tk</p>
                                    @endif
                                    
                                    <a href="#">
                                        know more
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left part end -->
                @endforeach

              


            </div>

        </div>
    </div>
</section>
<!-- third section end -->


<!-- testimonial section start -->
<section class="testimonial section-padding wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
    <div class="container">
        
        <!-- title row start -->
        <div class="row title-row">
            <div class="col-md-12">
                <h2>What Our Client Think About Us</h2>
                <i class="fas fa-quote-left"></i>
            </div>
        </div>
        <!-- title row end -->

        <!-- testimonial row start -->
        <div class="row">
            <!-- slider start -->
            <div class="testimonial-carousel owl-carousel owl-theme">
                
                <!-- testimonial item start -->
                @foreach( $testimonials as $testimonial )
                <div class="item">
                    <div class="col-md-12">
                        <div class="testimonial-item">
                            <p class="t-qoute">
                                {{ $testimonial->comments }}
                                <img src="{{ asset('frontend/images/diamond.png') }}" class="img-fluid">
                            </p>
                            <div class="testimonial-item-bottom">
                                <div class="row">
                                    <!-- image part start -->
                                    <div class="col-md-3">
                                        <div class="testimonial-item-bottom-left">
                                            <img src="{{ asset('images/testimonial/' . $testimonial->image) }}" class="img-fluid">
                                        </div>
                                    </div>
                                    <!-- image part end -->

                                    <!-- info part start -->
                                    <div class="col-md-9">
                                        <div class="testimonial-item-bottom-right">
                                            <p>
                                                <span>{{ $testimonial->name }}</span>
                                            </p>
                                            <p>{{ $testimonial->designation }}</p>
                                        </div>
                                    </div>
                                    <!-- info part end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- testimonial item end -->

            </div>
            <!-- slider end -->
        </div>
        <!-- testimonial row end -->

    </div>
</section>
<!-- testimonial section end -->


<!-- map section start -->
<section class="map wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
    <div class="container-fluid">
        <div class="row">
            
            <!-- left part start -->
            <div class="col-md-6" style="background-image: url({{ asset('frontend/images/map.png') }});">
                <div class="map-left">
                    <img src="{{ asset('frontend/images/map-icon.png') }}">
                    <div class="map-left-bottom">
                        <div class="row">
                            <div class="col-md-5 left">
                                
                            </div>

                            <div class="col-md-7 right">
                                @foreach( $contactinfos as $contactinfo )
                                <p>
                                    {{ $contactinfo->address }}
                                </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left part end -->

            <!-- right part start -->
            <div class="col-md-6 map-right" style="background-image: url({{ asset('frontend/images/footerfan.png') }});">
                <h2>Your Best Experience with us.</h2>
            </div>
            <!-- right part end -->

        </div>
    </div>
</section>
<!-- map section end -->
@endsection