<!-- ============================================================== -->
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="{{ route('dashboard') }}">

                <span class="logo-text">
                    <!-- dark Logo text -->
                    @foreach(  App\Models\Backend\Logo::orderBy('id','asc')->get() as $logo )
                        @if( $logo->image == NULL )
                            <div class="alert alert-warning">
                            No Image uploaded
                            </div>
                        @else
                        <img src="{{ asset('images/logo/' . $logo->image) }}" style="margin: 15px" width="100%" alt="homepage" class="light-logo" />
                        @endif

                    @endforeach
                </span>
                <!-- Logo icon -->
                <!-- <b class="logo-icon"> -->
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                <!-- </b> -->
                <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                <!-- ============================================================== -->
                <!-- create new -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    @yield('create_new_button')
                </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                @yield("search_form")
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
               


                
                <!-- Messages -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                        <ul class="list-style-none">
                            <li>

                                <!-- Message -->
                                
                                @if( count(App\Models\Backend\Message\Message::all()) == 0 )
                                <div class="alert alert-warning">Your inbox is empty</div>
                                @else 
                                @foreach( App\Models\Backend\Message\Message::orderBy('id','desc')->take(3)->get() as $message )
                                <a href="{{ route('message.view', $message->id) }}" target="blank" class="link border-top">
                                    <div class="d-flex no-block align-items-center p-10">
                                        <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                        <div class="m-l-10">
                                            <h5 class="m-b-0">{{ $message->name }}</h5> 
                                            <span class="mail-desc">{{ Str::limit($message->message,50) }}</span> 
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                                @endif
                               
                                <!-- Message -->

                            </li>
                        </ul>
                        <div class="viewallMessage text-center alert ">
                            <a href="{{ route('message.show') }}">View All</a>
                        </div>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->

                


                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if( Auth::user()->image == NULL )
                        <img src="{{ asset('images/profile/user.png') }}" alt="user" class="rounded-circle" width="31">
                        @else
                        <img src="{{ asset('images/profile/' . Auth::user()->image) }}" alt="user" class="rounded-circle" width="31">
                        @endif
                        
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">

                        <a class="dropdown-item" href="{{ route('profile.edit', Auth::user()->id) }}"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->


            </ul>
        </div>
    </nav>
</header>