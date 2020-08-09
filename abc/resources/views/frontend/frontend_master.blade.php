
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>@yield('title')</title>

	<!-- Favicon -->
	<link type="image/gif" rel="shortcut icon" href="{{asset('public/frontend/images/fav.png')}}">

	<!-- fonts file -->
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;600&display=swap" rel="stylesheet">

	<!--- Font Awesome CSS 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"> 

	<!-- main bootstrap file -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/bootstrap.min.css')}}"> 
    
    <!-- fancy box css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/jquery.fancybox.min.css') }}">

	<!-- owl carousel pluging css file -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/owl.theme.default.min.css')}}"> 

	<!-- animate css -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/animate.css')}}"> 

	<!-- bootstrap v3 css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	
	<!-- the main css file -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style.css')}}"> 

	<!-- responsive css file -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/responsive.css')}}"> 

</head>

<body id="top"><!-- navbar start -->
<!-- navbar start -->
<section class="navbar-pc for-pc wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
	<div class="container">
		<div class="row">
			
			<!-- logo start -->
			<div class="col-md-3">
				<a href="{{url('/')}}">
					<img src="{{asset('public/frontend/images/logo.png')}}" class="img-fluid">
				</a>
			</div>
			<!-- logo end -->
			
			<!-- navbar item start -->
			<div class="col-md-9">
				<div class="navbar-item-pc">
					<ul>
						<li>
                            <a href="{{url('/')}}"> <i class="fas fa-home"></i> home</a>
                        </li>
                        <li class="parent-nav">
							<a href="{{url('/about-us')}}">about</a>

							<div class="child-nav">
								<ul>
									<li>
										<a href="">blogs</a>
									</li>
									<li>
										<a href="">zaman groups</a>
									</li>
									<li>
										<a href="{{ route('gallery') }}">gallery</a>
									</li>
								</ul>
							</div>

						</li>
                        <li>
                            <a href="{{url('/shop')}}">shop</a>
                        </li>
                       <?php $cus_id=Session::get('customer_id'); if($cus_id<=0){?>
						<li>
                            <a href="{{url('/customer/login')}}">Login</a>
                        </li>
                        <?php }?>
                        <li>
                            <a href="{{ route('contact') }}">contact</a>
                        </li>
                        <li class="cart">
                            @if(Cart::getTotalQuantity()>0)
							<a href="{{url('/checkout')}}">cart <i class="fas fa-shopping-cart"></i> </a>
							<div class="cart-number">
								<p>{{Cart::getTotalQuantity()}}</p>
							</div>
							@else
							<a >cart<i class="fas fa-shopping-cart"></i> </a>
							
							@endif
                        </li>
					</ul>
				</div>
			</div>
			<!-- navbar item end -->
		</div>
	</div>
</section>
<!-- navbar end -->
<!-- navbar mob start -->
<section class="navbar-mob for-mob wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
	<div class="container">
		<div class="row" style="padding: 15px 0">
			
			<!-- logo start -->
			<div class="col-4">
				<a href="{{url('/')}}">
					<img src="{{asset('public/frontend/images/logo.png')}}" class="img-fluid">
				</a>
			</div>
			<!-- logo end -->
			
			<!-- bar start -->
			<div class="col-8 bar">
				<i class="fas fa-bars show-nav"></i>
			</div>
			<!-- bar end -->
		</div>
	</div>
	<!-- navbar item start -->
	<div class="navbar-ite-mob">
		<ul>
			<li>
				<a href="{{url('/')}}"> <i class="fas fa-home"></i> home</a>
			</li>
			<li>
				<div class="row">
					<div class="col-8">
						 <a href="{{url('/about-us')}}">about</a>
					</div>

					<div class="col-4 text-right">
						<i class="fas fa-plus show-mega-menu" id="menu-01"></i>
					</div>
				</div>

				<div class="row megamenu menu-01">
					<div class="col-md-12">
						<ul>
							<li>
								<a href="">blogs</a>
							</li>
							<li>
								<a href="">zaman groups</a>
							</li>
							<li>
								<a href="{{ route('gallery') }}">gallery</a>
							</li>
						</ul>
					</div>
				</div>				
			</li>
			<li>
				<a href="{{url('/customer/login')}}">Login</a>
			</li>
			<li>
				<a href="{{ route('contact') }}">contact</a>
			</li>
			<li>
				<a href="{{url('/shop')}}">shop</a>
			</li>
		</ul>
	</div>
	<!-- navbar item end -->
	<!-- cart option start -->
	<div class="cart-mob cart">
		@if(Cart::getTotalQuantity()>0)
		<a href="{{url('/checkout')}}">shopping cart <i class="fas fa-shopping-cart"></i> </a>
		<div class="cart-number">
			<p>{{Cart::getTotalQuantity()}}</p>
		</div>
		@else
		<a href="">shopping cart <i class="fas fa-shopping-cart"></i> </a>
		<div class="cart-number">
			<p></p>
		</div>
		@endif
	</div>
	<!-- cart option end -->
