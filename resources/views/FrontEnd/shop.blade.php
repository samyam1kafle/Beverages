@extends('FrontEnd.layers.master')
@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="images/shop/advertisement.jpg" alt=""/>
        </div>
    </section>

    <section>
        <div class="container">
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
                    <h2 class="title text-center">All Products </h2>
                    @foreach($category_products as $product)

                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('uploads/Products/thumbnail/'.$product->image)}}" alt=""/>
                                        <h2>RS. {{$product->offer ? $product->offer_price : $product->price}}</h2>
                                        <p>{{$product->name}}</p>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            @if($product->offer)
                                                <del>Rs. {{$product->price}}</del>
                                            @endif
                                            <h2>RS. {{$product->offer ? $product->offer_price : $product->price}}</h2>
                                            <p>{{$product->name}} | {{$product->volume}}</p>
                                                <p style="font-size: medium;">Availability
                                                    : {{$product->stock >0 ? $product->stock : 'No Stock Available'}}</p>
                                            <a href="{{route('product-detail',$product->slug)}}"
                                               class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>View Product</a>

                                        </div>
                                    </div>
                                </div>
                                @if(Auth::check())
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="{{route('add-to-wishlist',$product->slug)}}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>

                    @endforeach


                </div><!--features_items-->
            </div>
        </div>
        </div>
    </section>
@endsection
