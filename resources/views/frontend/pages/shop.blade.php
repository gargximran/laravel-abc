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
				 <form action="{{route('search')}}" method="get">
					
                    <div class="form-group search-product">
                        <input type="text" class="form-control" placeholder="Search your products" name="search">
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

								

                                @foreach (App\Models\Backend\Category::where('category_id', 0)->get() as $parentCategory)
									
									@if (count($parentCategory->child))
										
									
										<!-- parent category start -->
										<div class="row show-child-cat" id="{{$parentCategory->slug}}">
											
											<div class="col-md-9">
												<p>{{$parentCategory->name}}</p>
											</div>

											<!-- dropdown icon start -->
											<div class="col-md-3 text-right">
												<i class="fas fa-plus"></i>
											</div>
											<!-- dropdown icon end -->


											
													<!-- child category start -->
													<div class="row child-category {{$parentCategory->slug}}">
														@foreach ($parentCategory->child as $child)
														<div class="col-md-12">
															<a href="{{route('categoryProduct', $child->slug)}}">{{$child->name}}</a>
														</div>
														@endforeach
													</div>
													<!-- child category end -->
											
											

										</div>
										<!-- parent category end -->
								
								
								
								
									@endif
							
								@endforeach   							
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
						@foreach ($products as $product)
							
						
						<div class="col-md-3 col-6">
							<div class="product-item">
								<div class="product-image">
                                 
                                    <img src="{{ asset('images/product/'.$product->image[0]->name) }}" class="img-fluid">
									<a style="cursor: pointer;" onclick="return addToCart({{$product->id}});">Add To Cart</a> 
									<!--add to car-->
								</div>
								<div class="product-detail">
									<a href="{{route('singeProduct', $product->slug)}}">{{$product->name}}</a>
									<div class="product-detail-bottom">
										@if ($product->offer_price)
											<p>{{$product->offer_price}} tk</p> 
											<p class="text-danger"> <del>{{$product->regular_price}}</del> Tk </p>
										@else
											<p>{{$product->regular_price}} tk</p> 
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
					{{$products->links()}}
				
				</div>

			</div>
			<!-- right part end -->

		</div>

	</div>
</section>
<!-- shop product end -->
@endsection