@extends('Backend.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Roles List

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Reviews</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Reviews</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Review Id</th>
                                    <th>Review On</th>
                                    <th>Posted Review</th>
                                    <th>Review Author</th>
                                    <th>Author Email</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($reviews as $review)

                                    <tr>

                                        <td>{{$review->id}}</td>
                                        <td><a href="{{route('product-detail',$review->product_review->slug)}}">{{$review->product_review->name}}</a></td>
                                        <td>{{$review->review}}</td>
                                        <td>{{$review->author}}</td>
                                        <td>{{$review->email}}</td>
                                        <td>{{$review->created_at}}</td>
                                        <td>{{$review->updated_at}}</td>
                                        <td>

                                            <form action="{{'edit-reviews',$review->product_review->slug}}" method="post">
                                            <select id="list" onchange="getSelectValue();" class="form-control-sm" name="status" >
                                                <option value="1">Approved</option>
                                                <option value="0">Un-approved</option>
                                            </select>
                                                <input type="submit" class="btn btn-xs">
                                                <input type="reset" class="btn btn-xs">
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('roles.destroy',$review->id)}}" method="post">
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
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$reviews->render()}}
        </div>
    </div>

    <!-- /.content -->
@endsection

