@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Vision, Mission, Values</h4>
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
                            <form action="{{ route('vision.update', $vision->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label>Vision</label>
                                    <input type="text" class="form-control" name="vision" value="{{ $vision->vision }}">
                                </div>
                                <div class="form-group">
                                    <label>Mission</label>
                                    <input type="text" class="form-control" name="mission" value="{{ $vision->mission }}">
                                </div>
                                <div class="form-group">
                                    <label>Values</label>
                                    <input type="text" class="form-control" name="value" value="{{ $vision->value }}">
                                </div>
                                <div class="form-group">
                                    <label>Image ( Please uplaod 380x468px size image )</label> <br>
                                    <img src="{{ asset('images/vision/' . $vision->image) }}" width="150px" alt="">
                                    <input type="file" class="form-control-file" name="image" > <br> <br>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
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