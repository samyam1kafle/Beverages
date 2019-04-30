@extends('Backend.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <section class="content-header">
            <h1>
                Product Section

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="{{route('products.index')}}">Products</a></li>
                <li class="active">Create</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Product</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Title</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter the name of the product">
                                </div>
                                <div class="form-group">
                                    <label for="Price of the product">Price</label>
                                    <input type="text" name="price" class="form-control" id="Price" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Products Picture</label>
                                    <input type="file" name="image" id="product_image">

                                    {{--<p class="help-block">Example block-level help text here.</p>--}}
                                </div>

                                <div class="form-group">
                                    <label for="Product Category">Product Category</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($product_category as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="radio">
                                    <label>
                                        <input type="radio" id="ofr" value="1" onclick="offerPrice(0)" name="offer"
                                               checked/>Have Offer
                                    </label>
                                    <label> <input type="radio" id="ofr" value="0" onclick="offerPrice(1)"
                                                   name="offer"/>Don't Have Offer</label>
                                    <br>
                                </div>

                                <br>
                                <div class="form-group">
                                    <input type="text" name="offer_price" class="form-control" id="offered_Price"
                                           placeholder="Offered Price">
                                </div>
                                <hr>

                                <div class="radio">
                                    <label>
                                        <input type="radio" id="fea" value="1" name="featured"/>Featured
                                    </label>
                                    <label> <input type="radio" id="fea" value="0" name="featured" checked/>Not featured</label>
                                    <br>
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
    <!-- /.box -->
@endsection

