@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Manage Home Page</h4>
        </div>
    </div>
    <!-- title row end -->

    <div class="row">
        <div class="col-md-12">
            <!-- add message -->
            @if( session()->has('message') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulation!</strong> {{ session()->get('message') }}
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
                            <h5>Manage Banner</h5>
                        </div>
                    </div>

                    <!-- add homebanner row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addhomebanner">Add Banner</button>
                            <!-- Modal -->
                            <div class="modal fade" id="addhomebanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New homebanner</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('homebanner.create') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" rows="2" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input type="text" class="form-control" name="link" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Add homebanner</label>
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
                    <!-- add homebanner row end -->

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-dark">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1 ;
                                    @endphp
                                    @foreach( $homebanners as $homebanner )
                                    <tr class="text-center">
                                        <th scope="row">{{ $i }}</th>
                                        <td>
                                            <img src="{{ asset('images/banner/' . $homebanner->image ) }}" class="img-fluid" width="50px" alt="">
                                        </td>
                                        <td>{{ $homebanner->title }}</td>
                                        <td>{{ $homebanner->description }}</td>
                                        <td>{{ $homebanner->link }}</td>
                                        <td>

                                            <!-- edit modal start -->
                                            <a class="btn btn-primary" href="{{ route('homebanner.edit', $homebanner->slug) }}">Edit</a>

                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deletehomebanner">Delete</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deletehomebanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to this this homebanner?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('homebanner.delete', $homebanner->slug) }}" method="POST">
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

    <!-- display section card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="overflow: scroll;height: 500px;">

                    <div class="row">
                        <div classcol-md-12>
                            <h5>Manage Display Section</h5>
                        </div>
                    </div>

                    <!-- add  row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addhomedisplay">Add Display Item</button>
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-lg" id="addhomedisplay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Display</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('homedisplay.create') }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <!-- display item row start -->
                                                <div class="row">

                                                    <!-- display one start -->
                                                    <div class="col-md-4">
                                                        <h5 class="text-left">Display One</h5>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" class="form-control" name="titleOne" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="descriptionOne" rows="0" class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input type="file" class="form-control-file" name="imageOne" required>
                                                        </div>
                                                    </div>
                                                    <!-- display one end -->

                                                    <!-- display two start -->
                                                    <div class="col-md-4">
                                                        <h5 class="text-left">Display Two</h5>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" class="form-control" name="titleTwo" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="descriptionTwo" rows="0" class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input type="file" class="form-control-file" name="imageTwo" required>
                                                        </div>
                                                    </div>
                                                    <!-- display two end -->

                                                    <!-- display three start -->
                                                    <div class="col-md-4">
                                                        <h5 class="text-left">Display Three</h5>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" class="form-control" name="titleThree" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="descriptionThree" rows="0" class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input type="file" class="form-control-file" name="imageThree" required>
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
                                                            <input type="text" class="form-control" name="title" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="description" rows="0" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- display one end -->

                                                </div>
                                                <!-- title and desc row end -->

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                    </div>

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
                                        <th scope="col">Title One</th>
                                        <th scope="col">Title Two</th>
                                        <th scope="col">Title Three</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1 ;
                                    @endphp
                                    @foreach( $homedisplay as $homedisplay )
                                    <tr class="text-center">
                                        <th scope="row">{{ $i }}</th>

                                        <td>{{ $homedisplay->titleOne }}</td>
                                        <td>{{ $homedisplay->titleTwo }}</td>
                                        <td>{{ $homedisplay->titleThree }}</td>
                                        <td>{{ $homedisplay->title }}</td>
                                        <td>

                                            <!-- edit modal start -->
                                            <a class="btn btn-primary" href="{{ route('homedisplay.edit', $homedisplay->slug) }}">Edit</a>

                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deletehomedisplay">Delete</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deletehomedisplay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to this this homedisplay?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('homedisplay.delete', $homedisplay->slug) }}" method="POST">
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
    <!-- display section card end -->






















    <!-- testimonial card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="overflow: scroll;height: 500px;">

                    <div class="row">
                        <div classcol-md-12>
                            <h5>Manage Testimonial</h5>
                        </div>
                    </div>

                    <!-- add row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addtestimonial">Add New Testimonial</button>
                            <!-- Modal -->
                            <div class="modal fade" id="addtestimonial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Testimonial</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('testimonial.create') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Commenter Name</label>
                                                    <input type="text" class="form-control" name="name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Commenter Designation</label>
                                                    <input type="text" class="form-control" name="designation" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Commenter Comments</label>
                                                    <textarea name="comments" rows="2" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Add Commenter Image</label>
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
                    <!-- add row end -->

                    <!-- manage row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-dark">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Comment</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1 ;
                                    @endphp
                                    @foreach( $testimonials as $testimonial )
                                    <tr class="text-center">
                                        <th scope="row">{{ $i }}</th>
                                        <td>
                                            <img src="{{ asset('images/testimonial/' . $testimonial->image ) }}" class="img-fluid" width="50px" alt="">
                                        </td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ $testimonial->designation }}</td>
                                        <td>{{ $testimonial->comments }}</td>
                                        <td>

                                            <!-- edit modal start -->
                                            <a class="btn btn-primary" href="{{ route('testimonial.edit', $testimonial->id) }}">Edit</a>

                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deletetestimonial">Delete</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deletetestimonial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to this this commenter?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('testimonial.delete', $testimonial->id) }}" method="POST">
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
    <!-- testimonial card end -->















</div>
<!-- container end-->

@endsection