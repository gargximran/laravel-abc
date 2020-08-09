@extends('frontend.template.layout')

@section('body-content')
<!-- shop page banner start -->
<section class="wow bounceIn shop" data-wow-duration="1s" data-wow-delay="1" style="background-image: url({{ asset('frontend/images/shop.png') }});">
	<img src="{{ asset('frontend/images/Shape5.png') }}" class="img-fluid">
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
		<img src="{{ asset('frontend/images/logo.png') }}">
	</div>
	<!-- pre loader end -->
	<div class="container">
	    
	    <div class="row">
			<div class="col-md-6 offset-md-3">
				 <form>
                    <div class="form-group search-product">
                        <input type="text" class="form-control" placeholder="Search your products" name="">
                        <button type="submit" class="search-btn">Search</button>
                    </div>
                </form>
			</div>
		</div>
	    
		<div class="row">
			
			<!-- left part start -->
			<div class="col-md-12">
				<div class="left">
					<div class="row">
						<div class="col-md-9 col-9">
							<h2>category</h2>
						</div>
						<div class="col-md-3 col-3 filter-category">
							<i class="fas fa-filter show-category"></i>
						</div>
					</div>
					<div class="cat-form">
						<form>
							<ul>
                                                                    
                              
								<li>
									
                                      <a href="shop/Fan">Fan</a> <br>
                                </li>
                                                                    
                              
								<li>
									
                                      <a href="shop/Light">Light</a> <br>
                                </li>
                                								
							</ul>
						</form>
					</div>
				</div>
			</div>
			<!-- left part end -->

			<!-- right part start -->
			<div class="col-md-12">
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
                       
						<!-- product item start -->
						<div class="col-md-3 col-6">
							<div class="product-item">
								<div class="product-image">
                                    <p>10 %</p>
                                    <img src="{{ asset('frontend/images/fan4.png') }}" class="img-fluid">
									<a href="">see more</a> 
									<!--add to car-->
								</div>
								<div class="product-detail">
									<a href="">ABC Ceiling Fan</a>
									<div class="product-detail-bottom">
                                            <p>1350 tk</p> 
                                        <p> <del>1500</del> Tk </p>
                                    </div>
								</div>
							</div>
						</div>
						<!-- product item end -->
                        

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