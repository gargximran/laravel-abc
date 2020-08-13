@extends('frontend.template.layout')
@section('title')
@endsection
@section('body-content')

<!-- page indicator start -->
<section class="page-indicator">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul>
					<li>
						<a href="{{ ('/') }}">home</a>
					</li>
					<li>
						<a href="{{ route('contact') }}">contact</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- page indicator end -->

<!-- contact section start -->
<section class="contact section-padding">
	<div class="container">
		<div class="row">
			
			<!-- left part start -->
			<div class="col-md-12">
				<div class="left">
					<img src="{{ asset('frontend/images/contact.png') }}" class="img-fluid">
				</div>
			</div>
			<!-- left part end -->

			<!-- right part start -->
			<!-- <div class="col-md-6">
				<div class="right">
					<h2>Get In Touch With Us !</h2>
					<p>Fill out the form below to recieve a free and confidential.</p>
					<form>
						<div class="form-group">
							<input type="text" placeholder="Name" class="form-control" name="">
						</div>
						<div class="form-group">
							<input type="email" placeholder="Email" class="form-control" name="">
						</div>
						<div class="form-group">
							<input type="text" placeholder="Website" class="form-control" name="">
						</div>
						<div class="form-group">
							<textarea class="form-control" placeholder="Message" rows="4"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" class="form-control send-msg" name="">
						</div>
					</form>
				</div>
			</div> -->
			<!-- right part end -->

		</div>
	</div>
</section>
<!-- contact section end -->

<!-- contact page address info start -->
<section class="contact-page-info section-padding">
	<div class="container">
		<div class="row">

			<!-- contact info item start -->
			<div class="col-md-4">
				<div class="contact-info-item">
					<h2>bangladesh</h2>
					<p>Matuail Medical Road</p>
					<p>1362 Dhaka, Bangladesh</p>
				</div>
			</div>				
			<!-- contact info item end -->

			<!-- contact info item start -->
			<div class="col-md-4">
				<div class="contact-info-item">
					<h2>Head Office</h2>
					<p>Matuail Medical Road</p>
					<p>1362 Dhaka, Bangladesh</p>
				</div>
			</div>				
			<!-- contact info item end -->

			<!-- contact info item start -->
			<div class="col-md-4">
				<div class="contact-info-item">
					<h2>Contact</h2>
					<p>Phone: 01711-784387</p>
					<p>Mobile: 01711-784387</p>
				</div>
			</div>				
			<!-- contact info item end -->

		</div>
	</div>
</section>
<!-- contact page address info end -->


<!-- contact form section start -->
<section class="contact-form-section section-padding">
	<div class="container">
		<div class="row">

			<!-- left part start -->
			<div class="col-md-6">
				<div class="left">
					<h2>How can we help you?</h2>
					
					<!-- contact people row start -->
					<div class="row contact-with-people">
						<div class="col-md-3">
							<div class="left">
								<img src="{{ asset('public/frontend/images/User-icon.png') }}" class="img-fluid" alt="">
							</div>
						</div>
						<div class="col-md-9">
							<div class="right">
								<h2>Azure Wilson</h2>
								<p>Customer Realations</p>
								<p>963.806.0919</p>
								<p>Abchead@consulting.com</p>
							</div>
						</div>
					</div>
					<!-- contact people row end -->

					<!-- contact people row start -->
					<div class="row contact-with-people">
						<div class="col-md-3">
							<div class="left">
								<img src="{{ asset('public/frontend/images/User-icon.png') }}" class="img-fluid" alt="">
							</div>
						</div>
						<div class="col-md-9">
							<div class="right">
								<h2>Keith Wilson</h2>
								<p>Customer Realations</p>
								<p>963.806.0919</p>
								<p>Abchead@consulting.com</p>
							</div>
						</div>
					</div>
					<!-- contact people row end -->

				</div>
			</div>
			<!-- left part END -->

			<!-- right part start -->
			<div class="col-md-6">
				<div class="right">
					<form>
						<div class="form-group">
							<input type="text" placeholder="Name" class="form-control" name="">
						</div>
						<div class="form-group">
							<input type="email" placeholder="Email" class="form-control" name="">
						</div>
						<div class="form-group">
							<input type="text" placeholder="Website" class="form-control" name="">
						</div>
						<div class="form-group">
							<textarea class="form-control" placeholder="Message" rows="4"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" class="form-control send-msg" name="">
						</div>
					</form>
				</div>
			</div>
			<!-- right part end -->

		</div>
	</div>
</section>
<!-- contact form section end -->

@endsection