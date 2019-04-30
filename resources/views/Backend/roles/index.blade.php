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
                <li class="active">Roles</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Categories list</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Role Id</th>
                                    <th>Role Title</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}
                                        </td>
                                        <td>{{$role->created_at}}</td>
                                        <td>{{$role->updated_at}}</td>
                                        <td>
                                            <form action="{{route('roles.edit',$role->id)}}" method="GET">
                                                {{method_field('PUT')}}
                                                <button type="submit"><span class="fa fa-edit"></span></button>
                                                {{csrf_field()}}
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('roles.destroy',$role->id)}}" method="post">
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
                {{$roles->render()}}
            </div>
        </div>

        <!-- /.content -->
@endsection

