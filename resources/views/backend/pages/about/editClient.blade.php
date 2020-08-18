@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Client</h4>
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
                            <form action="{{ route('client.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" class="form-control" name="cName"  value="{{ $client->cName }}">
                                </div>
                                <div class="form-group">
                                    <label>Comments</label>
                                    <input type="text" class="form-control" name="comments"  value="{{ $client->comments }}">
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" name="link"  value="{{ $client->link }}">
                                </div>
                                <div class="form-group">
                                    <label>Image </label> <br>
                                    <img src="{{ asset('images/client/' . $client->image ) }}" width="150px" alt=""> <br> <br>
                                    <input type="file" class="form-control-file" name="image" >
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