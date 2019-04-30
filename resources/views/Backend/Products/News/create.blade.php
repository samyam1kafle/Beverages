@extends('Backend.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <section class="content-header">
            <h1>
                Offers Section

            </h1>
            {{--<ol class="breadcrumb">--}}
            {{--<li><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> Admin</a></li>--}}
            {{--<li><a href="{{route('blogs.special')}}">Special Offers</a></li>--}}
            {{--<li class="active">Create</li>--}}
            {{--</ol>--}}
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <span class="fa fa-hand-o-down"></span>NEWS SECTION <span class="fa fa-hand-o-down"></span>
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('news-crud')}}" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">News about</label>
                                    <input type="text" class="form-control" id="name" name="about"
                                           placeholder="Eg: Dashain bumper Offer">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">News title</label>
                                    <input type="text" class="form-control" id="name" name="title"
                                           placeholder="Eg: Heavy Discounts">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Products Picture</label>
                                    <input type="file" name="image" id="product_image">

                                    {{--<p class="help-block">Example block-level help text here.</p>--}}
                                </div>

                                <div class="form-group">
                                    <label for="Product Category">News Category</label>
                                    <select class="form-control" name="category_id">
                                        {{--@foreach($news_category as $category)--}}
                                            {{--<option value="{{$category->id}}">{{$category->title}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>

                                <hr>


                                <div class="form-group">
                                    <textarea name="description" id="editor"
                                              placeholder="Specification of the product Here" cols="auto"
                                              rows="auto"></textarea>
                                </div>


                            </div>
                            <!-- /.box-body -->
                            {{csrf_field()}}
                            <div class="box-footer">

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </div>
                        </form>
                    </div>


                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection