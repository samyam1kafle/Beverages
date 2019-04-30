@extends('Backend.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Category Section

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Offers</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Offer list</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Offer ID</th>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Real Price</th>
                                    <th>Offered Price</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($blogs as $blog)
                                    <tr>
                                       
                                        <td>{{$blog->id}}</td>
                                        <td>{{$blog->name}}
                                        </td>
                                        <td>
                                            <img src="{{asset('uploads/Products/'.$blog->image)}}" width="100" height="75" alt="">
                                        </td>
                                        <td>{{$blog->price}}</td>
                                        <td>{{$blog->offer_price}}</td>
                                        <td>{{$blog->created_at}}</td>
                                        <td>{{$blog->updated_at}}</td>
                                        <td>
                                            <form action="{{route('categories.edit',$blog->id)}}" method="GET">
                                                {{method_field('PUT')}}
                                                <button type="submit"><span class="fa fa-edit"></span></button>
                                                {{csrf_field()}}
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('categories.destroy',$blog->id)}}" method="post">
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
    {{--<div class="row">--}}
        {{--<div class="col-sm-6 col-sm-offset-5">--}}
            {{--{{$blogs->render()}}--}}
        {{--</div>--}}
    {{--</div>--}}

    <!-- /.content -->
@endsection

