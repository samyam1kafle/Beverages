@extends('FrontEnd.layers.master')
@section('content')
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
                                                    <li>
                                                        <a href="{{route('products',$caategory->slug)}}">{{$caategory->title}}</a>
                                                        @foreach($category->where('parent_id','=',$caategory->id) as $caaategory)
                                                            <ul>
                                                                <li>
                                                                    <a href="{{route('products',$caaategory->slug)}}">{{$caaategory->title}} </a>
                                                                </li>
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

                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{asset('uploads/Products/thumbnail/'.$product->image)}}" alt="">
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                            {{--<div class="carousel-inner">--}}
                            {{--<div class="item">--}}
                            {{--<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>--}}
                            {{--<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>--}}
                            {{--<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>--}}
                            {{--</div>--}}
                            {{--<div class="item active">--}}
                            {{--<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>--}}
                            {{--<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>--}}
                            {{--<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>--}}
                            {{--</div>--}}
                            {{--<div class="item">--}}
                            {{--<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>--}}
                            {{--<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>--}}
                            {{--<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>--}}
                            {{--</div>--}}

                            {{--</div>--}}

                            <!-- Controls -->
                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <form action="{{route('add-to-cart')}}" name="addtocartForm" id="addtocartForm"
                                  method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="product_name" value="{{$product->name}}">
                                <input type="hidden" name="product_volume" value="{{$product->volume}}">
                                <input type="hidden" name="image" value="{{$product->image}}">
                                <input type="hidden" name="stock" value="{{$product->stock}}">
                                @if($product->offer)
                                    <input type="hidden" name="price" value="{{$product->offer_price}}">
                                @else
                                    <input type="hidden" name="price" value="{{$product->price}}">
                                @endif
                                <div class="product-information"><!--/product-information-->
                                    <img src="{{asset('images/product-details/new.jpg')}}" class="newarrival" alt=""/>
                                    <h2>{{$product->name}}</h2>
                                    <p>Product Id : {{$product->id}}</p>
                                    <img src="{{asset('images/product-details/rating.png')}}" alt=""/>


                                    <span><del>{{$product->offer ? $product->price : ''}}</del>
										</span>
                                    <span> Rs .{{$product->offer ? $product->offer_price : $product->price}}</span>
                                    @if($product->stock > 0)
                                        @if(Auth::check())
                                            <span>
                                       <label>Quantity:</label>
                                            <input type="text" name="quantity" value="1"/>
                                            <button type="submit" class="btn btn-default cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart

									</button>
                                                    </span>
                                        @endif


                                        <p><b>Availability: Only {{$product->stock}} Left</b></p>
                                        <p><b>Condition:</b> Sealed</p>
                                        <a href=""><img src="images/share.png" class="share img-responsive" alt=""/></a>
                                    @else
                                        {{Session::flash('Error','Product Out Of Stock Check Back Later')}}
                                    @endif

                                </div><!--/product-information-->
                            </form>
                        </div>
                    </div><!--/product-details-->



                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="category-tab shop-details-tab"><!--category-tab-->

                        @if(Auth::check())
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="reviews">


                                    {{--<p><b>Write Your Review</b></p>--}}
                                    <div class="row">

                                        <form action="{{route('product-review',$product->slug)}}" method="post">
                                            <div class="col-sm-12">
                                                <div class="col-sm-5">
                                                    <h2>How did you like the Product ? </h2>
                                                    <br><br>
                                                    <h3>Rate Us</h3>
                                                    <fieldset class="rating">
                                                        <input type="radio" id="star5" name="star" value="5"/><label
                                                                class="full"
                                                                for="star5"
                                                                title="Awesome - 5 stars"></label>
                                                        <input type="radio" id="star4" name="star" value="4"/><label
                                                                class="full"
                                                                for="star4"
                                                                title="Pretty good - 4 stars"></label>

                                                        <input type="radio" id="star3" name="star" value="3"/><label
                                                                class="full"
                                                                for="star3"
                                                                title="Meh - 3 stars"></label>

                                                        <input type="radio" id="star2" name="star" value="2"/><label
                                                                class="full"
                                                                for="star2"
                                                                title="Kinda bad - 2 stars"></label>

                                                        <input type="radio" id="star1" name="star" value="1"/><label
                                                                class="full"
                                                                for="star1"
                                                                title="Sucks big time - 1 star"></label>

                                                    </fieldset>

                                                </div>
                                                <div class="col-sm-7">
                                                    <h2>Leave a Comment</h2>

                                                    <input type="hidden" name="author_id"
                                                           value="{{Auth::user()->id}}">
                                                    <input type="hidden" name="author_email"
                                                           value="{{Auth::user()->email}}">
                                                    <input type="hidden" name="author"
                                                           value="{{Auth::user()->name}}">
                                                    <input type="hidden" name="product_id"
                                                           value="{{$product->id}}">
                                                    {{--<input type="hidden" name="blog_id" value="{{$blogs->id}}">--}}

                                                    <div class="text-area">
                                                        <div class="blank-arrow">
                                                            <label>Your Comment</label>
                                                        </div>
                                                        <br><br>
                                                        <div class="form-group">
                                            <textarea class="form-control"
                                                      placeholder="Your views about the product here" name="review"
                                                      rows="auto" cols="auto"></textarea>
                                                        </div>

                                                        {{csrf_field()}}
                                                        <div class="form-group">
                                                            <button type="submit"
                                                                    class="btn btn-success pull-right">
                                                                submit
                                                            </button>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="reset" class="btn btn-danger pull-left">
                                                                reset
                                                            </button>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                        </form>


                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!Auth::check())
                            <div class="alert alert-info">
                                <strong>Info!</strong> Please Login to our site to read all the review about this
                                product as well as add a review and enjoy many more features of our sites.
                            </div>
                        @endif
                    </div><!--/category-tab-->


                </div>
                <div class="col-sm-6">
                    <div class="response-area">
                        <h2>{{$reviews->count()}} RESPONSES</h2>
                        @foreach($reviews as $review)
                            <ul class="media-list">
                                <li class="media">

                                    <a class="pull-left" href="#">
                                        <img class="media-object"
                                             src="{{asset('uploads/Users/'.$review->usercommented->image)}}"
                                             width="50px" alt="">
                                    </a>
                                    <div class="media-body">
                                        <ul class="sinlge-post-meta">
                                            <li><i class="fa fa-user"></i>{{$review->author}}</li>
                                            <li><i class="fa fa-calendar"></i> {{$review->created_at}}
                                            </li>
                                        </ul>
                                        <p>{{$review->review}}</p>
                                        <h3 class="col-sm-offset-5">Rated us :@for($i = 0 ;$i<$review->star;$i++)
                                                <span style="font-size:75%;color:#0000007a;">★</span>
                                            @endfor
                                        </h3>
                                    </div>
                                </li>

                            </ul>
                        @endforeach
                        <div class="col-sm-offset-4">
                            {{$reviews->render()}}
                        </div>
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                {{Session::flash('Error',$error)}}
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection