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
					@foreach( $maps as $map)
					<iframe src="{{ $map->link }}" frameborder="0"></iframe>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<!-- contact section end -->

<!-- contact page address info start -->
@foreach( $contactinfos as $contactinfo )
<section class="contact-page-info section-padding">
	<div class="container">
		<div class="row">
			<!-- contact info item start -->
			<div class="col-md-4">
				<div class="contact-info-item">
					<h2>bangladesh</h2>
					<p>{{ $contactinfo->address }}</p>
				</div>
			</div>				
			<!-- contact info item end -->
			<!-- contact info item start -->
			<div class="col-md-4">
				<div class="contact-info-item">
					<h2>Head Office</h2>
					<p>{{ $contactinfo->headoffice }}</p>
				</div>
			</div>				
			<!-- contact info item end -->
			<!-- contact info item start -->
			<div class="col-md-4">
				<div class="contact-info-item">
					<h2>Contact</h2>
					<p>Phone: {{ $contactinfo->phone }}</p>
					<p>Mobile: {{ $contactinfo->email }}</p>
				</div>
			</div>				
			<!-- contact info item end -->
		</div>
	</div>
</section>
@endforeach
<!-- contact page address info end -->

<!-- contact form section start -->
<section class="contact-form-section section-padding">
	<div class="container">
		<div class="row">
			<!-- left part start -->
			@foreach( $contactstuffs as $contactstuff )
			<div class="col-md-6">
				<div class="left">
					<h2>How can we help you?</h2>

					<!-- contact people row start -->
					<div class="row contact-with-people">
						<div class="col-md-3">
							<div class="left">
								<img src="{{ asset('images/contactstuff/'. $contactstuff->imageOne) }}" class="img-fluid" alt="">
							</div>
						</div>
						<div class="col-md-9">
							<div class="right">
								<h2>{{ $contactstuff->nameOne }}</h2>
								<p>{{ $contactstuff->designationOne }}</p>
								<p>{{ $contactstuff->phoneOne }}</p>
								<p>{{ $contactstuff->emailOne }}</p>
							</div>
						</div>
					</div>
					<!-- contact people row end -->
					<!-- contact people row start -->
					<div class="row contact-with-people">
						<div class="col-md-3">
							<div class="left">
								<img src="{{ asset('images/contactstuff/'. $contactstuff->imageTwo) }}" class="img-fluid" alt="">
							</div>
						</div>
						<div class="col-md-9">
							<div class="right">
								<h2>{{ $contactstuff->nameTwo }}</h2>
								<p>{{ $contactstuff->designationTwo }}</p>
								<p>{{ $contactstuff->phoneTwo }}</p>
								<p>{{ $contactstuff->emailTwo }}</p>
							</div>
						</div>
					</div>
					<!-- contact people row end -->
				</div>
			</div>
			@endforeach
			<!-- left part END -->

			<!-- right part start -->
			<div class="col-md-6">
				<div class="right">
					<form>
						<div class="form-group">
							<input type="text" placeholder="Name" class="form-control" name="name" required>
						</div>
						<div class="form-group">
							<input type="email" placeholder="Email" class="form-control" name="email" required>
						</div>
						<div class="form-group">
							<input type="text" placeholder="Website" class="form-control" name="website"  required>
						</div>
						<div class="form-group">
							<textarea name="message" class="form-control" placeholder="Message" rows="4"  required></textarea>
						</div>
						<div class="form-group">
							<button class="form-control send-msg" type="submit">Send Message</button>
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