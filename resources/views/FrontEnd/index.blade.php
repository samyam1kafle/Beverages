@extends('FrontEnd.layers.master')
@section('content')
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class=""></li>
                            <li data-target="#slider-carousel" data-slide-to="1" class=""></li>
                            <li data-target="#slider-carousel" data-slide-to="2" class="active"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Beverage </span>-Shop</h1>
                                    <h2>Products in reasonable price</h2>
                                    <p>Products as per your need , every type of beverages available in our site.All you
                                        have to do is choose wisely.</p>
                                    <button type="button" class="btn btn-default get">Buy it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('uploads/Products/beer-glass.jpg')}}" class="girl img-responsive"
                                         alt="">

                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Beverage </span>-Shop</h1>
                                    <h2>Products in reasonable price</h2>
                                    <p>Products as per your need , every type of beverages available in our site.All you
                                        have to do is choose wisely.</p>
                                    <button type="button" class="btn btn-default get">Buy it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('uploads\Products\header_delcalc.png')}}"
                                         class="girl img-responsive" alt="">
                                    {{--<img src="images/home/pricing.png" class="pricing" alt="">--}}
                                </div>
                            </div>

                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>Beverage </span>-Shop</h1>
                                    <h2>Products in reasonable price</h2>
                                    <p>Products as per your need , every type of beverages available in our site.All you
                                        have to do is choose wisely.</p>
                                    <button type="button" class="btn btn-default get">Buy it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('uploads/Products/booze.jpg')}}" class="girl img-responsive"
                                         alt="">

                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($category->where('parent_id','=',0) as $categories )
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordian"
                                               href="#{{$categories->title}}">
                                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                <a href="{{route('products',$categories->slug)}}">{{$categories->title}}</a>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="{{$categories->title}}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            @foreach($category->where('parent_id','=',$categories->id) as $caategory)
                                                <ul>
                                                    <li><a href="{{route('products',$caategory->slug)}}">{{$caategory->title}}</a>
                                                        @foreach($category->where('parent_id','=',$caategory->id) as $caaategory)
                                                            <ul>
                                                                <li><a href="{{route('products',$caaategory->slug)}}">{{$caaategory->title}} </a></li>
                                                            </ul>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div><!--/category-productsr-->


                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well">
                                <input type="text" class="span2" value="" data-slider-min="300" data-slider-max="150000"
                                       data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>
                                <b>Rs. 0</b> <b class="pull-right">Rs. 150000</b>
                            </div>
                        </div><!--/price-range-->


                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Offers</h2>
                        @foreach($products->where('offer','=',1) as $offered_products)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('uploads/Products/thumbnail/'.$offered_products->image)}}" width="200px" height="200px"
                                                 alt=""/>
                                            <h2>RS. {{$offered_products->price}}</h2>
                                            <p>{{$offered_products->name}}</p>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <del>Rs. {{$offered_products->price}}</del>
                                                <h2>RS. {{$offered_products->offer_price}}</h2>
                                                <p>{{$offered_products->name}} |  {{$offered_products->volume}}</p>
                                                <p style="font-size: medium;">Availability
                                                    : {{$offered_products->stock >0 ? $offered_products->stock : 'No Stock Available'}}</p>
                                                <a href="{{route('product-detail',$offered_products->slug)}}"
                                                   class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>View Product</a>
                                            </div>
                                        </div>
                                    </div>
                                    @if(Auth::check())
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="{{route('add-to-wishlist',$offered_products->slug)}}"><i
                                                                class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <a href="{{route('all-offer-products')}}" class="btn btn-info col-md-offset-10"> View All Offers</a>
                        </div>
                    </div><!--features_items-->

                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Beverages</h2>
                        @foreach($products->where('featured','=',1) as $featured_products)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('uploads/Products/thumbnail/'.$featured_products->image)}}" width="200px" height="200px"
                                                 alt=""/>
                                            {{--<del>{{$featured_products->offer ? $featured_products->price : ''}}</del>--}}
                                            <h2>
                                                RS. {{$featured_products->offer ? $featured_products->offer_price : $featured_products->price}}</h2>
                                            <p>{{$featured_products->name}}</p>

                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                @if($featured_products->offer)
                                                <del>Rs. {{$featured_products->price }}</del>
                                                @endif
                                                    <h2>
                                                    RS. {{$featured_products->offer ? $featured_products->offer_price : $featured_products->price}}</h2>
                                                <p>{{$featured_products->name }} |  {{$featured_products->volume}} </p>
                                                <p style="font-size: medium;">Availability
                                                    : {{$featured_products->stock >0 ? $featured_products->stock : 'No Stock Available'}}</p>
                                                <a href="{{route('product-detail',$featured_products->slug)}}"
                                                   class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>View Product</a>
                                            </div>
                                        </div>
                                    </div>
                                    @if(Auth::check())
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="{{route('add-to-wishlist',$featured_products->slug)}}"><i
                                                                class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        @endforeach
                        <div class="form-group">
                            <a href="{{route('all-featured-products')}}" class="btn btn-info col-md-offset-10"> View All Featured</a>
                        </div>

                    </div>

                    <!--All Products -->

                    <div class="features_items">
                        <h2 class="title text-center">All Products</h2>
                        @foreach($products as $all_products)

                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('uploads/Products/thumbnail/'.$all_products->image)}}" width="200px" height="200px"
                                                 alt="{{$all_products->name}}"/>
                                            <h2>
                                                RS. {{$all_products->offer ? $all_products->offer_price : $all_products->price}}</h2>
                                            <p>{{$all_products->name}}</p>

                                        </div>

                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                @if($all_products->offer)
                                                    <del>Rs {{$all_products->offer ? $all_products->price : ''}}</del>
                                                @endif
                                                <h2>
                                                    RS. {{$all_products->offer ? $all_products->offer_price : $all_products->price}}</h2>
                                                <p>{{$all_products->name}} |  {{$all_products->volume}}</p>
                                                <p style="font-size: medium;">Availability
                                                    : {{$all_products->stock >0 ? $all_products->stock : 'No Stock Available'}}</p>

                                                <a href="{{route('product-detail',$all_products->slug)}}"
                                                   class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>View Product</a>
                                            </div>
                                        </div>

                                    </div>
                                    @if(Auth::check())
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">

                                                <li><a href="{{route('add-to-wishlist',$all_products->slug)}}"><i
                                                                class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        @endforeach

                    </div><!--features_items-->

                    <div class="form-group">
                        <a href="{{route('all-products')}}" class="btn btn-info col-md-offset-10"> View All Products</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection