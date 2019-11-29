@extends('Backend.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Banner Status Section

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="{{route('categories.index')}}">Banner</a></li>
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
                        @foreach($errors->all() as $error)
                            {{Session::flash('Error',$error)}}
                        @endforeach
                    @endif
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Banner status</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('bannerstatussave')}}" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="Category_add">Status Title</label>
                                    <input type="text" class="form-control" id="Cat_title" name="title"
                                           placeholder="Eg : Featured, Offer ,etc">
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

