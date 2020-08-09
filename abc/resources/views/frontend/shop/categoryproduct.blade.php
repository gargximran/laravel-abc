@extends('frontend.frontend_master')
@section('title')
@endsection
@section('mainContent')
<!-- shop page banner start -->
<section class="shop wow bounceIn" data-wow-duration="1s" data-wow-delay="1" style="background-image: url(http://localhost/abc/public/frontend/images/shop.png);">
	<img src="{{asset('public/frontend/images/Shape5.png')}}" class="img-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>Archives: Shop</h1>
			</div>
		</div>
	</div>
</section>
<!-- shop page banner end -->


<!-- shop product start -->
<section class="shop-product section-padding">
	<!-- pre loader start -->
	<div class="preloader">
		<img src="{{asset('public/frontend/images/logo.png')}}">
	</div>
	<!-- pre loader end -->
	<div class="container">
		<div class="row">
			
			<!-- left part start -->
			<div class="col-md-3">
				<div class="left">
					<div class="row">
						<div class="col-md-9 col-9">
							<h2>category</h2>
						</div>
						<div class="col-md-3 col-3 filter-category for-mob">
							<i class="fas fa-filter show-category"></i>
						</div>
					</div>
					<div class="cat-form">
						<form>
							<ul>
                                @foreach ($categories as $category)
                                    
                              
								<li>
									{{-- <label class="check">cilling fan
									  	<input type="checkbox" >
									  	<span class="checkmark"></span>
                                    </label> --}}
                                <a href="{{url('/shop/'.$category->category_slug)}}">{{$category->category_name}}</a> <br>
                                </li>
                                @endforeach
								{{-- <li>
									<label class="check">cilling fan
									  	<input type="checkbox">
									  	<span class="checkmark"></span>
									</label>
								</li> --}}
							</ul>
						</form>
					</div>
				</div>
			</div>
			<!-- left part end -->

			<!-- right part start -->
			<div class="col-md-8">
				<div class="right">

					<!-- sort row start -->
					<div class="row sort-row">
						<!--<div class="col-md-9 col-6">-->
						<!--	<p>showing 0-15</p>-->
						<!--</div>-->
						<!--<div class="col-md-3 col-6">-->
						<!--	<form>-->
						<!--		<div class="custom-select">-->
						<!--			<select>-->
						<!--			    <option >sort by price:</option>-->
						<!--			    <option >1,000 - 1,500</option>-->
						<!--			    <option >1,500 - 2,000</option>-->
						<!--			    <option >2,000 - 5,000</option>-->
						<!--			</select>-->
						<!--		</div>-->
						<!--	</form>-->
						<!--</div>-->
					</div>
					<!-- sort row end -->

					<div class="row">
						@foreach ($categoryProduct as $item)
                            
                       
						<!-- product item start -->
						<div class="col-md-3 col-6">
							<div class="product-item">
								<div class="product-image">
                                    @if ($item->discount>0)
                                    <p>{{$item->discount}} %</p>
                                    @endif
									<img src="{{asset('public/images/'.$item->images)}}" class="img-fluid">
									<a href="{{url('product/'.$item->slug)}}">see more</a> 
									<!--add to car-->
								</div>
								<div class="product-detail">
									 <a href="{{url('product/'.$item->slug)}}">{{$item->title}}</a>
									 <div class="product-detail-bottom">
                                         @if($item->discount>0)
                                         <p>{{$item->sell_Price}} tk</p> 
                                         <p> <del>{{$item->price}}</del> Tk </p>
                                         @else
                                         <p> {{$item->price}} tk </p>
										@endif
									 </div>
								</div>
							</div>
						</div>
						<!-- product item end -->
                        @endforeach


					</div>
				</div>

				<div class="col-md-12 paginate-row">
					<ul>
						<li><a href="">1</a></li>
						<li><a href="">2</a></li>
					</ul>
				</div>

			</div>
			<!-- right part end -->

		</div>

	</div>
</section>
<!-- shop product end -->
@endsection