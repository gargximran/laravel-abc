@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Banner</h4>
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
                            <form action="{{ route('abcinfo.update', $abcinfo->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label>A stands for</label>
                                    <input type="text" class="form-control" name="a" value="{{ $abcinfo->a }}">
                                </div>
                                <div class="form-group">
                                    <label>B stands for</label>
                                    <input type="text" class="form-control" name="b" value="{{ $abcinfo->b }}">
                                </div>
                                <div class="form-group">
                                    <label>C stands for</label>
                                    <input type="text" class="form-control" name="c" value="{{ $abcinfo->c }}">
                                </div>
                                <div class="form-group">
                                    <label>Professional Experience ( Year )</label>
                                    <input type="text" class="form-control" name="year" value="{{ $abcinfo->year }}">
                                </div>
                                <div class="form-group">
                                    <label>Image</label> <br>
                                    <img src="{{ asset('images/abcinfo/' . $abcinfo->image) }}" width="150px" alt=""> <br> <br>
                                    <input type="file" class="form-control-file" name="image">
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