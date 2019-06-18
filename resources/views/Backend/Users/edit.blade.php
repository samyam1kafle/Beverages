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
                            <h3 class="box-title">Edit User info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('users.update',$user->id)}}" method="post" autocomplete="on" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                           value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                           value="{{$user->email}}">
                                </div>

                                <div class="form-group">
                                    <label for="Users_Role">User Role</label>
                                    <select class="form-control" name="role">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div >
                                    <label for="exampleInputFile">Update Users Profile Picture</label>
                                    <input type="file" id="image" name="image" >
                                    <img src="{{asset('uploads/Users/'.$user->image)}}" alt="User image" width="100" height="125">

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

