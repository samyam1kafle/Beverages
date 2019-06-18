@extends('Backend.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Cart Product List

            </h1>

            <ol class="breadcrumb">
                <li><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Cart</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Cart Products list</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product ID</th>
                                    <th>Session Id</th>
                                    <th>User Email</th>
                                    <th>Product Name</th>
                                    <th>Product Volume</th>
                                    <th>Unit Product Price</th>
                                    <th>Total Price</th>
                                    <th>Ordered Quantity</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    {{--<th>Edit</th>--}}
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->product_id}}</td>
                                        <td>{{$product->session_id}}</td>
                                        <td>{{$product->user_email}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->product_volume}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->price * $product->quantity}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>{{$product->updated_at}}</td>
                                        {{--<td>--}}
                                            {{--<form action="{{route('products.edit',$product->id)}}" method="GET">--}}
                                                {{--{{method_field('PUT')}}--}}
                                                {{--<button type="submit"><span class="fa fa-edit"></span></button>--}}
                                                {{--{{csrf_field()}}--}}
                                            {{--</form>--}}
                                        {{--</td>--}}
                                        <td>
                                            <form action="{{route('BackendCartDelete',$product->id)}}" method="post">
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
                        {{$products->render()}}
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

