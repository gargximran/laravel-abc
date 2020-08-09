@extends('frontend.frontend_master')
@section('title')
@endsection
@section('mainContent')
<!-- user section start -->
<section class="user-section wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
	<div class="container">
		<div class="row">
			
			<!-- form start -->
			<div class="col-md-8 offset-md-2 col-12 ">
				
				<div class="user-box">
					
					<!-- row start -->
					<div class="row">
						
						<!-- signup start -->
						<div class="col-md-6 register">
							<div class="register-box">
								
								<!-- title start -->
								<h2>sign up</h2>
								<!-- title end -->

								<!-- register form start -->
								<form action="{{url('/customer/save')}}" method="post" class="user-form">
									{{ csrf_field() }}
									<div class="form-group">
										<label>name</label>
										<input type="text" class="form-control" placeholder="abc" name="first_name">
									</div>

									<div class="form-group">
										<label>email</label>
										<input type="email" class="form-control" placeholder="example@gmail.com" name="email">
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="number" class="form-control" placeholder="example@gmail.com" name="phone">
									</div>

									<div class="form-group">
										<label>password</label>
										<input type="password" class="form-control" placeholder="********" name="password">
									</div>

									<!-- address row start -->
									<div class="row">
										<div class="col-md-12 form-group">
											<label>address</label>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="address" name="address">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="City" name="city">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Division" name="division">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Zip" name="zip">
											</div>
										</div>
									</div>
									<!-- address row end -->

									<div class="form-group submit-btn">
										<input type="submit" value="Sign Up" class="btn" name="">
									</div>

								</form>
								<!-- register form end -->

							</div>

							<!-- bottom start -->
							<div class="bottom">
								
							</div>
							<!-- bottom end -->
						</div>
						<!-- signup end -->

						<!-- login start -->
						<div class="col-md-6 login">
							<div class="login-box">
								
								<!-- title start -->
								<h2>sign In</h2>
								<!-- title end -->
                                    	@if(Session::has('exception'))
						<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('exception') }}</p>
					@endif
								<!-- login form start -->
							
								    {!! Form::open(['route' => 'customer.login','method' => 'POST','class'=>'user-form']) !!}
									
									<div class="form-group">
										<label>email</label>
										<input type="email" class="form-control" placeholder="example@gmail.com" name="login_email">
									</div>

									<div class="form-group">
										<label>password</label>
										<input type="password" class="form-control" placeholder="******" name="login_password">
									</div>

									<div class="form-group submit-btn">
										<input type="submit" value="Sign In" class="btn" name="">
									</div>

							{!! Form::close() !!}
								<!-- login form end -->

								<!-- logo start -->
								<div class="logo">
									<a href="">
										<img src="{{asset('public/frontend/images/logo.png')}}" class="img-fluid">
									</a>
								</div>
								<!-- logo end -->

							</div>
						</div>
						<!-- login end -->

					</div>
					<!-- row end -->

				</div>

			</div>
			<!-- form end -->

		</div>
	</div>
</section>
<!-- user section end -->
@endsection