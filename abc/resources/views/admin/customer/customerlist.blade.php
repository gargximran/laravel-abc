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
								         
								                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone </th>
                                                <th>Address</th>
								                <th>Status</th>
								                {{-- <th>Action</th>
								                 --}}
								            </tr>
								        </thead>
								        <tbody>
								        	@foreach($allCustomer as $customer)
								            <tr>
                                            
								                <td>{{$customer->first_name}} {{$customer->last_name}}</td>
								                <td>{{($customer->address)}}</td>
                                                <td>{{$customer->phone}}</td>
                                                 <td>{{$customer->city}},{{$customer->division}}</td>
								                
								                <td>
								                	<?php if($customer->status=='active'){?>
								                		<div class='badge badge-success'>active</div>
								                	<?php }else{?>
								                		<div class='badge badge-danger'>inactive</div>
								                	<?php }?>
								                </td>
								                <td>
                                             
								            <!--     <a href="">	<button type='button' style="line-height: 0.5; border-radius: 1.25rem;" class='btn btn-primary btn-xs updatebtn' id='updatebtn'><i class='fa fa-edit'></i></button>
                                                    </a> -->
								                {{-- <a href="{{url('/admin/customer/delete/'.$customer->id)}}">	<button type='button' style="line-height: 0.5; border-radius: 1.25rem;" class='btn btn-danger btn-xs' onclick="return confirm('Are You sure')"><i class='fa fa-times'></i></buttpn></a>
                     --}}
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