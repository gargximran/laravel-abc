@extends('backend.template.layout')
@section('main_card_content')

<!-- container start -->
<div class="container-fluid">

    <!-- title row start -->
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit {{ Auth::user()->name }}'s Profile</h4>
        </div>
    </div>
    <!-- title row end -->

    <div class="row">
        <div class="col-md-12">
            <!-- update message -->
            @if( session()->has('update') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulation!</strong> {{ session()->get('update') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <!-- update password failed -->
            @if( session()->has('oldpassnotmatch') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> {{ session()->get('oldpassnotmatch') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <!-- new password not matched -->
            @if( session()->has('updatePassNotMatch') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> {{ session()->get('updatePassNotMatch') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <!-- password update message -->
            @if( session()->has('passupdatesuccess') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulation!</strong> {{ session()->get('passupdatesuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <!-- account delete failed message -->
            @if( session()->has('deleteFailed') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> {{ session()->get('deleteFailed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>

    <!-- main card start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <!-- edit row start -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- image start -->
                                <div class="form-group">
                                    <label>Profile Picture</label> <br>
                                    @if( $user->image == NULL )
                                    <img src="{{ asset('images/profile/user.png') }}" width="150px" style="margin: 15px 0;" alt="">
                                    @else
                                    <img src="{{ asset('images/profile/' . $user->image) }}" style="margin: 15px 0;" width="150px" alt="">
                                    @endif
                                    <input type="file" class="form-control-file" name="image">
                                </div>
                                <!-- image end -->

                                <!-- username start -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </div>
                                <!-- username end -->

                                <!-- email start -->
                                <div class="form-group">
                                    <label>Email ( Please use a valid email address )</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                                <!-- email end -->

                                <!-- phone start -->
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                </div>
                                <!-- phone end -->

                                <!-- address start -->
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" rows="2" class="form-control">{{ $user->address }}</textarea>
                                </div>
                                <!-- address end -->

                                <div class="form-group ">
                                    <button class="btn btn-success" type="submit">Update Profile</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- edit row end -->

                    <!-- change password start -->
                    <div class="row changepass">
                        <div class="col-md-12">
                            <form action="{{ route('updatePassword', $user->id) }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <input type="password" placeholder="Enter Old Passowrd" name="oldpassword" class="form-control" required="">
                                </div>

                                <div class="form-group">
                                    <input type="password" placeholder="Enter New Passowrd" name="newpassword" class="form-control" required="">
                                </div>

                                <div class="form-group">
                                    <input type="password" placeholder="Re-Enter New Passowrd" name="cnewpassword" class="form-control" required="">
                                </div>

                                <button type="submit" class="btn btn-success">Change Password</button>
                            </form>
                        </div>
                    </div>
                    <!-- change password end -->

                    <!-- delete account modal -->
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccount{{ $user->id }}">
                                Delete Account
                            </button>
                            <div class="modal fade" id="deleteAccount{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are You sure Want to delete account?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('profile.delete', $user->id) }}" method="post">
                                                @csrf

                                                <div class="form-group">
                                                    <input type="password" placeholder="Enter Your Passowrd" name="password" class="form-control" required="">
                                                </div>

                                                <div class="form-group text-right">
                                                    <button type="submit" class="btn btn-success ">Delete</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- delete account modal -->

                </div>
            </div>
        </div>
    </div>
    <!-- main card end -->

</div>
<!-- container end-->

@endsection