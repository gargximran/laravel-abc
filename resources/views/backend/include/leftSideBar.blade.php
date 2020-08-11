<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark " href="{{ route('backend_dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('fav') }}" aria-expanded="false">
                        <i class="mdi mdi-umbrella"></i>
                        <span class="hide-menu">Fav Icon</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logo') }}" aria-expanded="false">
                        <i class="mdi mdi-umbrella"></i>
                        <span class="hide-menu">Website logo</span>
                    </a>
                </li>



                <li class="sidebar-item"> 
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-receipt"></i>
                        <span class="hide-menu"> All Pages </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item ml-3">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('homepage.show') }}" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <span class="hide-menu">Manage Home Page</span>
                            </a>
                        </li>
                    </ul>
                </li>






                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('product_show_backend')}}" aria-expanded="false">
                        <i class="mdi mdi-cart-outline"></i>
                        <span class="hide-menu"> Manage Product</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-receipt"></i>
                        <span class="hide-menu"> Manage Category </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item ml-3">
                            <a href="{{route('parent_category_show')}}" class="sidebar-link">
                                <i class="mdi mdi-note-outline"></i>
                                <span class="hide-menu"> Parent Category </span>
                            </a>
                        </li>
                        <li class="sidebar-item ml-3">
                            <a href="{{route('child_category_show')}}" class="sidebar-link">
                                <i class="mdi mdi-note-outline"></i>
                                <span class="hide-menu"> Sub Category </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>