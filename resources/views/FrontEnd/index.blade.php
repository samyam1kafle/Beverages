@extends('FrontEnd.layers.master')
@section('content')
    {{--<section id="slider"><!--slider-->--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-12">--}}
                    {{--<div id="slider-carousel" class="carousel slide" data-ride="carousel">--}}
                        {{--<ol class="carousel-indicators">--}}
                            {{--<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>--}}
                            {{--<li data-target="#slider-carousel" data-slide-to="1"></li>--}}
                            {{--<li data-target="#slider-carousel" data-slide-to="2"></li>--}}
                        {{--</ol>--}}

                        {{--<div class="carousel-inner">--}}
                            {{--@foreach($products->where('featured','=',1) as $prods)--}}
                            {{--<div class="item active">--}}
                                {{--<div class="col-sm-6">--}}
                                    {{--<h1><span>NAS</span> Offer & featured Beverages </h1>--}}
                                    {{--<h2>{{$prods->name}}</h2>--}}
                                    {{--<p>{!! str_limit($prods->description,100)!!}</p>--}}
                                    {{--<button type="button" class="btn btn-default get">Get it now</button>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-6">--}}
                                    {{--<img src="images/home/girl1.jpg" class="girl img-responsive" alt=""/>--}}
                                    {{--<img src="images/home/pricing.png" class="pricing" alt=""/>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                   {{--@endforeach--}}


                        {{--</div>--}}

                        {{--<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">--}}
                            {{--<i class="fa fa-angle-left"></i>--}}
                        {{--</a>--}}
                        {{--<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">--}}
                            {{--<i class="fa fa-angle-right"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section><!--/slider-->--}}

    <section>
        <div class="container">
            <div class="row">


                <div class="col-sm-10 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Offers</h2>
                        @foreach($products->where('offer','=',1) as $offered_products)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('uploads/Products/thumbnail/'.$offered_products->image)}}" alt=""/>
                                            <del>Rs.{{$offered_products->price}}</del>
                                            <h2>RS. {{$offered_products->offer_price}}</h2>
                                            <p>{{$offered_products->name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>RS. {{$offered_products->offer_price}}</h2>
                                                <p>{{$offered_products->name}}</p>
                                                <a href="{{route('product-detail',$offered_products->slug)}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>View Product</a>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div><!--features_items-->

                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Beverages</h2>
                        @foreach($products->where('featured','=',1) as $featured_products)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('uploads/Products/thumbnail/'.$featured_products->image)}}" alt=""/>
                                        <del>{{$featured_products->offer ? $featured_products->price : ''}}</del>
                                        <h2>RS. {{$featured_products->offer ? $featured_products->offer_price : $featured_products->price}}</h2>
                                        <p>{{$featured_products->name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <del>{{$featured_products->offer ? $featured_products->price : ''}}</del>
                                            <h2>RS. {{$featured_products->offer ? $featured_products->offer_price : $featured_products->price}}</h2>
                                            <p>{{$featured_products->name}}</p>
                                            <a href="{{route('product-detail',$featured_products->slug)}}" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>View Product</a>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
@endforeach



                    </div><!--features_items-->

<!--All Products -->
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">All Products</h2>
                        @foreach($products as $all_products)

                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('uploads/Products/thumbnail/'.$all_products->image)}}" alt=""/>
                                            <del>{{$all_products->offer ? $all_products->price : ''}}</del>
                                            <h2>RS. {{$all_products->offer ? $all_products->offer_price : $all_products->price}}</h2>
                                            <p>{{$all_products->name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>

                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <del>{{$all_products->offer ? $all_products->price : ''}}</del>
                                                <h2>RS. {{$all_products->offer ? $all_products->offer_price : $all_products->price}}</h2>
                                                <p>{{$all_products->name}}</p>
                                                <a href="{{route('product-detail',$all_products->slug)}}" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>View Product</a>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        @endforeach



                    </div><!--features_items-->

                    {{--<div class="recommended_items"><!--recommended_items-->--}}
                        {{--<h2 class="title text-center">recommended items</h2>--}}

                        {{--<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">--}}
                            {{--<div class="carousel-inner">--}}
                                {{--<div class="item active">--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="images/home/recommend1.jpg" alt=""/>--}}
                                                    {{--<h2>$56</h2>--}}
                                                    {{--<p>Easy Polo Black Edition</p>--}}
                                                    {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                                                {{--class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="images/home/recommend2.jpg" alt=""/>--}}
                                                    {{--<h2>$56</h2>--}}
                                                    {{--<p>Easy Polo Black Edition</p>--}}
                                                    {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                                                {{--class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="images/home/recommend3.jpg" alt=""/>--}}
                                                    {{--<h2>$56</h2>--}}
                                                    {{--<p>Easy Polo Black Edition</p>--}}
                                                    {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                                                {{--class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="item">--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="images/home/recommend1.jpg" alt=""/>--}}
                                                    {{--<h2>$56</h2>--}}
                                                    {{--<p>Easy Polo Black Edition</p>--}}
                                                    {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                                                {{--class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="images/home/recommend2.jpg" alt=""/>--}}
                                                    {{--<h2>$56</h2>--}}
                                                    {{--<p>Easy Polo Black Edition</p>--}}
                                                    {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                                                {{--class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="images/home/recommend3.jpg" alt=""/>--}}
                                                    {{--<h2>$56</h2>--}}
                                                    {{--<p>Easy Polo Black Edition</p>--}}
                                                    {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                                                {{--class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<a class="left recommended-item-control" href="#recommended-item-carousel"--}}
                               {{--data-slide="prev">--}}
                                {{--<i class="fa fa-angle-left"></i>--}}
                            {{--</a>--}}
                            {{--<a class="right recommended-item-control" href="#recommended-item-carousel"--}}
                               {{--data-slide="next">--}}
                                {{--<i class="fa fa-angle-right"></i>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div><!--/recommended_items-->--}}

                </div>
            </div>
        </div>
    </section>

@endsection