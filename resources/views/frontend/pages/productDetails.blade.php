@extends('frontend.template.layout')

@section('body-content')
<!-- product details page banner page banner start -->
@foreach( $productdetails as $productdetail )
<section class="shop wow bounceIn" data-wow-duration="1s" data-wow-delay="1" style="background-image: url({{ asset('images/banner/' . $productdetail->image) }});">
	<img src="images/Shape5.png" class="img-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>product details</h1>
			</div>
		</div>
	</div>
</section>
@endforeach
<!-- product details page banner page banner end -->


<!-- product details start -->
<section class="product-detail section-padding">
	<div class="container">
		<div class="row">
			
			<!-- left part start -->
			<div class="col-md-5 left">

				<!-- main image start -->
				<div class="main-img">
				
						<img src="{{asset('images/product/'.$product->image[0]->name)}}" class="img-fluid img-one block__pic">
						<img src="{{asset('images/product/'.$product->image[1]->name)}}" class="img-fluid img-two block__pic">
						<img src="{{asset('images/product/'.$product->image[2]->name)}}" class="img-fluid img-three block__pic">
				
					
				
				</div>
				<!-- main image end -->

				<!-- thumbnail image start-->
				<div class="thumbnail-image">
					<div class="row">
						<div class="col-md-4 col-4">
							<img src="{{asset('images/product/'.$product->image[0]->name)}}" class="img-fluid for-img-one">
						</div>
						<div class="col-md-4 col-4">
							<img src="{{asset('images/product/'.$product->image[1]->name)}}" class="img-fluid for-img-two">
						</div>
						<div class="col-md-4 col-4">
							<img src="{{asset('images/product/'.$product->image[2]->name)}}" class="img-fluid for-img-three">
						</div>
					</div>
				</div>
				<!-- thumbnail image end-->
			</div>
			<!-- left part end -->

			<!-- right part start -->
			<div class="right col-md-7">
				<h2>{{$product->name}}</h2>
				@if ($product->offer_price)
					<p class="text-danger"><del>{{$product->regular_price}} Tk</del></p>
					<p>{{$product->offer_price}} Tk</p>
				@else
					<p>{{$product->regular_price}} Tk</p>
				@endif
				
				<ul>
					<li>Brand : {{$product->brand}}</li>
					<li>Model : {{$product->model}}</li>
					<li>Product Code : <span class="text-lowercase">{{$product->code}}</span></li>
					<li>Size : {{$product->size}}</li>
					<li>Parent Category : {{$product->category->parent->name}} </li>
					<li>Sub Category : {{$product->category->name}} </li>
					
					<li>3 Years Replacement Guranted </li>
				</ul>

				<!-- cart add start -->
				<div class="cart-add">
					<div class="row">
						<div class="col-md-2 col-3">
							<form>
								<div class="form-group">
									<input type="number" value="0" class="form-control" name="">
								</div>
							</form>
						</div>
						<div class="col-md-10 col-9 add-to-cart">
							<button onclick="return addToCart({{$product->id}});" class="btn">add to cart</button>
						</div>
					</div>
				</div>
				<!-- cart add end -->

			</div>
			<!-- right part end -->

		</div>

		<!-- description row start -->
		<div class="row description-row">
			<div class="col-md-12 title">
				<p>description</p>
			</div>
			<div class="col-md-12 info">
				<h2>description</h2>
				<p>{{$product->description}}</p>
			</div>
		</div>
		<!-- description row end -->

	</div>
</section>
<!-- product details end -->


<!-- related product start -->
<section class="related-product section-padding">
	<div class="container">
		
		<!-- title row start -->
        <div class="row title-row">
            <div class="col-md-12">
                <h2>related product</h2>
            </div>
        </div>
        <!-- title row end -->

        <!-- product row start -->
        <div class="row">
			
			

			@foreach ($relatedProducts as $relatedProduct)				
			
        	<!-- product item start -->
			<div class="col-md-3 col-6">
				<div class="product-item related-product-box">
					<div class="product-image">
				
						<img src="{{asset('images/product/'.$relatedProduct->image[0]->name)}}" class="img-fluid">
						<a style="cursor: pointer;" onclick="return addToCart({{$relatedProduct->id}});">add to cart</a>
					</div>
					<div class="product-detail">
						 <a href="product-details.php">{{$relatedProduct->name}}</a>
						 <div class="product-detail-bottom">
							@if ($relatedProduct->offer_price)
							 	<p>{{$relatedProduct->offer_price}} tk</p>
								 <p><del class="text-danger">{{$relatedProduct->regular_price}} tk</del> </p>
							@else
								<p>{{$relatedProduct->regular_price}} tk</p>
							@endif
						 	
						
							 
						 </div>
					</div>
				</div>
			</div>
			<!-- product item end -->
			@endforeach

		

			


        </div>
        <!-- product row end -->

        

	</div>
</section>
<!-- related product end -->
@endsection