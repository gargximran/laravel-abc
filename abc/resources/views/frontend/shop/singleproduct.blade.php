@extends('frontend.frontend_master')
@section('title')
@endsection
@section('mainContent')

<!-- product details page banner page banner start -->
<section class="shop wow bounceIn" data-wow-duration="1s" data-wow-delay="1" style="background-image: url(http://abc.ssttechbd.com/public/frontend/images/productdetails.png);">
	<img src="{{asset('public/frontend/images/Shape5.png')}}" class="img-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>{{$singleProduct->title}}</h1>
			</div>
		</div>
	</div>
</section>
<!-- product details page banner page banner end -->


<!-- product details start -->
<section class="product-detail section-padding">
	<div class="container">
		<div class="row">
			
			<!-- left part start -->
			<div class="col-md-5 left">

				<!-- main image start -->
				<div class="main-img">
					<img src="{{asset('public/images/'.$singleProduct->images)}}" class="img-fluid img-one block__pic">
					<img src="{{asset('public/images/'.$singleProduct->images_one)}}" class="img-fluid img-two block__pic">
					<img src="{{asset('public/images/'.$singleProduct->images_two)}}" class="img-fluid img-three block__pic">
				</div>
				<!-- main image end -->

				<!-- thumbnail image start-->
				<div class="thumbnail-image">
					<div class="row">
						<div class="col-md-4 col-4">
							<img src="{{asset('public/images/'.$singleProduct->images)}}" class="img-fluid for-img-one">
						</div>
						<div class="col-md-4 col-4">
							<img src="{{asset('public/images/'.$singleProduct->images_one)}}" class="img-fluid for-img-two">
						</div>
						<div class="col-md-4 col-4">
							<img src="{{asset('public/images/'.$singleProduct->images_two)}}" class="img-fluid for-img-three">
						</div>
					</div>
				</div>
				<!-- thumbnail image end-->
			</div>
			<!-- left part end -->

			<!-- right part start -->
			<div class="right col-md-7">
				<h2>{{$singleProduct->title}}</h2>
			    @if($singleProduct->discount>0)
                    <p><span>{{$singleProduct->sell_Price}} tk</span></p> 
                    <p><span> <del>{{$singleProduct->price}}</del> Tk</span></p>
                @else
                <p> {{$singleProduct->price}} tk </p>
                @endif
                
                <p style="color: black">{!! $singleProduct->short_description !!}</p> 

				<!-- cart add start -->
				<div class="cart-add">
                    <form method="post" action="{{route('product.cart')}}">
                        @csrf
					<div class="row">
                  
						<div class="col-md-2 col-3">
							
								<div class="form-group">
                                    <input type="number" value="1" name="cart_qty" class="form-control" >
                                    <input type="hidden" value="{{$singleProduct->id}}" name="id" class="form-control" >
                                    <input type="hidden" value="<?php if($singleProduct->discount>0){echo "$singleProduct->sell_Price";}else {
                                        echo "$singleProduct->price";} ?>" name="cart_price" class="form-control" >
								</div>
							
						</div>
						<div class="col-md-10 col-9 add-to-cart">
							<button type="submit" class="btn">add to cart</button>
                        </div>
                  
                    </div>
                </form>
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
                {!! $singleProduct->long_description !!}
				{{-- <p>AAFtAM 36" Since 2012 Elegant Design Aerodynamic Royal Blades Powerful & Heavy Duty Motor Sealed Type Ball Bearing TECHNICAL SPECIFICATIONS  Brand:ABC Ceiling Fan Model:AARAM  Size/Sweep:900 mm Rated Voltge:220 V Rated Current:SO w Rated Speed:450 rpm Rated Frequency:50 hz Power Factor:0.90 Insulation:Class T Air Delivery:140 m3/m Service Value:1.75 m3/me </p> --}}
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
                <h2>Lasted product</h2>
            </div>
        </div>
        <!-- title row end -->

        <!-- product row start -->
        <div class="row">
        	
        	<!-- product item start -->
			@foreach ($lastedproducts as $item)
                            
                       
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
						@endforeach
			<!-- product item end -->


        </div>
        <!-- product row end -->

        <!-- paginate row start -->
        <div class="row">
        	<div class="col-md-12 paginate-row">
				<ul>
					<li><a href="">1</a></li>
					<li><a href="">2</a></li>
				</ul>
			</div>
        </div>
        <!-- paginate row end -->

	</div>
</section>
<!-- related product end -->
@endsection