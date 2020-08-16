@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Contact Information</h4>
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
                            <form action="{{ route('contactinfo.update', $contactinfo->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="row">

                                    <!-- address start -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Contact Address</label>
                                            <textarea name="address"  rows="2" class="form-control" required >{{ $contactinfo->address }}</textarea>
                                        </div>
                                    </div>
                                    <!-- address start -->

                                    <!-- head office start -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Head Office</label>
                                            <textarea name="headoffice"  rows="2" class="form-control" required >{{ $contactinfo->headoffice }}</textarea>
                                        </div>
                                    </div>
                                    <!-- head office start -->

                                    <!-- phone and email start -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone" required value="{{ $contactinfo->phone }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" class="form-control" name="email" required value="{{ $contactinfo->email }}">
                                        </div>
                                    </div>
                                    <!-- phone and email start -->

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