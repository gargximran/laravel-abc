@extends('backend.template.layout')
@section('per_page_css')
<link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet"/>
@endsection


@section('per_page_js')
<script src="{{ asset('backend/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>


    $("#zero_config").DataTable();
</script>
@endsection


@section('main_card_content')
<!-- Container fluid  -->
<!-- ============================================================== -->


<!-- ============================================================== -->

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
						<div class="col-md-6">
							<h2>{{$product->name}}</h2>
							<p><span class="font-weight-bold">Product Code : </span> {{$product->code}}</p>
							<hr>
							<h5>Parent Category : <span class="font-weight-light">{{$product->category->parent->name}}</span></h5>
							<h5>Category : <span class="font-weight-light">{{$product->category->name}}</span></h5>
							<h6>Brand : <span class="font-weight-light">{{$product->brand}}</span></h6>
							<h6>Model : <span class="font-weight-light">{{$product->model}}</span></h6>
							<h6>Size : <span class="font-weight-light">{{$product->size}}</span></h6>
							<h6>Quantity : <span class="font-weight-light">{{$product->quantity}}</span></h6>
							<h6>Regular Price : <span class="font-weight-light">{{$product->regular_price}}</span></h6>
							<h6>Offer Price : <span class="font-weight-light">{{$product->offer_price}}</span></h6>
							<h6>Status : <span class="font-weight-light">@if ($product->status)
								<span class="badge badge-primary">Active</span>
								@else
								<span class="badge badge-danger">Inactive</span>

							@endif</span></h6>

							<h6>Exclusice : <span class="font-weight-light">@if ($product->exclusive)
								<span class="badge badge-primary">Active</span>
								@else
								<span class="badge badge-danger">Inactive</span>

							@endif</span></h6>
								<hr>
								<h2>Sale Summery :</h2>
								<h6>Total Sold Quantity : 
									<span class="font-weight-light">
										@php
											$quantity = 0;
											$totalBalanceSale = 0;

											foreach($product->Sale()->where('status', 3)->get() as $sale){
												$quantity += $sale->quantity;
												$totalBalanceSale += $sale->totalPrice;
											}


											

										@endphp

										{{$quantity}}
									</span>
								
								</h6>

								<h6>Total Sold Price : 
									<span class="font-weight-light">
										

										{{$totalBalanceSale}} TK
									</span>
								
								</h6>



								<hr>
								<p class="font-weight-bold">Description :</p>
							<p>{{$product->description}}</p>
							
						</div>

						<div class="col-md-6">
							<div class="row">
								@foreach ($product->image as $image)
									<div class="col-md-4">
										<img src="{{asset('images/product/'.$image->name)}}"  class="img-fluid border">
									</div>
								@endforeach
								
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-12">
							<a href="{{ route('product_edit_backend', $product->slug) }}" class="btn btn-warning">Edit</a>

							<div class="btn-group">
								<button
									type="button"
									class="btn btn-danger dropdown-toggle btn-sm"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
								>
									<i class="mdi mdi-delete-forever"></i> Delete
								</button>
								<div
									class="dropdown-menu text-center position-absolute" 
									x-placement="bottom-start"
								
								>

								<form action="{{route('product_destroy_backend', $product->slug)}}" method="POST">
									@csrf
									<input type="hidden" name="_method" value="delete">
									<button class="dropdown-item bg-danger" type="submit">Confirm Delete?</button>
								</form>

									<a
										class="dropdown-item bg-secondary"
										href="#"
										>Cancel</a
									>
								
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table id="zero_config" class="table table-bordered table-hover text-center align-item-center">
											<thead>
												<tr>
													<th>Date</th>
													<th>Invoice Code</th>
													<th>Customer Name</th>
													<th>Customer Address</th>
													<th>Quantity</th>
													<th>P.Price</th>
												</tr>
											</thead>
											<tbody>
												@foreach($product->Sale()->orderBy('id', 'desc')->where('status', 3)->get() as $sale)
													<tr>
														<td>{{$sale->created_at->format('d/m/Y')}}</td>
														<td><a href="{{route('showDeliveredOrderInvoice', $sale->Invoice->invoice_sl)}}">{{$sale->Invoice->invoice_sl}}</a></td>
														<td>{{$sale->Invoice->first_name}} {{$sale->Invoice->last_name}}</td>
														<td>{{$sale->Invoice->address}}</td>
														<td>{{$sale->quantity}}</td>
														<td>{{$sale->per_product_price}} tk</td>
														
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
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
</div>
@endsection