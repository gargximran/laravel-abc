@extends('backend.template.layout')




@section('per_page_css')
@endsection


@section('per_page_js')
    
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
                    <h2 class="bg-info text-center px-2 text-white">Add New Product</h2>
                    <!-- add new product form start -->
                    <form action="{{route('product_update_backend', $product->slug)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4  mt-3">
                                <div class="form-group">
                                    <label>Product Name <sub class="text-danger">(required)</sub></label>
                                    <input type="text" required value="{{$product->name}}" class="form-control" name="name" placeholder='Ex: 56" celling Fan'>
                                    <small class="form-text text-muted">Please fill name carefully!</small>
                                </div>
                            </div>
                            <div class="col-md-8">
                            <h2 class="h5 text-center text-danger bg-dark">Image Size must be Square</h2>
                                    <div class="row">
                                        
                                        <div class="col-md-4 mt-3">
                                            
                                                <img src="{{asset('images/product/'.$product->image[0]->name)}}" class="img-fluid p-1 border img-150">
                                            
                                            <div class="form-group">
                                                <label>Product Image 1 <sub class="text-danger">(required)</sub></label>
                                                <input accept="image/*" type="file" class="form-control-file" name="image_1">
                                                <small class="form-text text-muted">Primary Image</small>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-3">
                                            <img src="{{asset('images/product/'.$product->image[1]->name)}}"  class="img-fluid p-1 border img-150">
                                            <div class="form-group">
                                                <label>Product Image 2 <sub class="text-danger">(required)</sub></label>
                                                <input accept="image/*" type="file" class="form-control-file" name="image_2">
                                                <small class="form-text text-muted">Sub Image</small>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-3">
                                            <img src="{{asset('images/product/'.$product->image[2]->name)}}"  class="img-fluid p-1 border img-150">
                                            <div class="form-group">
                                                <label>Product Image 3 <sub class="text-danger">(required)</sub></label>
                                                <input accept="image/*" type="file" class="form-control-file" name="image_3">
                                                <small class="form-text text-muted">Sub Image</small>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>


                        <div class="row ">
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label>Select Category <sub class="text-danger">(required)</sub></label>
                                    <select name="category" class="form-control">
                                        <option disabled selected>Choose Category</option>
                                        @foreach($categories as $category)
                                            <option class="text-danger" disabled>{{$category->name}}</option>
                                            @foreach($category->child as $child)
                                                <option value="{{$child->id}}" @if($product->category->id == $child->id) 
                                                    selected
                                                @endif>--{{$child->name}}</option>
                                            @endforeach

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Product Brand <sub class="text-danger">(required)</sub></label>
                                            <input type="text" value="{{$product->brand}}" required class="form-control" name="brand" placeholder='Ex: ABC'>

                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Model <sub class="text-danger">(required)</sub></label>
                                            <input value="{{$product->model}}" type="text" required class="form-control" name="model" placeholder='Ex: ABC-342'>
                                            <small class="form-text text-muted">Model must be unique!</small>
                                        </div>
                                    </div>

                                
                                    <div class="col-md-4 mt-3 ">
                                        <div class="form-group">
                                            <label>Product Size <sub class="text-danger">(required)</sub></label>
                                            <input value="{{$product->size}}" type="text" required class="form-control" name="size" placeholder='Ex: 330v / 56"'>
                                            <small class="form-text text-muted">Model must be unique!</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label>Description <sub class="text-danger"></sub></label>
                                 <textarea name="description"  cols="30" rows="5" class="form-control">{{$product->description}}</textarea>
                                
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Regular Price in taka <sub class="text-danger">(required)</sub></label>
                                            <input value="{{$product->regular_price}}" type="number" required class="form-control inputNumber" name="regular_price" placeholder='Ex: 4400'>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Offer Price in taka <sub class="text-danger"></sub></label>
                                            <input value="{{$product->offer_price}}" type="number" class="form-control inputNumber" name="offer_price" placeholder='Ex: 4400'>
                                            <small class="form-text text-muted">Default offer price 00 tk!</small>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Quantity <sub class="text-danger">(required)</sub></label>
                                            <input value="{{$product->quantity}}" type="number" required class="form-control inputNumber" name="quantity" placeholder='Ex: 40'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                    <label>
                                        Status :
                                    </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="activeStatus" value="1" 
                                    @if ($product->status == 1)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="activeStatus">
                                        Active
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="inactiveStatus" value="0" @if ($product->status == 0)
                                    checked
                                @endif>
                                    <label class="form-check-label" for="inactiveStatus">
                                        Inactive
                                    </label>
                                </div>
                               
                                <small class="form-text text-muted">If inactive it will not apear in page!</small>
                            </div>

                            <div class="col-md-4">
                                    <label>
                                        Exclusive Product :
                                    </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exclusive" id="activeExclusive" value="1" @if ($product->exclusive == 1)
                                        checked
                                    @endif>
                                    <label class="form-check-label" for="activeExclusive">
                                        Active
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exclusive" id="inactiveExclusive" value="0" 
                                    @if ($product->exclusive == 0)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="inactiveExclusive">
                                        Inactive
                                    </label>
                                </div>
                               
                                <small class="form-text text-muted">If active it will apear in exclusive list!</small>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                    <!-- Add new product form end -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
</div>
@endsection