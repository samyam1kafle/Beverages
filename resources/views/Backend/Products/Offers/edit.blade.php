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
                                <span class="fa fa-hand-o-down"></span>Add New Offer <span
                                        class="fa fa-hand-o-down"></span>
                            </h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('blogs.update',$offer->id)}}" method="post" autocomplete="on"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Offer Title</label>
                                    <input type="text" class="form-control" id="name" name="title"
                                           value="{{$offer->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Offered Product Name</label>
                                    <input type="text" class="form-control" id="name" name="offer_product_name"
                                           value="{{$offer->offer_product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="Real Price of the product">Real Price</label>
                                    <input type="text" name="real_price" class="form-control" id="Price"
                                           value="{{$offer->real_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="Price of the product">Offered Price</label>
                                    <input type="text" name="offered_price" class="form-control" id="Price"
                                           value="{{$offer->offered_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Products Picture</label>
                                    <input type="file" name="image" id="product_image"><br><img
                                            src="{{asset('uploads/Products/Special_Offers/'.$offer->image)}}"
                                            width="100" height="115" alt="Offered product Image">

                                </div>

                                <div class="form-group">
                                    <label for="Product Category">Product Category</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($product_category as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <hr>


                                <div class="form-group">

                                    <textarea name="description" id="editor"
                                              placeholder="Specification of the product Here" cols="auto"
                                              rows="auto">{{$offer->description}}</textarea>
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
        @foreach($errors->all() as $error)
            {{Session::flash('Error',$error)}}
        @endforeach
    @endif
@endsection