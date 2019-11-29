@extends('Backend.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Orders
                <small>Page</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i>Admin Home</a></li>
                <li class="active">Orders</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All orders</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>order no</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>X</td>
                                </tr>
                                </tbody>

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
        <!-- /.content -->
    </div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Orders List

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
                            <h3 class="box-title">Orders list</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="master">
                                    </th>
                                    <th>Product
                                        ID
                                    </th>
                                    <th>Product
                                        Title
                                    </th>
                                    <th>Featured</th>
                                    <th>Product Category</th>
                                    <th>Product Volume</th>
                                    <th>In stock</th>
                                    <th>Product Offer</th>
                                    <th>Offered price</th>
                                    <th>Real Price</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td><input type="checkbox" class="sub_chk" data-id="{{$order->id}}"></td>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->featured ? 'Yes' : 'No'}}</td>
                                        <td>{{$order->category ? $order->category->title : ''}}</td>
                                        <td>{{$order->volume}}</td>
                                        <td>{{$order->stock}}</td>
                                        <td>{{$order->offer ? 'Yes' : 'No' }}</td>
                                        <td>{{$order->offer ? $order->offer_price : ''}}</td>
                                        <td>{{$order->price}}</td>
                                        <td>
                                            <img src="{{asset('uploads/Products/thumbnail/'.$order->image)}}" alt=""
                                                 width="150px" height="100">
                                        </td>
                                        <td>{{str_limit($order->description,250)}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->updated_at}}</td>
                                        <td>
                                            <form action="{{route('products.edit',$order->id)}}" method="GET">
                                                {{method_field('PUT')}}
                                                <button type="submit"><span class="fa fa-edit"></span></button>
                                                {{csrf_field()}}
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('products.destroy',$order->id)}}" method="post">
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
                    <div class="col-sm-offset-10">
                        {{$orders->render()}}
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


