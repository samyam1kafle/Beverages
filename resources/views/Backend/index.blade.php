@extends('Backend.master')
  <!-- Left side column. contains the logo and sidebar -->

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">


      <!-- =========================================================== -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$products}}</h3>

              <p>Total Products</p>
            </div>
            <div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
            <a href="{{url('admin/products')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- small box -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$orders}}</h3>

              <p>Total Order</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-basket"></i>
            </div>
            <a href="{{route('BackendCart')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$categories}}<sup style="font-size: 20px">%</sup></h3>

              <p>Total Categories</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('admin/categories')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$users}}</h3>

              <p>Users Registered</p>
            </div>
            <div class="icon">
              <i class="fa fa-registered"></i>
            </div>
            <a href="{{url('admin/users')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$roles}}</h3>

              <p>Total Roles Seperated</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('admin/roles')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$subscribers}}</h3>

              <p>Total Users Subscribed</p>
            </div>
            <div class="icon">
              <i class="fa fa-handshake-o"></i>
            </div>
            <a href="{{route('totalsubscribers')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!-- =========================================================== -->


    </section>
    <!-- Main content -->
    {{--<section class="content">--}}
      {{--<!-- Small boxes (Stat box) -->--}}
      {{--<div class="row">--}}
        {{--<div class="col-lg-3 col-xs-6">--}}
          {{--<!-- small box -->--}}
          {{--<div class="small-box bg-aqua">--}}
            {{--<div class="inner">--}}
              {{--<h3>150</h3>--}}

              {{--<p>Total Products</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
              {{--<i class="ion ion-bag"></i>--}}
            {{--</div>--}}
            {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
          {{--</div>--}}
        {{--</div>--}}
        {{--<!-- ./col -->--}}
        {{--<div class="col-lg-3 col-xs-6">--}}
          {{--<!-- small box -->--}}
          {{--<div class="small-box bg-green">--}}
            {{--<div class="inner">--}}
              {{--<h3>53<sup style="font-size: 20px">%</sup></h3>--}}

              {{--<p>Bounce Rate</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
              {{--<i class="ion ion-stats-bars"></i>--}}
            {{--</div>--}}
            {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
          {{--</div>--}}
        {{--</div>--}}
        {{--<!-- ./col -->--}}
        {{--<div class="col-lg-3 col-xs-6">--}}
          {{--<!-- small box -->--}}
          {{--<div class="small-box bg-yellow">--}}
            {{--<div class="inner">--}}
              {{--<h3>44</h3>--}}

              {{--<p>User Registrations</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
              {{--<i class="ion ion-person-add"></i>--}}
            {{--</div>--}}
            {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
          {{--</div>--}}
        {{--</div>--}}
        {{--<!-- ./col -->--}}
        {{--<div class="col-lg-3 col-xs-6">--}}
          {{--<!-- small box -->--}}
          {{--<div class="small-box bg-red">--}}
            {{--<div class="inner">--}}
              {{--<h3>65</h3>--}}

              {{--<p>Unique Visitors</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
              {{--<i class="ion ion-pie-graph"></i>--}}
            {{--</div>--}}
            {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
          {{--</div>--}}
        {{--</div>--}}
        {{--<!-- ./col -->--}}
      {{--</div>--}}
      {{--<!-- /.row -->--}}
      {{--<!-- Main row -->--}}

      {{--<!-- /.row (main row) -->--}}

    {{--</section>--}}
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- ./wrapper -->
@endsection

