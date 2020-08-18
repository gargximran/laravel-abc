@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Team Member</h4>
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
                            <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label>Team Member Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $team->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Team Member Designation</label>
                                    <input type="text" class="form-control" name="designation" value="{{ $team->designation }}">
                                </div>
                                <div class="form-group">
                                    <label>Team Member Description</label>
                                    <textarea name="description" rows="2" class="form-control">{{ $team->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Team Member Image </label> <br>
                                    <img src="{{ asset('images/team/'. $team->image) }}" width="150px" alt=""> <br> <br>
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