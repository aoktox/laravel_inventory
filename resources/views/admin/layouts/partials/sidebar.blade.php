<div class="main_container">
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="{{ route('home') }}" class="site_title"><i class="fa fa-paw"></i>
                    <span>Inventory</span></a>
            </div>

            <div class="clearfix"></div>

            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="{{ asset('uploads/avatar.jpg') }}" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Selamat Datang,</span>
                    <h2>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h2>
                </div>
                <div class="clearfix"></div>
            </div>

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <ul class="nav side-menu">
                        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="{{ route('admin.user') }}"><i class="fa fa-users"></i> User</a></li>
                        <li><a href="{{ route('admin.item') }}"><i class="fa fa-cubes"></i> Item</a></li>
                        <li><a><i class="fa fa-exchange"></i> Transaction <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('admin.request') }}">Request</a></li>
                                <li><a href="{{ route('admin.itemout') }}">Items Out</a></li>
                                <li><a href="{{ route('admin.history') }}">History</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small" style="display: none">
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
            <!-- /menu footer buttons -->
        </div>
    </div>
</div>