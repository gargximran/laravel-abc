@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Manage Gallery Page</h4>
        </div>
    </div>
    <!-- title row end -->

    <div class="row">
        <div class="col-md-12">
            <!-- add message -->
            @if( session()->has('create') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulation!</strong> {{ session()->get('create') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <!-- update message -->
            @if( session()->has('update') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulation!</strong> {{ session()->get('update') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <!-- delete message -->
            @if( session()->has('delete') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulation!</strong> {{ session()->get('delete') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <!-- create failed message -->
            @if( session()->has('createFailed') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> {{ session()->get('createFailed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>

    <!-- banner card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="overflow: scroll;height: 500px;">

                    <div class="row">
                        <div classcol-md-12>
                            <h5>Manage Gallery</h5>
                        </div>
                    </div>

                    <!-- add  row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addgallery">Add Gallery</button>
                            <!-- Modal -->
                            <div class="modal fade" id="addgallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Gallery</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('gallery.create') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Caption</label>
                                                    <input type="text" class="form-control" name="caption" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Add Gallery Image</label>
                                                    <input type="file" class="form-control-file" name="image" required>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add  row end -->

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-dark">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Caption</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1 ;
                                    @endphp
                                    @foreach( $gallerys as $gallery )
                                    <tr class="text-center">
                                        <th scope="row">{{ $i }}</th>
                                        <td>
                                            <img src="{{ asset('images/gallery/' . $gallery->image ) }}" class="img-fluid" width="50px" alt="">
                                        </td>
                                        <td>{{ Str::limit($gallery->caption, 50) }}</td>
                                        <td>

                                            <!-- edit modal start -->
                                            <a class="btn btn-primary" href="{{ route('gallery.edit', $gallery->id) }}">Edit</a>

                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deletegallery">Delete</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deletegallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to this this gallery?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('gallery.delete', $gallery->id) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-success">Yes</button>
                                                            </form>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                    $i++ ;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- manage row end -->

                </div>
            </div>
        </div>
    </div>
    <!-- banner card end -->















</div>
<!-- container end-->

@endsection