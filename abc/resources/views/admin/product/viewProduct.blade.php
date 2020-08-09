@extends('admin.admin_master')
@section('mainContent')
 <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/rating.css')}}">
 <!-- owlcarousel css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/owlcarousel.css')}}">
   <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Product Detail
                                    <small>{{$singelViewProduct->title}}</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i data-feather="home"></i></a></li>
                                 <li class="breadcrumb-item">   <a href="{{route('admin.productlist')}}">Product</a>  </li>
                                <li class="breadcrumb-item active">Product Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="card">
                    <div class="row product-page-main card-body">
                        <div class="col-xl-4">
                            <div class="product-slider owl-carousel owl-theme" id="sync1">
                             
                                <div class="item"><img src="{{asset('public/images/'.$singelViewProduct->images)}}" alt="" class="blur-up lazyloaded"></div>
                                @if($singelViewProduct->images_one)
                                <div class="item"><img src="{{asset('public/images/'.$singelViewProduct->images_one)}}" alt="" class="blur-up lazyloaded"></div>
                                @endif
                                 @if($singelViewProduct->images_two)
                                <div class="item"><img src="{{asset('public/images/'.$singelViewProduct->images_two)}}" alt="" class="blur-up lazyloaded"></div>
                                @endif
                          
                            </div>
                            <div class="owl-carousel owl-theme" id="sync2">
                         
                                <div class="item"><img src="{{asset('public/images/'.$singelViewProduct->images)}}" alt="" class="blur-up lazyloaded"></div>
                                
                                @if($singelViewProduct->images_one)
                                <div class="item"><img src="{{asset('public/images/'.$singelViewProduct->images_one)}}" alt="" class="blur-up lazyloaded"></div>
                                @endif
                                 @if($singelViewProduct->images_two)
                                <div class="item"><img src="{{asset('public/images/'.$singelViewProduct->images_two)}}" alt="" class="blur-up lazyloaded"></div>
                                @endif
                              
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="product-page-details product-right mb-0">
                                <h2>{{$singelViewProduct->title}}</h2>
                                
                                <hr>
                                   <div class="product-price digits mt-2">
                                    <h3><?php if($singelViewProduct->discount != Null){ echo $singelViewProduct->sell_Price.' TK ';}?><del>{{$singelViewProduct->price}} Tk</del></h3>
                                </div>
                                <h6 class="product-title">Short Description</h6>
                                <p>{!! $singelViewProduct->short_description !!}</p>
                               <hr>
                           <!--      <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <hr> -->
                           <!--      <h6 class="product-title size-text">select size <span class="pull-right"><a href="" data-toggle="modal" data-target="#sizemodal">size chart</a></span></h6>
                                <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sheer Straight Kurta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body"><img src="assets/images/size-chart.jpg" alt="" class="img-fluid blur-up lazyloaded"></div>
                                        </div>
                                    </div>
                                </div> -->
                   <!--              <div class="size-box">
                                    <ul>
                                        <li class="active"><a href="#">s</a></li>
                                        <li><a href="#">m</a></li>
                                        <li><a href="#">l</a></li>
                                        <li><a href="#">xl</a></li>
                                    </ul>
                                </div> -->
                                <div class="add-product-form">
                                    <h6 class="product-title">quantity</h6>
                                    <fieldset class="qty-box mt-2 ml-0">
                                        <div class="input-group">
                                            <h4>{{$singelViewProduct->qty}}</h4>
                                           <!--  <input class="touchspin" type="text" value="{{$singelViewProduct->qty}}" disabled=""> -->
                                        </div>
                                    </fieldset>
                                </div>
                                <hr>
                                <!-- <h6 class="product-title">Time Reminder</h6>
                                <div class="timer">
                                    <p id="demo"><span>25 <span class="padding-l">:</span> <span class="timer-cal">Days</span> </span><span>22 <span class="padding-l">:</span> <span class="timer-cal">Hrs</span> </span><span>13 <span class="padding-l">:</span> <span class="timer-cal">Min</span> </span><span>57 <span class="timer-cal">Sec</span></span>
                                    </p>
                                </div> -->
                              <!--   <div class="m-t-15">
                                    <button class="btn btn-primary m-r-10" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary" type="button">Buy Now</button>
                                </div>
                                <div> -->
                                    <label></label>
                                     <h6 class="product-title">Description</h6>
                                     <p>{!! $singelViewProduct->long_description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>
        <script>
  $('documnet').ready(function(){
    $('#product').addClass('open active');
   
  })
</script>
        <!-- Owlcarousel js-->
<script src="{{asset('public/admin/assets/js/owl.carousel.js')}}"></script>
<script src="{{asset('public/admin/assets/js/product-carousel.js')}}"></script>
<script src="{{asset('public/admin/assets/js/jquery.barrating.js')}}"></script>
<script src="{{asset('public/admin/assets/js/rating-script.js')}}"></script>
@endsection