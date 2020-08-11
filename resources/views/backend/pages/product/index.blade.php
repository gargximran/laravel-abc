@extends('backend.template.layout')


@section('create_new_button')
<a class="nav-link btn btn-primary" href="{{route('product_create_backend')}}" role="button">
    <span>Add Product</span>
</a>

@endsection


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
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Model</th>
                                    <th>Size</th>
                                    <th>Code</th>
                                    <th>Qty.</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category->parent->name}} > {{$product->category->name}}</td>
                                        <td>{{$product->model}}</td>
                                        <td>{{$product->size}}</td>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->quantity}}</td>

                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href=""  class="btn btn-primary  btn-sm"><i class="mdi mdi-eye"></i> View</a> 
                                                <a href="" class="btn btn-warning btn-sm"><i class="mdi mdi-account-edit"></i> Edit</a> 
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

                                                    <form action="" method="POST">
                                                        <input type="hidden" name="_method" value="delete">                                                    <input type="hidden" name="_token" value="uvzWM02xAsBfvlkvhNEFjrRmm9quBG8EusW29Jb3">                                                    <button class="dropdown-item bg-danger" type="submit">Confirm Delete?</button>
                                                    </form>

                                                        <a
                                                            class="dropdown-item bg-secondary"
                                                            href="#"
                                                            >Cancel</a
                                                        >
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                                                               
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
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
</div>
@endsection