</section>
<!-- navbar mob end-->

@yield('mainContent')



<!-- footer start -->
<footer class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="1s">
	
	<div class="container">
		
		<!-- footer title start -->
		<div class="row footer-title">
			<div class="col-md-12">
				<a href="{{url('/')}}">
					<img src="{{asset('public/frontend/images/logo.png')}}" class="img-fluid">
				</a>
			</div>

			<div class="col-md-12">
				<p>Copyright 2020 ABC All Right Reserved</p>
			</div>
		</div>
		<!-- footer title end -->

		<!-- footer middle row start -->
		<div class="row footer-middle">
			
			<!-- left part start -->
			<div class="col-md-3">
				<div class="left">
					<ul>
						<li>
							<a href="{{url('about-us')}}">about us</a>
						</li>
						<li>
							<a href="{{url('/shop')}}">Shop</a>
						</li>
					
					</ul>
				</div>
			</div>
			<!-- left part end -->

			<!-- middle part start -->
			<div class="col-md-6">
				<div class="middle">
				<div class="search-pc">
						<form method="post" action="{{url('/search')}}">
						@csrf
						<input type="text" class="form-control" name="search" placeholder="Search in abc">
						<button type="submit"><i class="fas fa-search"></i></button>
					</form>
				</div>
				</div>
			</div>
			<!-- middle part end -->

			<!-- right part start -->
			<div class="col-md-3">
				<div class="right">
					<ul>
							<li>
							<a href="{{url('about-us')}}">about us</a>
						</li>
						<li>
							<a href="{{url('/shop')}}">Shop</a>
						</li>
					
					</ul>
				</div>
			</div>
			<!-- right part end -->

		</div>
		<!-- footer middle row end -->

		<!-- footer bottom start -->
		<div class="footer-bottom">
			<div class="col-md-12">
				<ul>
					<li>
						<a href=""><i class="fab fa-facebook-f"></i></a>
					</li>
					<li>
						<a href=""><i class="fab fa-twitter"></i></a>
					</li>
					<li>
						<a href=""><i class="fab fa-instagram"></i></a>
					</li>
				</ul>
			</div>
		</div>
		<!-- footer bottom end -->

	</div>

</footer>
<!-- footer end -->

	
	<!-- go to top start -->
	<a href="#top">
		<div class="go-to-top">
			<i class="fas fa-arrow-up"></i>
		</div>
	</a>
	<!-- go to top end -->



	<!-- jquery lib file -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- jqeury ui js -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<!-- the main bootstrap file -->
	<script type="text/javascript" src="{{asset('public/frontend/js/bootstrap.min.js')}}" ></script>

	<!-- owl carousel js file -->
	<script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script> 

	<!-- zoom image -->
	<script type="text/javascript" src="{{asset('public/frontend/js/zoomsl.min.js')}}"></script>

	<!-- step js start -->
	<script type="text/javascript" src="{{asset('public/frontend/js/step.js')}}"></script>

	<!-- wow js file -->
  	<script type="text/javascript" src="{{asset('public/frontend/js/wow.min.js')}}"></script> 
  	
  	<!-- fancy box js -->
	<script type="text/javascript" src="{{ asset('public/frontend/js/jquery.fancybox.min.js') }}"></script>

	
	<!-- the main js file -->
	<script type="text/javascript" src="{{asset('public/frontend/js/main.js')}}" ></script>


</body>
</html>