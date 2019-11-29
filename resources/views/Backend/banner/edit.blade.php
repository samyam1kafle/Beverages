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
                            <h3 class="box-title">Edit Banner</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('banner_edit_store',$banner->id)}}" role="form" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-sm-6">
                                            <img src="{{asset('uploads/banners/'.$banner->image)}}" width="110px" height="105px" alt="">

                                            <div class="form-group">
                                                <label for="exampleInputFile">Banner Input</label>
                                                <input style="padding-top: 4px;" type="file" name="image" id="exampleInputFile">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Banner Status</label>
                                                <select class="form-control btn-xs" name="status_id">
                                                    <option value="0">None</option>
                                                    @foreach($statuss as $status)
                                                        <option value="{{$status->id}}" id="featured">{{$status->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.box-body -->
                            {{csrf_field()}}
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-danger">Reset</button>

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

