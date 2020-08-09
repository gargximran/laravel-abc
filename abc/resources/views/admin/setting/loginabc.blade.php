
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title></title>

	<!-- Favicon -->
	<link type="image/gif" rel="shortcut icon" href="{{ asset('public/frontend/images/fav.png')}}">

	<!-- fonts file -->
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;600&display=swap" rel="stylesheet">

	<!--- Font Awesome CSS 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"> 

	<!-- main bootstrap file -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.min.css') }}"> 

	<!-- animate css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/animate.css') }}"> 

	<!-- bootstrap v3 css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 



	
	<!-- the main css file -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/style.css') }}"> 

	<!-- responsive css file -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/responsive.css') }}"> 

</head>

<body id="top"><!-- navbar start -->



<!-- user section start -->
<section class="user-section wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
	<div class="container">
		<div class="row">
			
			<!-- form start -->
			<div class="col-md-4 offset-md-4 col-12 ">
				
				<div class="user-box">
					
					<!-- row start -->
					<div class="row">
						
						<!-- signup start -->
						<div class="col-md-12 register" style="padding: 0 15px;">
							<div class="register-box">
								
								<!-- title start -->
                                <div class="logo">
									<a href="">
										<img src="{{asset('public/frontend/images/logo.png')}}" class="img-fluid" style="display:block; margin: 0 auto;" >
									</a>
								</div>
								<!-- title end -->

								<!-- register form start -->
							
                                    {!! Form::open(['route' => 'login','method' => 'POST','class'=>'user-form']) !!}
								

									<div class="form-group">
										<label>email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@gmail.com " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									</div>
								

									<div class="form-group">
										<label>password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									</div>

									
									<!-- address row end -->

									<div class="form-group submit-btn">
										<input type="submit" value="Login" class="btn" name="">
									</div>

									{!! Form::close() !!}
								<!-- register form end -->

							</div>

							<!-- bottom start -->
							<div class="bottom" style="margin-left: 0;" >
								
							</div>
							<!-- bottom end -->
						</div>
						<!-- signup end -->

					

					</div>
					<!-- row end -->

				</div>

			</div>
			<!-- form end -->

		</div>
	</div>
</section>
<!-- user section end -->








</body>
</html>