@extends('backend.template.layout')
@section('main_card_content')
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    
    <div class="row">

        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="{{route('pending_orders')}}">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <h6 class="text-white">
                            @php
                                $pendingOrders = App\Invoice::where('status',1)->get();
                                
                            @endphp
                            {{count($pendingOrders)}}
                        </h6>
                        <h6 class="text-white">Total Pending Order</h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="{{route('confirmed_orders')}}">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <h6 class="text-white">
                            @php
                                $confirmedOrders = App\Invoice::where('status',2)->get();
                                
                            @endphp
                            {{count($confirmedOrders)}}
                        </h6>
                        <h6 class="text-white">Total Confirmed Order</h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->


        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="{{route('delivered_orders')}}">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <h6 class="text-white">
                            @php
                                $deliveredOrders = App\Invoice::where('status',3)->get();
                                
                            @endphp
                            {{count($deliveredOrders)}}
                        </h6>
                        <h6 class="text-white">Total Delivered Order</h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <a href="{{ route('message.show') }}">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                        <h6 class="text-white">{{count(App\Models\Backend\Message\Message::all())}}</h6>
                        <h6 class="text-white">Total Message</h6>
                    </div>
                </div>
            </a>
        </div>


        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="{{route('totalSale')}}">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                        <h6 class="text-white">
                            @php
                                $saleProducts = App\ProductSale::where('status',3)->get();
                                $totalSale = 0;
                                foreach ($saleProducts as $sale) {
                                    $totalSale += $sale->totalPrice;
                                }
                            @endphp
                            {{$totalSale}} tk
                        </h6>
                        <h6 class="text-white">Total Sales</h6>
                    </div>
                </div>
            </a>
        </div>

        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <a href="{{route('product_show_backend')}}">
                <div class="card card-hover">
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                        <h6 class="text-white">{{count(App\Models\Backend\Product::all())}}</h6>
                        <h6 class="text-white">Total Product</h6>
                    </div>
                </div>
            </a>
        </div>
        <!-- Column -->
       
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
</div>
@endsection