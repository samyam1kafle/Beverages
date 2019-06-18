@section('aside')
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{url('admin/index')}}" class="logo">

                <span class="logo-lg"><b>Admin</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-right">
                        <a href="{{route('home-index')}}" class="logo">
                            <span class="logo-lg"><b>Home</b></span>
                        </a>

                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                @if(Auth::user())
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{asset('uploads/Users/'.Auth::user()->image )}}"
                                 class="img-circle"
                                 alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{Auth::user()->name}}</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
            @endif
            <!-- search form -->
                <form action="{{route('Adminsearch')}}" method="post" class="sidebar-form">
                    {{csrf_field()}}
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                <button type="submit" value="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>


                    <li class="active treeview">
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i>
                                    Dashboard</a>
                            </li>

                        </ul>

                    </li>

                    <li class="treeview menu-open">
                        <a href="#" style=""><i class="fa fa-laptop"></i> Features
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu" style="display: block;">


                            <li class="treeview">
                                <a href="#" style=""><i class="fa fa-envelope-o"></i>Mail
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>

                            <ul class="treeview-menu" style="display: none;">
                                <li><a href="{{route('inbox')}}"><i class="fa fa-envelope"></i>Inbox</a></li>

                                <li><a href="{{route('create_mail')}}"><i class="fa fa-envelope"></i>Compose
                                            Mail</a></li>


                                </ul>

                            </li>


                            <li class="treeview">
                                <a href="#" style=""><i class="fa fa-shopping-bag"></i> Products
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu" style="display: none;">
                                    <li><a href="{{route('products.create')}}"><i class="fa fa-shopping-bag"></i> Add
                                            new Product</a></li>
                                    <li><a href="{{route('products.index')}}"><i class="fa fa-product-hunt"></i> View
                                            Product</a></li>
                                    <li><a href="{{route('BackendCart')}}"><i class="fa fa-cart-plus"></i> Cart</a></li>
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#" style=""><i class="fa fa-cc"></i> Categories
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu" style="display: none;">
                                    <li><a href="{{route('categories.create')}}"><i class="fa fa-circle-o"></i> Add
                                            new Category</a></li>
                                    <li><a href="{{route('categories.index')}}"><i class="fa fa-circle-o"></i> View
                                            Categories</a></li>
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#" style=""><i class="fa fa-user"></i> Customers
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu" style="display: none;">
                                    <li><a href="{{route('users.create')}}"><i class="fa fa-user-circle"></i> Add
                                            Customers</a></li>
                                    <li><a href="{{route('users.index')}}"><i class="fa fa-user-circle"></i> View
                                            Customers</a></li>
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#" style=""><i class="fa fa-user"></i> Roles
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu" style="display: none;">
                                    <li><a href="{{route('roles.create')}}"><i class="fa fa-user-circle"></i> Add
                                            New Roles</a></li>
                                    <li><a href="{{route('roles.index')}}"><i class="fa fa-user-circle"></i> View All
                                            Roles</a></li>
                                </ul>
                            </li>

                            <li class="treeview" id="dropdown">
                                <a href="#" style=""><i class="fa fa-user"></i> Offers
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu" style="display: none;">
                                    <li><a href="{{route('offers')}}"><i class="fa fa-diamond"></i> View All Offers</a>
                                    </li>

                                    {{--<li><a href="{{route('index')}}"><i class="fa fa-diamond"></i> View All News</a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="{{route('add-news')}}"><i class="fa fa-diamond"></i>Add News</a></li>--}}
                                </ul>


                            </li>

                            <li class="treeview" id="dropdown">
                                <a href="#" style=""><i class="fa fa-book"></i> Blogs
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu" style="display: none;">

                                    <li><a href="{{route('blogs.index')}}"><i class="fa fa-book"></i>Special
                                            Blogs</a></li>
                                    <li><a href="{{route('blogs.create')}}"><i class="fa fa-book"></i>Add New Blog</a></li>

                                    <li><a href="{{route('blog-review')}}"><i class="fa fa-book"></i>Blog Reviews</a></li>


                                </ul>


                            </li>


                            <li class="treeview">
                                <a href="#" style=""><i class="fa fa-user"></i> Reviews
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu" style="display: none;">

                                    <li><a href="{{route('reviews')}}"><i class="fa fa-user-circle"></i> View All
                                            Reviews</a></li>
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#" style=""><i class="fa fa-user"></i>Subscribers
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu" style="display: none;">

                                    <li><a href="{{route('totalsubscribers')}}"><i class="fa fa-user-circle"></i> View
                                            All
                                            Subscribers</a></li>
                                </ul>
                            </li>


                        </ul>
                    </li>

                    @if(Auth::user())
                        <li class="passive treeview">
                            <a href="#">
                                <i class="fa fa-cogs"></i> <span>Settings</span>
                                <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href="{{route('adminProfile')}}"><i class="fa fa-suitcase"></i>Profile</a>
                                </li>


                                <li class="active"><a href="{{route('log-out')}}"><i
                                                class="fa fa-sign-out"></i>Logout</a>
                                </li>

                            </ul>

                        </li>

                    @endif
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
@endsection