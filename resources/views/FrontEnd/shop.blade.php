@extends('FrontEnd.layers.master')
@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="images/shop/advertisement.jpg" alt=""/>
        </div>
    </section>

    <section>
        <div class="container">

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Featured Beverages & Offers</h2>
                        @foreach($category_products as $product)

                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('uploads/Products/thumbnail/'.$product->image)}}" alt=""/>
                                        <del>{{$product->offer ? $product->price : '' }}</del>
                                        <h2>RS. {{$product->offer ? $product->offer_price : $product->price}}</h2>
                                        <p>{{$product->name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <del>{{$product->offer ? $product->price : '' }}</del>
                                            <h2>RS. {{$product->offer ? $product->offer_price : $product->price}}</h2>
                                            <p>{{$product->name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

    @endforeach


                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>
@endsection
