@extends('backend.template.layout')




@section('per_page_css')
 <link rel="stylesheet" href="{{asset('backend/assets/libs/quill/dist/quill.snow.css')}}">
@endsection


@section('per_page_js')
    <script src="{{asset('backend/assets/libs/quill/dist/quill.min.js')}}"></script>
    <script>
        var quill = new Quill('#quillEditor', {
            theme:'snow'
        });

        quill.on('text-change', function() {
            document.getElementById('specification').value = quill.root.innerHTML;
            console.log(document.getElementById('specification').value)
            });
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
                    <h2 class="bg-info text-center px-2 text-white">Add New Product</h2>
                    <!-- add new product form start -->
                    <form action="">
                        <input type="hidden" name="spec" id="specification">
                        <div class="row">
                            <div class="col-md-4  mt-3">
                                <div class="form-group">
                                    <label>Product Name <sub class="text-danger">(required)</sub></label>
                                    <input type="text" required class="form-control" name="name" placeholder='Ex: 56" celling Fan'>
                                    <small class="form-text text-muted">Please fill name carefully!</small>
                                </div>
                            </div>
                            <div class="col-md-8">
                            <h2 class="h5 text-center text-danger bg-dark">Image Size must be Square</h2>
                                    <div class="row">
                                        
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label>Product Image 1 <sub class="text-danger">(required)</sub></label>
                                                <input accept="image/*" type="file" required class="form-control-file" name="image_1">
                                                <small class="form-text text-muted">Primary Image</small>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label>Product Image 2 <sub class="text-danger">(required)</sub></label>
                                                <input accept="image/*" type="file" required class="form-control-file" name="image_2">
                                                <small class="form-text text-muted">Sub Image</small>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label>Product Image 3 <sub class="text-danger">(required)</sub></label>
                                                <input accept="image/*" type="file" required class="form-control-file" name="image_3">
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
                                                <option value="{{$child->id}}">--{{$child->name}}</option>
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
                                            <input type="text" required class="form-control" name="brand" placeholder='Ex: ABC'>

                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Model <sub class="text-danger">(required)</sub></label>
                                            <input type="text" required class="form-control" name="model" placeholder='Ex: ABC-342'>
                                            <small class="form-text text-muted">Model must be unique!</small>
                                        </div>
                                    </div>

                                
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Product Size <sub class="text-danger">(required)</sub></label>
                                            <input type="text" required class="form-control" name="size" placeholder='Ex: 330v / 56"'>
                                            <small class="form-text text-muted">Model must be unique!</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label>Specification <sub class="text-danger">(required)</sub></label>
                                 <div id="quillEditor">
                                     
                                 </div>
                                
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