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
                            <h3 class="box-title">Edit Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('categories.update',$category->id)}}" method="post" autocomplete="on">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="Category_edit">Category To Be Updated</label>
                                    <input type="text" class="form-control" id="Cat_title" name="title"
                                           value="{{$category->title}}">
                                </div>

                                <div class="form-group">
                                    <label for="Category_edit">Description To Be Updated</label>
                                    <input type="text" class="form-control" id="Cat_title" name="description"
                                           value="{{$category->description}}">
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
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{Session::flash('Error',$error)}}
        @endforeach
    @endif
    <!-- /.box -->
@endsection

