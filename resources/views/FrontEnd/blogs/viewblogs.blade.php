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
                <div class="col-sm-9">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Latest From our Blog</h2>
                        @foreach($blogs as $blog)
                            <hr>
                            <div class="single-blog-post">
                                <h2>{{$blog->title}}</h2>
                                <br/>
                                <div class="post-meta">
                                    <ul>
                                        <li><i class="fa fa-user"></i> {{$blog->offer_product_name}}</li>
                                        <li><i class="fa fa-clock-o"></i> {{$blog->created_at}}</li>
                                        <li><i class="fa fa-calendar"></i> {{$blog->updated_at}}</li>
                                    </ul>

                                </div>
                                <a href="{{route('viewsingleblogs',$blog->slug)}}">
                                    <img src="{{asset('uploads/Products/Special_Offers/'.$blog->image)}}" alt=""
                                         width="250px" height="450px">
                                </a>
                                <p>{!!str_limit($blog->description ,250) !!}</p>
                                <a class="btn btn-primary" href="{{route('viewsingleblogs',$blog->slug)}}">Read More</a>
                            </div>
                        @endforeach
                        <div class="col-sm-offset-8">
                            {{$blogs->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br><br>
@endsection