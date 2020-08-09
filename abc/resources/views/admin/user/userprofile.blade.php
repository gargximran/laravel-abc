@extends('admin.admin_master')
@section('title')
@endsection
@section('mainContent')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Profile
                            <small>User  </small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-details text-center">
                            <img src="{{asset('public/images/'.$user->images)}}" alt="" class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                            <h5 class="f-w-600 mb-0">{{$user->name}}</h5>
                            <span>{{$user->email}}</span>
                            <!--<div class="social">-->
                            <!--    <div class="form-group btn-showcase">-->
                            <!--        <button class="btn social-btn btn-fb d-inline-block"> <i class="fa fa-facebook"></i></button>-->
                            <!--        <button class="btn social-btn btn-twitter d-inline-block"><i class="fa fa-google"></i></button>-->
                            <!--        <button class="btn social-btn btn-google d-inline-block mr-0"><i class="fa fa-twitter"></i></button>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <hr>
                        <!--<div class="project-status">-->
                        <!--    <h5 class="f-w-600">Employee Status</h5>-->
                        <!--    <div class="media">-->
                        <!--        <div class="media-body">-->
                        <!--            <h6>Performance<span class="pull-right">80%</span></h6>-->
                        <!--            <div class="progress sm-progress-bar">-->
                        <!--                <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="media">-->
                        <!--        <div class="media-body">-->
                        <!--            <h6>Overtime <span class="pull-right">60%</span></h6>-->
                        <!--            <div class="progress sm-progress-bar">-->
                        <!--                <div class="progress-bar bg-secondary" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="media">-->
                        <!--        <div class="media-body">-->
                        <!--            <h6>Leaves taken<span class="pull-right">70%</span></h6>-->
                        <!--            <div class="progress sm-progress-bar">-->
                        <!--                <div class="progress-bar bg-danger" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card tab2-card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="mr-2"></i>Profile</a>
                            </li>
                           
                        </ul>
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                                <h5 class="f-w-600">Profile</h5>
                                <div class="table-responsive profile-table">
                                    <table class="table table-responsive">
                                        <tbody>
                                        <tr>
                                            <td>Name:</td>
                                            <td>{{$user->name}}</td>
                                        </tr>
                                       
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                    
                                        <tr>
                                            <td>Mobile Number:</td>
                                            <td>{{$user->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td>{{$user->address}}</td>
                                        </tr>
                                         <tr>
                                            <td>User-Type:</td>
                                            <td><?php if($user->user_type=='admin'){?>
								                		<div class='badge badge-success'>admin</div>
								                	<?php }else{?>
								                		<div class='badge badge-info'>operator</div>
								                	<?php }?></td>
                                        </tr>
                                             <tr>
                                            <td>Permission:</td>
                                            <td>
                                                
                                                <?php if($user->per_edit==1){?>
								                		<div class='badge badge-success'>Edit-Yes</div>
								                	<?php }else{?>
								                		<div class='badge badge-danger'>Edit-No</div>
								                	<?php }?>
								                	
								                	<?php if($user->per_delete==1){?>
								                		<div class='badge badge-success'>Delete-Yes</div>
								                	<?php }else{?>
								                		<div class='badge badge-danger'>Delete-No</div>
								                	<?php }?>
                                            </td>
                                      
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
@endsection