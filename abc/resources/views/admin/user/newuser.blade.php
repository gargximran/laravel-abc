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
                        <div class="card tab2-card">
                         <form action="{{route('admin.storeUser')}}" method="post" enctype="multipart/form-data">
                         	@csrf
                            <div class="card-body">
                          
                                        <!-- <form class="needs-validation user-add" novalidate=""> -->
                                            <h4>Account Details</h4>
                                            <div class="form-group row">
                                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Name</label>
                                                <input class="form-control col-xl-8 col-md-7" id="validationCustom0" type="text" name="name" required="">
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Email</label>
                                                <input class="form-control col-xl-8 col-md-7" id="validationCustom2" type="email" name="email" required="">
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Phone</label>
                                                <input class="form-control col-xl-8 col-md-7" id="validationCustom1" type="text" name="phone" required="">
                                            </div>
                                             <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Address</label>
                                                <input class="form-control col-xl-8 col-md-7" id="validationCustom1" type="text" name="address" required="">
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span> Password</label>
                                                <input class="form-control col-xl-8 col-md-7" id="validationCustom3" type="password" name="password" required="">
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom4" class="col-xl-3 col-md-4"><span>*</span> Confirm Password</label>
                                                <input class="form-control col-xl-8 col-md-7" id="validationCustom4" type="password" required="">
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span>Photo</label>
                                                <input class="form-control col-xl-8 col-md-7" id="validationCustom1" type="file" name="image" required="">
                                            </div>
                                        <!-- </form> -->
                                   
                                       <!--  <form class="needs-validation user-add" novalidate=""> -->
                                            <div class="permission-block">
                                                <div class="attribute-blocks">
                                                    <h5 class="f-w-600 mb-3">Product Related permition </h5>
                                                    <div class="row">
                                                        <div class="col-xl-3 col-sm-4">
                                                            <label>User Type</label>
                                                        </div>
                                                        <div class="col-xl-9 col-sm-8">
                                                            <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                                <label class="d-block" for="edo-ani1">
                                                                    <input class="radio_animated" id="edo-ani1" type="radio" value="admin" name="rdo-ani">
                                                                    Admin
                                                                </label>
                                                                <label class="d-block" for="edo-ani2" style="padding-left: 14px;">
                                                                    <input class="radio_animated" id="edo-ani2" type="radio" value="enop" name="rdo-ani" checked="">
                                                                    Enty Oparator
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-3 col-sm-4">
                                                            <label>Edit Option</label>
                                                        </div>
                                                        <div class="col-xl-9 col-sm-8">
                                                            <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                                <label class="d-block" for="edo-ani3">
                                                                    <input class="radio_animated" id="edo-ani3" type="radio" value="1" name="per_edit">
                                                                    Yes
                                                                </label>
                                                                <label class="d-block" for="edo-ani4" style="padding-left: 37px;">
                                                                    <input class="radio_animated" id="edo-ani4" type="radio" value="0" name="per_edit" checked="">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-3 col-sm-4">
                                                            <label>Delete Option</label>
                                                        </div>
                                                        <div class="col-xl-9 col-sm-8">
                                                            <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                                <label class="d-block" for="edo-ani5" >
                                                                    <input class="radio_animated" id="edo-ani5" type="radio" value="1" name="per_delete">
                                                                    Yes
                                                                </label>
                                                                <label class="d-block" for="edo-ani6" style="padding-left: 37px;">
                                                                    <input class="radio_animated" id="edo-ani6" type="radio" value="0" name="per_delete" checked="">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-3 col-sm-4">
                                                            <label class="mb-0 sm-label-radio">status</label>
                                                        </div>
                                                        <div class="col-xl-9 col-sm-8">
                                                            <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated pb-0">
                                                                <label class="d-block mb-0" for="edo-ani7">
                                                                    <input class="radio_animated" id="edo-ani7" value="active" type="radio" name="status">
                                                                    Active
                                                                </label>
                                                                <label class="d-block mb-0" for="edo-ani8" style="padding-left: 14px;">
                                                                    <input class="radio_animated" id="edo-ani8" value="deactive type="radio" name="status" checked="">
                                                                    Deactive
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  -->
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