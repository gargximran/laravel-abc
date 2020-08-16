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

    <!-- map card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="overflow: scroll;height: 500px;">

                    <div class="row">
                        <div classcol-md-12>
                            <h5>Manage Map</h5>
                        </div>
                    </div>

                    <!-- add row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addmap">Add Map</button>
                            <!-- Modal -->
                            <div class="modal fade" id="addmap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Map</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('map.create') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Map Iframe Link</label>
                                                    <input type="text" class="form-control" name="link" required>
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
                                        <th scope="col">Mini Map</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1 ;
                                    @endphp
                                    @foreach( $maps as $map )
                                    <tr class="text-center">
                                        <th scope="row">{{ $i }}</th>
                                        <td>
                                            <iframe src="{{  $map->link }}" frameborder="0"></iframe>
                                        </td>
                                        <td>

                                            <!-- edit modal start -->
                                            <a class="btn btn-primary" href="{{ route('map.edit', $map->id) }}">Edit</a>

                                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to this this map?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('map.delete', $map->id) }}" method="POST">
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
    <!-- map card end -->


















    <!-- contact info start card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="overflow: scroll;height: 500px;">

                    <div class="row">
                        <div classcol-md-12>
                            <h5>Manage Contact Information</h5>
                        </div>
                    </div>

                    <!-- add row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#addcontactinfo">Add Contact Information</button>
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-lg" id="addcontactinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Contact Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('contactinfo.create') }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="row">
                                                    
                                                    <!-- address start -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Contact Address</label>
                                                            <textarea name="address"  rows="2" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- address start -->

                                                    <!-- head office start -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Head Office</label>
                                                            <textarea name="headoffice"  rows="2" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- head office start -->

                                                    <!-- phone and email start -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input type="text" class="form-control" name="phone">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email Address</label>
                                                            <input type="email" class="form-control" name="email">
                                                        </div>
                                                    </div>
                                                    <!-- phone and email start -->

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
                                        <th scope="col">Address</th>
                                        <th scope="col">Head Office</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email Map</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1 ;
                                    @endphp
                                    @foreach( $contactinfos as $contactinfo )
                                    <tr class="text-center">
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ Str::limit($contactinfo->address,10) }}</td>
                                        <td>{{ Str::limit($contactinfo->headoffice,10) }}</td>
                                        <td>{{$contactinfo->phone }}</td>
                                        <td>{{$contactinfo->email }}</td>
                                        <td>

                                            <!-- edit modal start -->
                                            <a class="btn btn-primary" href="{{ route('contactinfo.edit', $contactinfo->id) }}">Edit</a>

                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deletecontactinfo">Delete</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deletecontactinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this contact information?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('contactinfo.delete', $contactinfo->id) }}" method="POST">
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
    <!-- contact info start card end -->


























    <!-- contact with stuff start card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="overflow: scroll;height: 500px;">

                    <div class="row">
                        <div classcol-md-12>
                            <h5>Manage Contact With Management</h5>
                        </div>
                    </div>

                    <!-- add row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#contactstuff">Add Contact Information</button>
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-lg" id="contactstuff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Contact Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('contactstuff.create') }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="row">
                                                    
                                                    <!-- stuff one start -->
                                                    <div class="col-md-6">
                                                        <h5 class="text-left">Stuff One</h5>
                                                        <div class="form-group">
                                                            <label>Stuff Name</label>
                                                            <input type="text" class="form-control" name="nameOne">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Designation</label>
                                                            <input type="text" class="form-control" name="designationOne">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" class="form-control" name="phoneOne">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control" name="emailOne">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Image ( Please upload 512x512 image )</label>
                                                            <input type="file" class="form-control-file" name="imageOne">
                                                        </div>
                                                    </div>
                                                    <!-- stuff one start -->

                                                    <!-- stuff two start -->
                                                    <div class="col-md-6">
                                                        <h5 class="text-left">Stuff One</h5>
                                                        <div class="form-group">
                                                            <label>Stuff Name</label>
                                                            <input type="text" class="form-control" name="nameTwo">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Designation</label>
                                                            <input type="text" class="form-control" name="designationTwo">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" class="form-control" name="phoneTwo">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control" name="emailTwo">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Image ( Please upload 512x512 image )</label>
                                                            <input type="file" class="form-control-file" name="imageTwo">
                                                        </div>
                                                    </div>
                                                    <!-- stuff two start -->

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
                                        <th scope="col">Stuff One Name</th>
                                        <th scope="col">Stuff One Phone</th>
                                        <th scope="col">Stuff Two Name</th>
                                        <th scope="col">Stuff Two Phone</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1 ;
                                    @endphp
                                    @foreach( $contactstuffs as $contactstuff )
                                    <tr class="text-center">
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{$contactstuff->nameOne }}</td>
                                        <td>{{$contactstuff->phoneOne }}</td>
                                        <td>{{$contactstuff->nameTwo }}</td>
                                        <td>{{$contactstuff->phoneTwo }}</td>
                                        <td>

                                            <!-- edit modal start -->
                                            <a class="btn btn-primary" href="{{ route('contactstuff.edit', $contactstuff->id) }}">Edit</a>

                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deletecontactstuff">Delete</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deletecontactstuff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this contact stuff information?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('contactstuff.delete', $contactstuff->id) }}" method="POST">
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
    <!-- contact with stuff start card end -->















</div>
<!-- container end-->

@endsection