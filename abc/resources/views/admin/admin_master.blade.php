<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="ssttechbd">
    <link rel="icon" href="{{asset('public/adminassets/images/dashboard/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('public/admin/assets/images/dashboard/favicon.png')}}" type="image/x-icon">
    <title>Admin - ABC</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/font-awesome/css/font-awesome.min.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/flag-icon.css')}}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/icofont.css')}}">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/prism.css')}}">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/chartist.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/bootstrap.css')}}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/admin.css')}}">
    <!-- Dropzone css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>

<body>

    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row">
                <div class="main-header-left d-lg-none">
                    <div class="logo-wrapper"><a href="{{url('/admin')}}"><img class="blur-up lazyloaded" src="{{asset('public/admin/assets/images/dashboard/logo.png')}}" alt=""></a></div>
                </div>
                <div class="mobile-sidebar">
                    <div class="media-body text-right switch-sm">
                        <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                    </div>
                </div>
                <div class="nav-right col">
                    <ul class="nav-menus">
                        <!--                     <li>
                        <form class="form-inline search-form">
                            <div class="form-group">
                                <input class="form-control-plaintext" type="search" placeholder="Search.."><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                            </div>
                        </form>
                    </li> -->
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
                        <!-- <li class="onhover-dropdown"><a class="txt-dark" href="#">
                        <h6>EN</h6></a>
                        <ul class="language-dropdown onhover-show-div p-20">
                            <li><a href="#" data-lng="en"><i class="flag-icon flag-icon-is"></i> English</a></li>
                            <li><a href="#" data-lng="es"><i class="flag-icon flag-icon-um"></i> Spanish</a></li>
                            <li><a href="#" data-lng="pt"><i class="flag-icon flag-icon-uy"></i> Portuguese</a></li>
                            <li><a href="#" data-lng="fr"><i class="flag-icon flag-icon-nz"></i> French</a></li>
                        </ul>
                    </li> -->
                        <li class="onhover-dropdown"><i data-feather="bell"></i><span class="badge badge-pill badge-primary pull-right notification-badge">{{$orderRequest}}</span><span class="dot"></span>
                            <!--<ul class="notification-dropdown onhover-show-div p-0">-->
                            <!--<li>Notification <span class="badge badge-pill badge-primary pull-right"></span></li>-->
                            <!--<li>-->
                            <!--    <div class="media">-->
                            <!--        <div class="media-body">-->
                            <!--            <h6 class="mt-0"><span><i class="shopping-color" data-feather="shopping-bag"></i></span>Your order ready for Ship..!</h6>-->
                            <!--            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <div class="media">-->
                            <!--        <div class="media-body">-->
                            <!--            <h6 class="mt-0 txt-success"><span><i class="download-color font-success" data-feather="download"></i></span>Download Complete</h6>-->
                            <!--            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <div class="media">-->
                            <!--        <div class="media-body">-->
                            <!--            <h6 class="mt-0 txt-danger"><span><i class="alert-color font-danger" data-feather="alert-circle"></i></span>250 MB trash files</h6>-->
                            <!--            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</li>-->
                            <!--<li class="txt-dark"><a href="#">All</a> notification</li>-->
                            <!--</ul>-->
                        </li>
                        <!--<li><a href="#"><i class="right_side_toggle" data-feather="message-square"></i><span class="badge badge-pill badge-primary pull-right notification-badge">}</span<span class="dot"></span></a></li>-->
                        <li class="onhover-dropdown">
                            <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="{{asset('public/admin/assets/images/dashboard/man.png')}}" alt="header-user">
                                <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                                <li><a href="#"><i data-feather="user"></i>Edit Profile</a></li>
                                <li><a href="{{route('admin.newuser')}}"><i data-feather="user"></i>Add New User</a></li>
                                <!--   <li><a href="#"><i data-feather="lock"></i>Lock Screen</a></li> -->
                                <li><a href="{{url('/admin/changepassword')}}"><i data-feather="settings"></i>Settings</a></li>
                                <li><a href="#" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><i data-feather="log-out"></i>Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
                </div>
            </div>
        </div>
        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="page-sidebar">
                <div class="main-header-left d-none d-lg-block">
                    <div class="logo-wrapper"><a href="{{url('/admin')}}"><img class="blur-up lazyloaded" src="{{asset('public/admin/assets/images/dashboard/logo.png')}}" alt=""></a></div>
                </div>
                <div class="sidebar custom-scrollbar">

                    <ul class="sidebar-menu">
                        <li><a class="sidebar-header" href="{{url('/admin')}}"><i data-feather="home"></i><span>Dashboard</span></a></li>
                        <li id="product"><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Products</span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></a>
                            <ul class="sidebar-submenu">


                                <li id="category"><a href="{{route('admin.category')}}"><i class="fa fa-circle"></i>Category</a></li>
                                <li id="subcategory"><a href="{{route('admin.subcategory')}}"><i class="fa fa-circle"></i>Sub Category</a></li>
                                <li id="product-add"><a href="{{route('admin.product')}}"><i class="fa fa-circle"></i>Add Product</a></li>
                                <li id="productlist"><a href="{{route('admin.productlist')}}"><i class="fa fa-circle"></i>Product List</a></li>
                                <!-- <li><a href="product-detail.html"><i class="fa fa-circle"></i>Product Detail</a></li> -->



                            </ul>
                        </li>
                        <li><a class="sidebar-header" id="stock" href="{{route('admin.stocklist')}}"><i data-feather="dollar-sign"></i><span>Stock Product</span></a>
                        <li><a class="sidebar-header" href="{{url('/admin/order/request')}}"><i data-feather="dollar-sign"></i><span>Orders Request</span></a></li>
                        <li><a class="sidebar-header" href="{{url('/admin/order/confirmlist')}}"><i data-feather="dollar-sign"></i><span>Confirm Order</span></a></li>
                        <li><a class="sidebar-header" href="{{url('/admin/customer')}}"><i data-feather="user"></i><span>Customer </span></a></li>
                        <li><a class="sidebar-header" href="{{ route('gallary_view')}}"><i data-feather="image"></i><span>Gallary </span></a></li>
                        <li><a class="sidebar-header" href="{{ route('team_view')}}"><i data-feather="users"></i><span>Team Member </span></a></li>
                        <li><a class="sidebar-header" href="{{ route('business_unit_show')}}"><i data-feather="twitch"></i><span>Business Unit </span></a></li>
                        <li><a class="sidebar-header" href="{{route('home_slider_show')}}"><i data-feather="code"></i><span>Home Slider </span></a></li>
                        <li><a class="sidebar-header" href="{{route('client_review')}}"><i data-feather="code"></i><span>Client Reviews </span></a></li>
                        <li><a class="sidebar-header"><i data-feather="box"></i> <span>Website</span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></a>
                            <ul class="sidebar-submenu">


                                <li id="category"><a href="#" data-toggle="modal" data-target=".variableOne"><i class="fa fa-circle"></i>Home Section Two</a></li>



                            </ul>
                        </li>

                        <!-- <li><a class="sidebar-header" href=""><i data-feather="settings" ></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="profile.html"><i class="fa fa-circle"></i>Profile</a></li>
                        </ul>
                    </li>
					<li><a class="sidebar-header" href="invoice.html"><i data-feather="archive"></i><span>Invoice</span></a>
                    </li>
                    <li><a class="sidebar-header" href="login.html"><i data-feather="log-in"></i><span>Login</span></a>
                    </li> -->
                    </ul>
                </div>
            </div>
            <!-- Page Sidebar Ends-->


            <!-- all modal for edit website variable data -->



            <div class="modal fade bd-example-modal-lg variableOne" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{route('section_two')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="h6 border-bottom border-secondary">First Card</h2>
                                            <div class="form-group">
                                                <label for="title_for_card_one">Title</label>
                                                <input value="{{ App\HomeSectionTwo::first()->first_card_title}}" required type="text" class="form-control" id="title_for_card_one" name="title_for_card_one">

                                                <label for="subtitle_for_card_one">Subtitle</label>
                                                <input required type="text" name="subtitle_for_card_one" class="form-control" id="subtitle_for_card_one" value="{{ App\HomeSectionTwo::first()->first_card_subtitle}}">


                                                <label for="image_for_card_one">Image</label>
                                                <input type="file" accept="image/*" name="image_for_card_one" class="form-control-file" id="image_for_card_one">
                                            </div>

                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="h6 border-bottom border-secondary">Second Card</h2>
                                            <div class="form-group">
                                                <label for="title_for_card_two">Title</label>
                                                <input required type="text" class="form-control" id="title_for_card_two" name="title_for_card_two" value="{{ App\HomeSectionTwo::first()->second_card_title}}" >

                                                <label for="subtitle_for_card_two">Subtitle</label>
                                                <input required type="text" name="subtitle_for_card_two" class="form-control" id="subtitle_for_card_two" value="{{ App\HomeSectionTwo::first()->second_card_subtitle}}">


                                                <label for="image_for_card_two">Image</label>
                                                <input type="file" accept="image/*" name="image_for_card_two" class="form-control-file" id="image_for_card_two">
                                            </div>

                                        </div>
                                    </div>

                                </div>



                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="h6 border-bottom border-secondary">Third Card</h2>
                                            <div class="form-group">
                                                <label for="title_for_card_three">Title</label>
                                                <input required type="text" class="form-control" id="title_for_card_three" name="title_for_card_three" value="{{ App\HomeSectionTwo::first()->third_card_title}}">

                                                <label for="subtitle_for_card_three">Subtitle</label>
                                                <input required type="text" name="subtitle_for_card_three" class="form-control" id="subtitle_for_card_three" value="{{ App\HomeSectionTwo::first()->third_card_subtitle}}" >


                                                <label for="image_for_card_three">Image</label>
                                                <input type="file" accept="image/*" name="image_for_card_three" class="form-control-file" id="image_for_card_three" >
                                            </div>

                                        </div>
                                    </div>

                                </div>



                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="h6 border-bottom border-secondary">Side Card</h2>
                                            <div class="form-group">
                                                <label for="title_for_card_four">Title</label>
                                                <input required type="text" class="form-control" id="title_for_card_four" name="title_for_card_four" value="{{ App\HomeSectionTwo::first()->forth_card_title}}">

                                                <label for="subtitle_for_card_four">Subtitle</label>
                                                

                                                <textarea class="form-control" id="subtitle_for_card_four" name="subtitle_for_card_four" id="" cols="30" rows="10">{{ App\HomeSectionTwo::first()->forth_card_subtitle}}</textarea>


                                               
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 text-center mb-2">
                                    <hr>
                                    <button type="submit" class="btn btn-info btn-lg  m-2">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- end modal section -->

            <!-- Right sidebar Start-->
            <div class="right-sidebar" id="right_side_bar">
                <div>
                    <div class="container p-0">
                        <div class="modal-header p-l-20 p-r-20">
                            <div class="col-sm-8 p-0">
                                <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>
                            </div>
                            <div class="col-sm-4 text-right p-0"><i class="mr-2" data-feather="settings"></i></div>
                        </div>
                    </div>
                    <div class="friend-list-search mt-0">
                        <input type="text" placeholder="search friend"><i class="fa fa-search"></i>
                    </div>
                    <div class="p-l-30 p-r-30">
                        <div class="chat-box">
                            <div class="people-list friend-list">
                                <ul class="list">
                                    <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('public/admin/assets/images/dashboard/user.png')}}" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="about">
                                            <div class="name">Vincent Porter</div>
                                            <div class="status"> Online</div>
                                        </div>
                                    </li>
                                    <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('public/admin/assets/images/dashboard/user1.jpg')}}" alt="">
                                        <div class="status-circle away"></div>
                                        <div class="about">
                                            <div class="name">Ain Chavez</div>
                                            <div class="status"> 28 minutes ago</div>
                                        </div>
                                    </li>
                                    <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('public/admin/assets/images/dashboard/user2.jpg')}}" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="about">
                                            <div class="name">Kori Thomas</div>
                                            <div class="status"> Online</div>
                                        </div>
                                    </li>
                                    <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('public/admin/assets/images/dashboard/user3.jpg')}}" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="about">
                                            <div class="name">Erica Hughes</div>
                                            <div class="status"> Online</div>
                                        </div>
                                    </li>
                                    <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('public/admin/assets/images/dashboard/man.png')}}" alt="">
                                        <div class="status-circle offline"></div>
                                        <div class="about">
                                            <div class="name">Ginger Johnston</div>
                                            <div class="status"> 2 minutes ago</div>
                                        </div>
                                    </li>
                                    <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('public/admin/assets/images/dashboard/user5.jpg')}}" alt="">
                                        <div class="status-circle away"></div>
                                        <div class="about">
                                            <div class="name">Prasanth Anand</div>
                                            <div class="status"> 2 hour ago</div>
                                        </div>
                                    </li>
                                    <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('public/admin/assets/images/dashboard/designer.jpg')}}" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="about">
                                            <div class="name">Hileri Jecno</div>
                                            <div class="status"> Online</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{asset('public/admin/assets/js/jquery-3.3.1.min.js')}}"></script>

            <!-- Right sidebar Ends-->
            @yield('mainContent')
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright 2020 © Nayem.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer end-->
        </div>

    </div>

    <!-- latest jquery-->


    <!-- Bootstrap js-->
    <script src="{{asset('public/admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/bootstrap.js')}}"></script>

    <!-- feather icon js-->
    <script src="{{asset('public/admin/assets/js/feather.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/feather-icon.js')}}"></script>

    <!-- Sidebar jquery-->
    <script src="{{asset('public/admin/assets/js/sidebar-menu.js')}}"></script>

    <!--chartist js-->
    <script src="{{asset('public/admin/assets/js/chartist.js')}}"></script>

    <!--chartjs js-->
    <script src="{{asset('public/admin/assets/js/chart.min.js')}}"></script>

    <!-- lazyload js-->
    <script src="{{asset('public/admin/assets/js/lazysizes.min.js')}}"></script>

    <!--copycode js-->
    <script src="{{asset('public/admin/assets/js/prism.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/clipboard.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/custom-card.js')}}"></script>

    <!--counter js-->
    <script src="{{asset('public/admin/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/counter-custom.js')}}"></script>

    <!--peity chart js-->
    <script src="{{asset('public/admin/assets/js/peity.jquery.js')}}"></script>

    <!--sparkline chart js-->
    <script src="{{asset('public/admin/assets/js/sparkline.js')}}"></script>

    <!--Customizer admin-->
    <script src="{{asset('public/admin/assets/js/admin-customizer.js')}}"></script>

    <!--dashboard custom js-->
    <!-- <script src="{{asset('public/admin/assets/js/default.js')}}"></script> -->

    <!--right sidebar js-->
    <script src="{{asset('public/admin/assets/js/chat-menu.js')}}"></script>

    <!--height equal js-->
    <script src="{{asset('public/admin/assets/js/height-equal.js')}}"></script>

    <!-- lazyload js-->
    <script src="{{asset('public/admin/assets/js/lazysizes.min.js')}}"></script>





    <!--script admin-->
    <script src="{{asset('public/admin/assets/js/admin-script.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

</html>