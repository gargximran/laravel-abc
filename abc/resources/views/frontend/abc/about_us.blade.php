@extends('frontend.frontend_master')
@section('title')
@endsection
@section('mainContent')
<!-- about part start -->
<section class="banner about-banner wow fadeIn" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url(public/frontend/images/Shape1.png);" >
	<div class="container">
		<div class="row banner-row">

			<!-- slider start -->
			<div class="about-carousel owl-carousel owl-theme">
    			
    			<!-- item start -->
    			<div class="item">
    				<div class="col-md-12">
    					<div class="row">
    						<!-- left part start -->
    						<div class="col-md-12">
    							<h1>ABC Electrical Industries Ltd</h1>
    							<h1>(A private company limited by share)</h1>
    						</div>
    						<!-- left part end -->
    					</div>
    				</div>
    			</div>
    			<!-- item end -->

    			<!-- item start -->
    			<div class="item">
    				<div class="col-md-12">
    					<div class="row">
    						<!-- left part start -->
    						<div class="col-md-12">
    							<h1>ABC Electrical Industries Ltd</h1>
    							<h1>(A private company limited by share)</h1>
    						</div>
    						<!-- left part end -->
    					</div>
    				</div>
    			</div>
    			<!-- item end -->

    		</div>
    		<!-- slider end -->

		</div>
	</div>
</section>
<!-- about part end -->


<!-- second section start -->
<section class="about-second section-padding wow fadeIn" data-wow-duration="1s" data-wow-delay="1s" style="background-image: url(public/frontend/images/about.png);" >
	<div class="container">
		<div class="row">
			<!-- left part start -->
			<div class="col-md-6">
				<div class="left wow bounceInDown" data-wow-duration="1s" data-wow-delay="2s">
					<img src="{{asset('public/frontend/images/fan-3.png')}}" class="img-fluid">
				</div>
			</div>
			<!-- left part end -->

			<!-- right part start -->
			<div class="col-md-6">
				<div class="right wow bounceInRight" data-wow-duration="1s" data-wow-delay="2s">
					<h2>what <span>abc</span> stand for</h2>
					<ul>
						<li><span>a</span> = advance</li>
						<li><span>b</span> = best</li>
						<li><span>c</span> = cheap</li>
						<li>Over <span>15 years</span> in electrical industries</li>
					</ul>
				</div>
			</div>
			<!-- right part end -->
		</div>
	</div>
</section>
<!-- second section end -->


<!-- about page slider start -->
<section class="about-slider section-padding" style="background-image: url({{ asset('public/frontend/images/shape7.png') }}); ">
	<div class="container">
		<div class="row">
			<div class="about-carousel owl-carousel owl-theme">


				<!-- item start -->
				@foreach($buyerReviews as $review)
    			<div class="item">
    				<div class="col-md-12">
    					<div class="row">
    						<!-- left part start -->
    						<div class="col-md-6">
    							<div class="left">
    								<ul>
										@for($i = 1; $i <= $review->star; $i++)
										<li><i class="fas fa-star"></i></li>
										@endfor
    									
    								</ul>
    								<h2>{{$review->company_name}}</h2>
									<p><img src="{{ asset('public/frontend/images/qoute.png') }}">	{{$review->description}} </p>
									@if($review->link)
									<a href="http://{{$review->link}}">visit site</a>
									@endif
    							</div>
    						</div>
    						<!-- left part end -->

    						<!-- right part start -->
    						<div class="col-md-6">
    							<div class="right">
    								<img src="{{ asset('public/frontend/images/roundShape.png') }}" class="img-fluid">
    								<h1>{{$review->company_name}}</h1>
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
				
				@foreach($allTeamMember as $member)
    			<div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="1s">
    				<div class="col-md-12">
    					<div class="member-item">
    						<img src="{{ asset('public/images/team_member/'.$member->image) }}" class="img-fluid">
    						<h2>{{$member->name}}</h2>
    						<p>{{$member->role}}</p>
    						<p>{{$member->desctiption}}</p>
    						<ul>
								@if($member->social_fb_link)
    							<li>
    								<a href="http://{{$member->social_fb_link}}">
    									<i class="fab fa-facebook-f"></i>
    								</a>
								</li>
								@endif
								@if($member->social_tw_link)
    							<li>
    								<a href="http://{{$member->social_tw_link}}">
    									<i class="fab fa-twitter"></i>
    								</a>
								</li>
								@endif

								@if($member->social_in_link)
    							<li>
    								<a href="http://{{$member->social_in_link}}">
    									<i class="fab fa-linkedin"></i>
    								</a>
								</li>
								
								@endif

								@if($member->social_mail_link)
    							<li>
    								<a href="http://{{$member->social_mail_link}}">
    									<i class="fas fa-envelope"></i>
    								</a>
								</li>
								@endif

								@if($member->social_tm_link)
    							<li>
    								<a href="http://{{$member->social_tm_link}}">
    									<i class="fab fa-tumblr"></i>
    								</a>
								</li>
								@endif
    						</ul>
    					</div>
    				</div>
				</div>
				
				@endforeach
    			<!-- member item start -->


    	

    		</div>
		</div>
	</div>
