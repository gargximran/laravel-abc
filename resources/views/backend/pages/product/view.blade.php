@extends('backend.template.layout')



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
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
</div>
@endsection