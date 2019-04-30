@extends('Backend.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Product List

            </h1>

            <ol class="breadcrumb">
                <li><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Products</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Products list</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Product
                                        ID
                                    </th>
                                    <th>Product
                                        Title
                                    </th>
                                    <th>Featured</th>
                                    <th>Product Category</th>
                                    <th>Product Offer</th>
                                    <th>Offered price</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->featured ? 'Yes' : 'No'}}</td>
                                        <td>{{$product->category ? $product->category->title : ''}}</td>
                                        <td>{{$product->offer ? 'Yes' : 'No' }}</td>
                                        <td>{{$product->offer ? $product->offer_price : ''}}</td>
                                        <td>
                                            <img src="{{asset('uploads/Products/thumbnail/'.$product->image)}}" alt="" width="150px" height="100">
                                        </td>
                                        <td>{{$product->price}}</td>
                                        <td>{{str_limit($product->description,250)}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>{{$product->updated_at}}</td>
                                        <td>
                                            <form action="{{route('products.edit',$product->id)}}" method="GET">
                                                {{method_field('PUT')}}
                                                <button type="submit"><span class="fa fa-edit"></span></button>
                                                {{csrf_field()}}
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('products.destroy',$product->id)}}" method="post">
                                                {{method_field('DELETE')}}
                                                <button type="submit"><span class="fa fa-trash"></span></button>
                                                {{csrf_field()}}
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>


                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
        <!-- /.content -->
@endsection

