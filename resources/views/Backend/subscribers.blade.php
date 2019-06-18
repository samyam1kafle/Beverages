@extends('Backend.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Subscribers

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Subscribers</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Total {{$subscribers->count()}} Subscribers in our site </h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Subscribers Id</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($subscribers as $subscriber)
                                    <tr>
                                        <td>{{$subscriber->id}}</td>
                                        <td>{{$subscriber->email}}
                                        </td>
                                        <td>{{$subscriber->status ? 'Active' : 'Inactive'}}
                                        </td>
                                        <td>{{$subscriber->created_at}}</td>
                                        <td>{{$subscriber->updated_at}}</td>

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
            {{$subscribers->render()}}
        </div>
    </div>
@endsection