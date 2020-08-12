@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Home Display</h4>
        </div>
    </div>
    <!-- title row end -->

    <!-- main card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <!-- edit row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <form action="{{ route('homedisplay.update', $homedisplay->slug) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                    <!-- display item row start -->
                                    <div class="row">

                                        <!-- display one start -->
                                        <div class="col-md-4">
                                            <h5 class="text-left">Display One</h5>
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="titleOne" value="{{ $homedisplay->titleOne }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="descriptionOne" rows="0" class="form-control">{{ $homedisplay->descriptionOne }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Image</label> <br>
                                                <img src="{{ asset('images/homedisplay/' . $homedisplay->imageOne) }}" width="150px" alt=""> <br> <br>
                                                <input type="file" class="form-control-file" name="imageOne" >
                                            </div>
                                        </div>
                                        <!-- display one end -->

                                        <!-- display two start -->
                                        <div class="col-md-4">
                                            <h5 class="text-left">Display Two</h5>
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="titleTwo" value="{{ $homedisplay->titleTwo }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="descriptionTwo" rows="0" class="form-control">{{ $homedisplay->descriptionTwo }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Image</label> <br>
                                                <img src="{{ asset('images/homedisplay/' . $homedisplay->imageTwo) }}" width="150px" alt=""> <br> <br>
                                                <input type="file" class="form-control-file" name="imageTwo" >
                                            </div>
                                        </div>
                                        <!-- display two end -->

                                        <!-- display three start -->
                                        <div class="col-md-4">
                                            <h5 class="text-left">Display Three</h5>
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="titleThree" value="{{ $homedisplay->titleThree }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="descriptionThree" rows="0" class="form-control">{{ $homedisplay->descriptionThree }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Image</label> <br>
                                                <img src="{{ asset('images/homedisplay/' . $homedisplay->imageThree) }}" width="150px" alt=""> <br> <br>
                                                <input type="file" class="form-control-file" name="imageThree" >
                                            </div>
                                        </div>
                                        <!-- display three end -->


                                    </div>
                                    <!-- display item row end -->

                                    <!-- title and desc row start -->
                                    <div class="row" style="border-top: 1px solid #3e5569; ">

                                        <!-- display one start -->
                                        <div class="col-md-12" style="margin-top: 15px">
                                            <h5 class="text-left">Display Information Right</h5>
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" value="{{ $homedisplay->title }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" rows="0" class="form-control">{{ $homedisplay->description }}</textarea>
                                            </div>
                                        </div>
                                        <!-- display one end -->

                                    </div>
                                    <!-- title and desc row end -->

                                    <div class="row">

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>

                                    </div>

                                </form>
                        </div>
                    </div>
                    <!-- edit row end -->

                </div>
            </div>
        </div>
    </div>
    <!-- main card end -->

</div>
<!-- container end-->

@endsection 