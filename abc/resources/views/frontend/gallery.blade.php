@extends('frontend.frontend_master')
@section('title')
@endsection
@section('mainContent')

<!-- page indicator start -->
<section class="page-indicator">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul>
					<li>
						<a href="{{ url('/') }}">home</a>
					</li>
					<li>
						<a href="{{ route('gallery') }}">gallery</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- page indicator end -->


<!-- gallery section start -->
<section class="gallery section-padding">
	<div class="container">

		<!-- title row start -->
        <div class="row title-row">
            <div class="col-md-12">
                <h2>Company Photo & Videos</h2>
            </div>
        </div>
        <!-- title row end -->

        <!-- main gallery start -->
        <!-- Ph oto Grid -->
        <div class="row photo-gallery"> 
          <div class="column">
              @foreach($galaryContent as $key => $content)
              @if($key <= $count)
            <div class="gallery-image">
                <img src="{{ asset('public/images/gallery/'.$content->image) }}" style="width:100%">
                <div class="gallery-hover">
                    <a href="{{ asset('public/images/gallery/'.$content->image) }}" data-fancybox data-caption="{{ $content->caption }}">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
            
          </div>

          <div class="column">
            
          @foreach($galaryContent as $key => $content)
              @if($key <= $count*2 && $key >= $count)
            <div class="gallery-image">
                <img src="{{ asset('public/images/gallery/'.$content->image) }}" style="width:100%">
                <div class="gallery-hover">
                    <a href="{{ asset('public/images/gallery/'.$content->image) }}" data-fancybox data-caption="{{ $content->caption }}">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
          </div>

          <div class="column">
          @foreach($galaryContent as $key => $content)
              @if($key > $count *2)
            <div class="gallery-image">
                <img src="{{ asset('public/images/gallery/'.$content->image) }}" style="width:100%">
                <div class="gallery-hover">
                    <a href="{{ asset('public/images/gallery/'.$content->image) }}" data-fancybox data-caption="{{ $content->caption }}">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
           
          </div>
        </div>
        <!-- main gallery end -->

	</div>
</section>
<!-- gallery section end -->

@endsection