</section>
<!-- team member end -->


<!-- third section start -->
<section class="about-third third-section section-padding" style="background-image: url(public/frontend/images/shape2.png);">
	<div class="container">
		<div class="row wow bounceInUp" data-wow-duration="1" data-wow-delay="2s">
			<div class="col-md-8">
			    <h2>About ABC Electrical Industries Ltd</h2>
				<ul>
					<li>• Starting out as a small partnership business ABC Industries has grown to a company now employing a team of skilled professionals. In 2017 Owner of ABC took over the partnership business and, through his leadership and experience, we have developed many strong and lasting relationships with our customers.</li>

					<li>• As market leaders in fan industry, we pride ourselves on the relationships we have established with our long-term and repeat business customers. These relationships have been built over many years of quality and reliable service. By taking the time to understand our customer’s individual requirements we ensure we provide them with the best solution based on our knowledge and experience.</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- third section end -->


<!-- fourth section start -->
<section class="fourth-section section-padding">
	<div class="container">
		<div class="row">
			
			<!-- left part start -->
			<div class="col-md-6">
				<div class="left">
					<img src="{{asset('public/frontend/images/shape3.png')}}" class="img-fluid right-img wow bounceInUp" data-wow-duration="1" data-wow-delay="1.5s">
					<img src="{{asset('public/frontend/images/hand.png')}}" class="img-fluid main-img wow bounceIn" data-wow-duration="1" data-wow-delay="1.5s">
					<img src="{{asset('public/frontend/images/dots.png')}}" class="img-fluid bottom-img wow bounceInDown" data-wow-duration="1" data-wow-delay="1.5s">
				</div>
			</div>
			<!-- left part end -->

			<!-- right part start -->
			<div class="col-md-6">
				<div class="right wow fadeIn" data-wow-duration="1" data-wow-delay="2s">
					<h2>Vision, Mission & Value</h2>
					<ul>
						<li>Vision= To be the market leader within 5 years in electrical industries.</li>
						<li>Mission= We provide cost affordable products.</li>
						<li>Values= We are cost effective, We are innovative, We are SMART.</li>
					</ul>
					<a href="">shop</a>
				</div>
			</div>
			<!-- right part end -->

		</div>
	</div>
</section>
<!-- fourth section end -->


<!-- fifth section start -->
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
        			<h2 >We hold <span>two</span> separate corporate meeting for customer and our values supplier every year.This along a team of 4 executives whose role is to maintain great relationship with those we do business with. </h2>
        		</div>
        	</div>
        	<!-- left part end -->

        	<!-- right part start -->
        	<div class="col-md-6 ">
        		<div class="right">
	        		<img src="{{asset('public/frontend/images/relation.png')}} " class="img-fluid wow bounceIn" data-wow-duration="1" data-wow-delay="1.5s">
	        	</div>
        	</div>
        	<!-- right part end -->

        </div>
        <!-- bototm row end -->

	</div>
</section>
<!-- fifth section end -->

@endsection