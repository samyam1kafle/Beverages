@extends('Backend.master')
@section('content')
    <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users Section

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="{{route('users.index')}}">Users</a></li>
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
                            <h3 class="box-title">Add Subscribers</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('users.store')}} " method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                           placeholder="Liquor Shop Nepal">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                           placeholder="liquor123@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                           placeholder="XXXXXXXXXX">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password Confirmation</label>
                                    <input type="password"  class="form-control"
                                           id="exampleInputPassword1 "
                                           placeholder="XXXXXXXXXX" name="password_confirmation">
                                </div>

                                <div class="form-group">
                                    <label for="Users_Role">User Role</label>
                                    <select class="form-control" name="role">
                                        @foreach($roles as $role)

                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputFile">Enter Your Desired Profile Picture</label>
                                    <input type="file" id="exampleInputFile" name="image">
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

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

                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection