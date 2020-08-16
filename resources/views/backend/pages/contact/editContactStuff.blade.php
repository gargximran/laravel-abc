@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Contact Stuff Information</h4>
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
                            <form action="{{ route('contactstuff.update', $contactstuff->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                                <div class="row">

                                    <!-- stuff one start -->
                                    <div class="col-md-6">
                                        <h5 class="text-left">Stuff One</h5>
                                        <div class="form-group">
                                            <label>Stuff Name</label>
                                            <input type="text" class="form-control" name="nameOne" value="{{ $contactstuff->nameOne }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" name="designationOne" value="{{ $contactstuff->designationOne }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phoneOne" value="{{ $contactstuff->phoneOne }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="emailOne" value="{{ $contactstuff->emailOne }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Image  ( Please upload 512x512px size image )</label> <br>
                                            <img src="{{ asset('images/contactstuff/' . $contactstuff->imageOne) }}" width="150px" alt=""> <br> <br>
                                            <input type="file" class="form-control-file" name="imageOne">
                                        </div>
                                    </div>
                                    <!-- stuff one start -->

                                    <!-- stuff two start -->
                                    <div class="col-md-6">
                                        <h5 class="text-left">Stuff One</h5>
                                        <div class="form-group">
                                            <label>Stuff Name</label>
                                            <input type="text" class="form-control" name="nameTwo" value="{{ $contactstuff->nameTwo }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" name="designationTwo" value="{{ $contactstuff->designationTwo }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phoneTwo" value="{{ $contactstuff->phoneTwo }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="emailTwo" value="{{ $contactstuff->emailTwo }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Image ( Please upload 512x512px size image )</label> <br>
                                            <img src="{{ asset('images/contactstuff/' . $contactstuff->imageTwo) }}" width="150px" alt=""> <br> <br>
                                            <input type="file" class="form-control-file" name="imageTwo">
                                        </div>
                                    </div>
                                    <!-- stuff two start -->

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