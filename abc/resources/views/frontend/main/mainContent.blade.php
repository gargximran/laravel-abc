@extends('frontend.frontend_master')
@section('title')
@endsection
@section('mainContent')
<!-- banner part start -->
<section class="banner wow fadeIn" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url({{ asset('public/frontend/images/Shape1.png') }});">
    <div class="container">
        <div class="row banner-row">

            <!-- slider start -->
            <div class="banner-carousel owl-carousel owl-theme">

                <!-- item start -->

                @foreach($sliders as $slider)
                <div class="item">
                    <div class="col-md-12">
                        <div class="row">
                            <!-- right part start -->
                            <div class="col-md-6 for-mob bounceInDown" data-wow-duration="1s" data-wow-delay="2s">
                                <img src="{{ asset('public/images/slider_image/'.$slider->image) }}" class="img-fluid">
                            </div>
                            <!-- right part end -->

                            <!-- left part start -->
                            <div class="col-md-6 ">
                                <h1>{{$slider->title}} <span>{{$slider->red_text}}</span></h1>
                                <p>{{$slider->description}}.</p>

                                <form action="nothibng">
                                    <div class="form-group search-product">
                                        <input type="text" class="form-control" placeholder="Search your products" name="">
                                        <button type="submit" class="search-btn">Search</button>
                                    </div>
                                </form>
                            </div>
                            <!-- left part end -->

                            <!-- right part start -->
                            <div class="col-md-6 for-pc wow bounceInDown" data-wow-duration="1s" data-wow-delay="2s">
                                <img src="{{ asset('public/images/slider_image/'.$slider->image) }}" class="img-fluid">
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
<section class="second-section section-padding wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
    <div class="container">
        <div class="row">

            <!-- left part start -->
            <div class="col-md-7">
                <div class="row">

                    <!-- left image div start -->
                    <div class="col-md-6 shrape-div left-div wow bounceInLeft" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url(public/frontend/images/design_1.png);">
                        <div>
                            <div class="shrape-div-text">
                                <h2>{{ App\HomeSectionTwo::first()->first_card_title}}</h2>
                                <p>{{ App\HomeSectionTwo::first()->first_card_subtitle}}</p>
                            </div>
                        </div>
                        <div class="shrape-div-img">
                            <img src="{{asset('public/images/website/'.App\HomeSectionTwo::first()->first_card_image)}}" class="img-fluid">
                        </div>
                    </div>
                    <!-- left image div end -->

                    <!-- right image div start -->
                    <div class="col-md-6">
                        <div class="row">

                            <!-- top image div start -->
                            <div class="col-md-12 shrape-div top-div wow bounceInDown" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url(public/frontend/images/design_1.png);">
                                <div class="shrape-div-text">
                                    <h2>{{ App\HomeSectionTwo::first()->second_card_title}}</h2>
                                    <p>{{ App\HomeSectionTwo::first()->second_card_subtitle}}</p>
                                </div>
                                <div class="shrape-div-img">
                                    <img src="{{asset('public/images/website/'.App\HomeSectionTwo::first()->second_card_image)}}" class="img-fluid">
                                </div>
                            </div>
                            <!-- top image div end -->

                            <!-- bottom image div start -->
                            <div class="col-md-12 shrape-div wow bounceInUp" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url(public/frontend/images/design_1.png);">
                                <div class="shrape-div-text">
                                    <h2>{{ App\HomeSectionTwo::first()->third_card_title}}</h2>
                                    <p>{{ App\HomeSectionTwo::first()->third_card_subtitle}}</p>
                                </div>
                                <div class="shrape-div-img">
                                <img src="{{asset('public/images/website/'.App\HomeSectionTwo::first()->third_card_image)}}" class="img-fluid">
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
                    <h2>{{ App\HomeSectionTwo::first()->forth_card_title}}</h2>
                    <p>{{ App\HomeSectionTwo::first()->forth_card_subtitle}}</p>
                </div>
            </div>
            <!-- right part end -->

        </div>
    </div>
