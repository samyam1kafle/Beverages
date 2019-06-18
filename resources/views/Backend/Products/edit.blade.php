@extends('Backend.master')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Product info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('products.update',$product->id)}}" method="post" autocomplete="on"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Title</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{$product->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="Price of the product">Price</label>
                                    <input type="text" name="price" class="form-control" id="Price"
                                           value="{{$product->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Products Picture</label>
                                    <input type="file" name="image" id="product_image">
                                    <img src="{{asset('uploads/Products/thumbnail/'.$product->image)}}" width="100"
                                         length="100">

                                </div>

                                <div class="form-group">
                                    <label for="Product Category">Product Category</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($product_category as $category)

                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="Product Category">Product Volume</label>
                                    <select class="form-control" name="volume">

                                        <option value="1 Ltr">1 ltr</option>
                                        <option value="750 Ml">750 Ml</option>
                                        <option value="500 Ml">500 Ml</option>
                                        <option value="250 Ml">250 Ml</option>
                                        <option value="1 KG">1 Kg</option>
                                        <option value="750 Grams">750 Grams</option>
                                        <option value="500 Grams">500 Grams</option>
                                        <option value="250 Grams">250 Grams</option>
                                        <option value="1 pack">Full pack</option>
                                        <option value="1/2 pack">Mini pack</option>


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
                                           value="{{$product->offer_price}}">
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
                                    <label for="Product in stock">In Stock</label>
                                    <input type="text" name="stock" class="form-control" id="stock"
                                           value="{{$product->stock}}">
                                </div>

                                <hr>

                                <div class="form-group">
                                    {{--<label for="Specification of the product">Specification</label>--}}
                                    <textarea name="description" id="editor"
                                    >{{$product->description}}</textarea>
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
    <!-- /.box -->
@endsection

