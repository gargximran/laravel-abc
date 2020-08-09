@extends('frontend.template.layout')

@section('body-content')
<!-- banner part start -->
<section class="banner wow fadeIn" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url({{ asset('frontend/images/Shape1.png') }});" >
	<div class="container">
		<div class="row banner-row">

			<!-- slider start -->
			<div class="banner-carousel owl-carousel owl-theme">
    			
    			<!-- item start -->
    			<div class="item">
    				<div class="col-md-12">
    					<div class="row">
    						<!-- right part start -->
    						<div class="col-md-6 for-mob bounceInDown" data-wow-duration="1s" data-wow-delay="2s">
    							<img src="{{ asset('frontend/images/fan.png') }}" class="img-fluid">
    						</div>
    						<!-- right part end -->

    						<!-- left part start -->
    						<div class="col-md-6 ">
    							<h1>Accelerate your comfort with <span>ABC</span></h1>
    							<p>ABC ceiling fans generate powerful air movement that you can feel while remaining quiet and wobble free.</p>
    							<a href="">
    								know more
    							</a>
                                <form>
                                    <div class="form-group search-product">
                                        <input type="text" class="form-control" placeholder="Search your products" name="">
                                        <button type="submit" class="search-btn">Search</button>
                                    </div>
                                </form>
    						</div>
    						<!-- left part end -->

    						<!-- right part start -->
    						<div class="col-md-6 for-pc wow bounceInDown" data-wow-duration="1s" data-wow-delay="2s">
    							<img src="{{ asset('frontend/images/fan.png') }}" class="img-fluid">
    						</div>
    						<!-- right part end -->
    					</div>
    				</div>
    			</div>
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
                    <div class="col-md-6 shrape-div left-div wow bounceInLeft" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url({{ asset('frontend/images/design_1.png') }});">
                        <div>
                            <div class="shrape-div-text">
                                <h2>LED Bulb</h2>
                                <p>35% Off Offer</p>
                            </div>
                        </div>
                        <div class="shrape-div-img">
                            <img src="{{ asset('frontend/images/light.png') }}" class="img-fluid">
                        </div>
                    </div>
                    <!-- left image div end -->

                    <!-- right image div start -->
                    <div class="col-md-6">
                        <div class="row">
                            
                            <!-- top image div start -->
                            <div class="col-md-12 shrape-div top-div wow bounceInDown" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url({{ asset('frontend/images/design_1.png') }});">
                                <div class="shrape-div-text">
                                    <h2>Cilling Fan</h2>
                                    <p>Exclusive Design</p>
                                </div>
                                <div class="shrape-div-img">
                                    <img src="{{ asset('frontend/images/fan2.png') }}" class="img-fluid">
                                </div>
                            </div>
                            <!-- top image div end -->

                            <!-- bottom image div start -->
                            <div class="col-md-12 shrape-div wow bounceInUp" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url({{ asset('frontend/images/design_1.png') }});">
                                <div class="shrape-div-text">
                                    <h2>Switch Board</h2>
                                    <p>Premium Look</p>
                                </div>
                                <div class="shrape-div-img">
                                    <img src="{{ asset('frontend/images/switch.png') }}" class="img-fluid">
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
                    <h2>It's your life, and your style.</h2>
                    <p>ABC Company creates ceiling fans for every look and lifestyle. Whether it's a traditional or modern design, owning a ABC ceiling fan is always easy, breezy. Look around and you're sure to find the design that will make you a fan for life.</p>
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
                                    <img src="{{ asset('frontend/images/fan2.png') }}" class="img-fluid">
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
                                    <img src="{{ asset('frontend/images/fan2.png') }}" class="img-fluid">
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
                                    <img src="{{ asset('frontend/images/fan2.png') }}" class="img-fluid">
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
                                    <img src="{{ asset('frontend/images/fan2.png') }}" class="img-fluid">
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
                <div class="item">
                    <div class="col-md-12">
                        <div class="testimonial-item">
                            <p class="t-qoute">
                                "My experience with ABC is absolutely positive. The Products are beautifully designed and well working. 
                                DeerCreative provides quick and competent support."
                                <img src="{{ asset('frontend/images/diamond.png') }}" class="img-fluid">
                            </p>
                            <div class="testimonial-item-bottom">
                                <div class="row">
                                    <!-- image part start -->
                                    <div class="col-md-3">
                                        <div class="testimonial-item-bottom-left">
                                            <img src="{{ asset('frontend/images/user.jpg') }}" class="img-fluid">
                                        </div>
                                    </div>
                                    <!-- image part end -->

                                    <!-- info part start -->
                                    <div class="col-md-9">
                                        <div class="testimonial-item-bottom-right">
                                            <p>
                                                <span>Nancy Franklin</span>
                                            </p>
                                            <p>Sales & Marketing DeerCreative Ltd.</p>
                                        </div>
                                    </div>
                                    <!-- info part end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- testimonial item end -->

                <!-- testimonial item start -->
                <div class="item">
                    <div class="col-md-12">
                        <div class="testimonial-item">
                            <p class="t-qoute">
                                "My experience with ABC is absolutely positive. The Products are beautifully designed and well working. 
                                DeerCreative provides quick and competent support."
                                <img src="{{ asset('frontend/images/diamond.png') }}" class="img-fluid">
                            </p>
                            <div class="testimonial-item-bottom">
                                <div class="row">
                                    <!-- image part start -->
                                    <div class="col-md-3">
                                        <div class="testimonial-item-bottom-left">
                                            <img src="{{ asset('frontend/images/user.jpg') }}" class="img-fluid">
                                        </div>
                                    </div>
                                    <!-- image part end -->

                                    <!-- info part start -->
                                    <div class="col-md-9">
                                        <div class="testimonial-item-bottom-right">
                                            <p>
                                                <span>Nancy Franklin</span>
                                            </p>
                                            <p>Sales & Marketing DeerCreative Ltd.</p>
                                        </div>
                                    </div>
                                    <!-- info part end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- testimonial item end -->

                <!-- testimonial item start -->
                <div class="item">
                    <div class="col-md-12">
                        <div class="testimonial-item">
                            <p class="t-qoute">
                                "My experience with ABC is absolutely positive. The Products are beautifully designed and well working. 
                                DeerCreative provides quick and competent support."
                                <img src="{{ asset('frontend/images/diamond.png') }}" class="img-fluid">
                            </p>
                            <div class="testimonial-item-bottom">
                                <div class="row">
                                    <!-- image part start -->
                                    <div class="col-md-3">
                                        <div class="testimonial-item-bottom-left">
                                            <img src="{{ asset('frontend/images/user.jpg') }}" class="img-fluid">
                                        </div>
                                    </div>
                                    <!-- image part end -->

                                    <!-- info part start -->
                                    <div class="col-md-9">
                                        <div class="testimonial-item-bottom-right">
                                            <p>
                                                <span>Nancy Franklin</span>
                                            </p>
                                            <p>Sales & Marketing DeerCreative Ltd.</p>
                                        </div>
                                    </div>
                                    <!-- info part end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <p>
                                    <span>Corporate/Head Office & Showroom:</span> 
                                21, Habibullah Electric Market, Kazi Abdul Hamid Lane, Nawabpur, Dhaka - 1100.</p>
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