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
                <li><a href="{{route('categories.index')}}">Category</a></li>
                <li class="active">Create</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('categories.store')}}" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="Category_add">Category Title</label>
                                    <input type="text" class="form-control" id="Cat_title" name="title"
                                           placeholder="Enter The Category You Want To Add">
                                </div>

                                <div class="form-group">
                                    <label for="Category_add">Category Description</label>
                                    <input type="text" class="form-control" id="Cat_title" name="description"
                                           placeholder="Describe the category">
                                </div>
                                <div class="form-group">
                                    <label>Category Type</label>

                                    <select class="form-control" name="parent_id">
                                        <option value="0">None</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>

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

    <!-- /.box -->
@endsection

