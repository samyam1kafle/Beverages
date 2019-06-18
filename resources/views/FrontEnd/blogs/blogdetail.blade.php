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
                        <div class="single-blog-post">
                            <hr>
                            <h2>{{$blogs->title}}</h2>
                            <br>
                            <div class="post-meta">
                                <span>
                                    @foreach($average as $avg)
                                        @for($i = 0 ; $i< (floor($avg->avg('star')))/2 ;$i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    @endforeach


								</span>
                            </div>
                            <a href="">
                                <img src="{{asset('uploads/Products/Special_Offers/'.$blogs->image)}}" alt=""
                                     width="500px" height="550px">
                            </a>
                            <p>{!!$blogs->description!!}
                            </p> <br>

                        </div>
                    </div><!--/blog-post-area-->

                    <div class="response-area">
                        <h2>{{$comments->count()}} RESPONSES</h2>
                        @foreach($comments as $comment)
                            <ul class="media-list">
                                <li class="media">

                                    <a class="pull-left" href="#">
                                        <img class="media-object"
                                             src="{{asset('uploads/Users/'.$comment->usercommented->image)}}"
                                             width='50px' alt="">
                                    </a>
                                    <div class="media-body">
                                        <ul class="sinlge-post-meta">
                                            <li><i class="fa fa-user"></i>{{$comment->usercommented->name}}</li>
                                            <li><i class="fa fa-calendar"></i> {{$comment->usercommented->created_at}}
                                            </li>
                                        </ul>
                                        <p>{{$comment->comment}}</p>
                                        <h3 class="col-sm-offset-7">Rated us : @for($i = 0 ; $i< $comment->star ; $i++)
                                                <span style="font-size:100%;color:yellow;">&starf;</span>
                                            @endfor
                                        </h3>
                                    </div>
                                </li>

                            </ul>
                        @endforeach
                        <div class="col-sm-offset-9">
                            {{$comments->render()}}
                        </div>
                    </div><!--/Response-area-->
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            {{Session::flash('Error',$error)}}
                        @endforeach
                    @endif
                    @if(Auth::check())
                        <div class="replay-box">
                            <div class="row">
                                <form action="{{route('viewsingleblogs',$blogs->slug)}}" method="post">
                                    <div class="col-sm-12">
                                        <div class="col-sm-5">
                                            <h2>How did you like the blog ? </h2>
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

                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                            <input type="hidden" name="blog_id" value="{{$blogs->id}}">

                                            <div class="text-area">
                                                <div class="blank-arrow">
                                                    <label>Your Comment</label>
                                                </div>
                                                <div class="form-group">
                                            <textarea class="form-control"
                                                      placeholder="Your views about the product here" name="comment"
                                                      rows="auto" cols="auto"></textarea>
                                                </div>

                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success pull-right">
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
                        </div><!--/Repaly Box-->
                    @endif

                    @if(!Auth::check())
                        <div class="alert alert-info">
                            <strong>Info!</strong> Please Login to our site to add a Comment and enjoy many more features of our sites.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection