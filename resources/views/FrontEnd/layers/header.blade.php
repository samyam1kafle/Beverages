<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +977 - 98159XXXXX</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> Beveragesnepal@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('https://www.facebook.com')}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{route('home-index')}}"><img src="{{asset('logos/nab.png')}}" height="80px" alt=""/></a>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('viewblogs')}}"><i class="fa fa-globe"></i> Blogs</a></li>
                            @if(Auth::check())
                            <li><a href="{{route('account')}}"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="{{route('wishlist')}}"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="{{route('checkout')}}"><i class="fa fa-crosshairs"></i>Checkout</a></li>
                            <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Cart </a></li>
                            @endif
                            @if(!Auth::user())
                                <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> Login </a></li>
                                <li><a href="{{route('Register')}}"><i class="fa fa-users"></i> SignUp</a>
                                    @endif

                                </li>

                                @if(Auth::user())
                                    @if(Auth::user()->role === 41)
                                        <li><a href="{{route('admin')}}"><i class="fa fa-male"></i> Admin</a></li>
                                    @endif
                                    <ul class="nav navbar-nav">
                                        <li><a href="{{route('log-out')}}"><i class="fa fa-sign-out"></i> Logout</a>
                                        </li>
                                    </ul>
                                @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{route('home-index')}}" class="active">Home</a></li>
                            @foreach($category->where('parent_id','=',0) as $categories)
                                <li class="dropdown"><a
                                            href="{{$categories ? route('products',$categories->slug) : '#'}}">{{$categories->title}}
                                    </a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($category->where('parent_id','=',$categories->id) as $caategory)
                                            <li class="dropdown">
                                                <a href="{{route('products',$caategory->slug)}}">{{$caategory->title}}
                                                    <i class="fa fa-angle-down"></i></a>
                                                <ul role="menu" class="sub-menu">
                                                    @foreach($category->where('parent_id','=',$caategory->id) as $caaategory)
                                                        <li>
                                                            <a href="{{route('products',$caaategory->slug)}}">{{$caaategory->title}}
                                                                <i class="fa fa-angle-down"></i></a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <form action="{{route('Frontendsearch')}}" method="post">
                    {{csrf_field()}}
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                <button type="submit" value="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->