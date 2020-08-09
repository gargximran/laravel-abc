@extends('admin.admin_master')
@section('mainContent')
        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                           
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">List Product</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
           <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                        
                            <div class="card-body">                               
                                 
                               
                                <div class="table-responsive">
                                    <div id="basicScenario" class="product-physical"></div>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
								        <thead>
								            <tr>
								                    <th>SL</th>
                                                    <th>customer</th>
                                                    <th>Shipping</th>
                                                    <th>Total</th>
                                                    <th>Payment-type</th>
                                                    <th>Note</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
								                
								            </tr>
								        </thead>
								        <tbody>
								        	   @php
                                                 $i=1;
                                                 @endphp
                                        @foreach ($orderPending as $orderP)
								            <tr>
                                                <td>{{$i++}}</td>
                            <td>{{$orderP->name}}-{{$orderP->phone}}</td>
                            <td>{{$orderP->address}}</td>                          
                            <td>{{$orderP->orderTotal}}</td>
                            <td><span class="badge bg-inverse-success">{{$orderP->payment_type}}</span></td>
                            <td>{{$orderP->note}}</td>
                            <td><span class="badge bg-inverse-warning">{{$orderP->orderStatus}}</span></td>
                            <td>
                               
                                <a href="{{url('/admin/orderP/accept/'.$orderP->id)}}" onclick="return confirm('Are you want to Sure!!!')"  class=" btn-primary btn-sm" style="background-color: #28a745;
                                    border: 1px solid #28a745;
                                    border-radius: 6px;">
                                  <i class="fa fa-check" aria-hidden="true"></i>       
                                </a>
                                <a href="{{url('/admin/orderp/view/'.$orderP->id)}}" class=" btn-success btn-sm" style="border-radius: 20%;background-color: #1b1917;border: 1px solid #443323;">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                            {{-- <i class="fa fa-eye"></i> --}}
                                </a>
                                <a href="{{url('/admin/orderP/delete/'.$orderP->id)}}" onclick="return confirm('Are you want to Sure!!!')" class=" btn-danger btn-sm">
                                   <i class="fa fa-trash"></i>          
                                </a>
                            </td>
								                
								            </tr>
								           @endforeach
								        </tbody>

								    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
<script type="text/javascript">
                                        $('document').ready(function(){
                                            $('#product').addClass('open active');
                                             $('#productlist').addClass('active');
                                        })
                                    </script>
@endsection