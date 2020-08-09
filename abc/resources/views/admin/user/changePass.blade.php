@extends('admin.admin_master')
@section('mainContent')
        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Create User
                                    
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Users </li>
                                <li class="breadcrumb-item active">Create User </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                                @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
              @endif
                        <div class="card tab2-card">
                         <form action="{{route('admin.chnagePass')}}" method="post" enctype="multipart/form-data">
                         	@csrf
                            <div class="card-body">
                          
                                        <!-- <form class="needs-validation user-add" novalidate=""> -->
                                            <h4>Change Password</h4>
                                            
                                            <div class="form-group row {{ $errors->has('newpassword') ? ' has-error' : '' }}">
                                                <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span>New Password</label>
                                                <input class="form-control col-xl-8 col-md-7 " id="validationCustom3" type="password" name="newpassword" required="">
                                                 @if ($errors->has('newpassword'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('newpassword') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group row {{ $errors->has('confirmpassword') ? ' has-error' : '' }}">
                                                <label for="validationCustom4" class="col-xl-3 col-md-4 "><span>*</span> Confirm Password</label>
                                                <input class="form-control col-xl-8 col-md-7" id="validationCustom4" name="confirmpassword" type="password" required="">
                                                @if ($errors->has('confirmpassword'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('confirmpassword') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            
                                            <div class="pull-right">
                                   			 <button type="submit" class="btn btn-primary">Save</button>
                                			</div>
                                       <!--  </form> -->
                            
                                
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>
@endsection