</section>
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
                <div class="item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.5s">
                    <div class="col-md-12">
                        <div class="third-section-left">
                            <div class="row">
                                <!-- left -->
                                <div class="col-md-6 img-box">
                                    <img src="{{asset('public/frontend/images/fan2.png')}}" class="img-fluid">
                                </div>

                                <!-- right -->
                                <div class="col-md-6 right">
                                    <h2>AARAM 36”</h2>
                                    <ul>
                                        <li>Since 2012 </li>
                                        <li>Elegant Design </li>
                                        <li>Aerodynamic </li>
                                        <li>3 Years Replacement Guranted </li>
                                    </ul>
                                    <p>1500 tk</p>
                                    <a href="">
                                        know more
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left part end -->

                <!-- item part start -->
                <div class="item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.5s">
                    <div class="col-md-12">
                        <div class="third-section-left">
                            <div class="row">
                                <!-- left -->
                                <div class="col-md-6 img-box">
                                    <img src="{{asset('public/frontend/images/fan2.png')}}" class="img-fluid">
                                </div>

                                <!-- right -->
                                <div class="col-md-6 right">
                                    <h2>AARAM 36”</h2>
                                    <ul>
                                        <li>Since 2012 </li>
                                        <li>Elegant Design </li>
                                        <li>Aerodynamic </li>
                                        <li>3 Years Replacement Guranted </li>
                                    </ul>
                                    <p>1500 tk</p>
                                    <a href="">
                                        know more
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left part end -->

                <!-- item part start -->
                <div class="item">
                    <div class="col-md-12">
                        <div class="third-section-left">
                            <div class="row">
                                <!-- left -->
                                <div class="col-md-6 img-box">
                                    <img src="{{asset('public/frontend/images/fan2.png')}}" class="img-fluid">
                                </div>

                                <!-- right -->
                                <div class="col-md-6 right">
                                    <h2>AARAM 36”</h2>
                                    <ul>
                                        <li>Since 2012 </li>
                                        <li>Elegant Design </li>
                                        <li>Aerodynamic </li>
                                        <li>3 Years Replacement Guranted </li>
                                    </ul>
                                    <p>1500 tk</p>
                                    <a href="">
                                        know more
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left part end -->

                <!-- item part start -->
                <div class="item">
                    <div class="col-md-12">
                        <div class="third-section-left">
                            <div class="row">
                                <!-- left -->
                                <div class="col-md-6 img-box">
                                    <img src="{{asset('public/frontend/images/fan2.png')}}" class="img-fluid">
                                </div>

                                <!-- right -->
                                <div class="col-md-6 right">
                                    <h2>AARAM 36”</h2>
                                    <ul>
                                        <li>Since 2012 </li>
                                        <li>Elegant Design </li>
                                        <li>Aerodynamic </li>
                                        <li>3 Years Replacement Guranted </li>
                                    </ul>
                                    <p>1500 tk</p>
                                    <a href="">
                                        know more
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left part end -->

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
                @foreach($clientReviews as $review)
                <div class="item">
                    <div class="col-md-12">
                        <div class="testimonial-item">
                            <p class="t-qoute">
                                "{{$review->review}}"
                                <img src="{{ asset('public/frontend/images/diamond.png') }}" class="img-fluid">
                            </p>
                            <div class="testimonial-item-bottom">
                                <div class="row">
                                    <!-- image part start -->
                                    <div class="col-md-3">
                                        <div class="testimonial-item-bottom-left">
                                            @if($review->image)
                                            <img src="{{ asset('public/images/client_image/'.$review->image) }}" class="img-fluid">
                                            @else
                                            <img src="{{ asset('public/frontend/images/user.jpg') }}" class="img-fluid">
                                            @endif
                                        </div>
                                    </div>
                                    <!-- image part end -->

                                    <!-- info part start -->
                                    <div class="col-md-9">
                                        <div class="testimonial-item-bottom-right">
                                            <p>
                                                <span>{{$review->name}}</span>
                                            </p>
                                            <p>{{$review->position}} @if($review->company_name) at @endif {{$review->company_name}}</p>
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




@endsection