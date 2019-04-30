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
                <li class="active">Special Offers</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Offers list</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id
                                    </th>
                                    <th>NEWS About
                                    </th>
                                    <th>News Category</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $newz)
                                    <tr>
                                        <td>{{$newz->id}}</td>
                                        <td>{{$newz->about}}</td>
                                        <td>{{$newz->news_category_id}}</td>
                                        <td>{{$newz->title}}</td>
                                        <td>{{$newz->image}}</td>
                                        <td>{{str_limit($newz->description,250)}}</td>
                                        <td>
                                            <img src="{{asset('uploads/Products/News/'.$newz->image)}}" alt="" width="150px" height="100">
                                        </td>
                                        <td>{{$blog->created_at}}</td>
                                        <td>{{$blog->updated_at}}</td>
                                        <td>
                                                <form action="{{route('blogs.edit',$newz->id)}}" method="GET">
                                                {{method_field('PUT')}}
                                                <button type="submit"><span class="fa fa-edit"></span></button>
                                                {{csrf_field()}}
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('blogs.destroy',$newz->id)}}" method="post">
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

