@extends('Backend.master')
<!-- Left side column. contains the logo and sidebar -->

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <s></s>

        <div class="container-fluid" style="min-height: 1126px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Search Page
                    <small>Searched results here</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Search Page</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                        <div class="box-header">
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="" data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                    title="" data-original-title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="row">

                                        <div class="col-sm-offset-8">
                                            <div id="example1_filter" class="dataTables_filter">
                                                <label>
                                                    <form action="{{route('Adminsearch')}}" method="post"
                                                          class="sidebar-form">
                                                        {{csrf_field()}}
                                                        <div class="input-group">
                                                            <input type="text" name="query" class="form-control"
                                                                   placeholder="Search...">
                                                            <span class="input-group-btn">
                <button type="submit" value="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                                                        </div>
                                                    </form>
                                                </label>
                                            </div>
                                        </div>
                                        <b>{{ $searchResults->count() ? $searchResults->count() : 'No' }} results found for "{{ request('query') }}
                                            "</b>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example1"
                                                       class="table table-bordered table-striped dataTable"
                                                       role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="fa fa-database"
                                                            style="width: 182px;"> Models Found from Database
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending"
                                                            style="width: 224px;">Results
                                                        </th>


                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                                                        @foreach($modelSearchResults as $searchResult)
                                                            <tr>
                                                                <td class="sorting_1">
                                                                    @if($searchResult->type == 'categories')
                                                                        <a href="{{route('products',$searchResult->searchable->slug)}}">{{ ucfirst($type)}}</a>
                                                                @elseif($searchResult->type == 'products')
                                                                        <a href="{{route('product-detail',$searchResult->searchable->slug)}}">{{ ucfirst($type)}}</a>
                                                                    @elseif($searchResult->type == 'all_users')
                                                                        <a href="{{url('admin/users')}}">{{ ucfirst($type)}}</a>
                                                                @endif
                                                                <td>{{ $searchResult->title }}</td>

                                                                </td>
                                                            </tr>
                                                        @endforeach



                                                    @endforeach


                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">Found From</th>
                                                        <th rowspan="1" colspan="1">Search results likely</th>

                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>


    </div>

@endsection

