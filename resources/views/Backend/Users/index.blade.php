@extends('Backend.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users Section

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Customers list</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>User ID
                                    </th>
                                    <th>UserName
                                    </th>
                                    <th>Image
                                    </th>
                                    <th>Role</th>

                                    <th>Active_status</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            <img src="{{asset('uploads/Users/'.$user->image)}}"
                                                 alt="Users image" width="50px" height="60">
                                        </td>
                                        <td>{{$user->roles ? $user->roles->name : ''}}</td>
                                        <td>{{$user->Is_active}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->updated_at}}</td>

                                        <td>
                                            <form action="{{route('users.edit',$user->id)}}" method="GET">
                                                {{method_field('PUT')}}
                                                <button type="submit"><span class="fa fa-edit"></span></button>
                                                {{csrf_field()}}
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('users.destroy',$user->id)}}" method="post">
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

