@extends('Backend.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Profile
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">User profile</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="{{asset('uploads/Users/'.$user->image)}}" alt="User profile picture">

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            <p class="text-muted text-center">{{$user->roles->name}}</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="pull-right">{{$user->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Joined date</b> <a class="pull-right">{{$user->created_at}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Profile Updated</b> <a class="pull-right">{{$user->updated_at}}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                            <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li><a href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">

                                <!-- Post -->
                                @foreach($reviews as $review)
                                <div class="post clearfix">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{asset('admin/dist/img/user7-128x128.jpg')}}"
                                             alt="User Image">
                                        <span class="username">
                          <a href="#">{{$review->author}}</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                        <span class="description">Posted at | {{$review->created_at}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        {{$review->review}}
                                    </p>

                                    <form class="form-horizontal">
                                        <div class="form-group margin-bottom-none">
                                            <div class="col-sm-9">
                                                <input class="form-control input-sm" placeholder="Response">
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="submit"
                                                        class="btn btn-danger pull-right btn-block btn-sm">Send
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endforeach
                                <!-- /.post -->

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-envelope bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email
                                            </h3>

                                            <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs">Read more</a>
                                                <a class="btn btn-danger btn-xs">Delete</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-user bg-aqua"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted
                                                your friend request
                                            </h3>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-comments bg-yellow"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post
                                            </h3>

                                            <div class="timeline-body">
                                                Take me to your leader!
                                                Switzerland is small and neutral!
                                                We are more like Germany, ambitious and misunderstood!
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-camera bg-purple"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
                                            </h3>

                                            <div class="timeline-body">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <li>
                                        <i class="fa fa-clock-o bg-gray"></i>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-pane" id="settings">
                                @if(count($errors)>0)
                                    @foreach($errors->all() as $error)
                                        {{session('Error',$error)}}
                                    @endforeach
                                @endif

                                <form action="{{route('ProfileUpdate',$user->id)}}" class="form-horizontal"
                                      method="post"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="inputName"
                                                   value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" id="inputEmail"
                                                   value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Password</label>

                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" id="inputName"
                                                   placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Confirm Password</label>

                                        <div class="col-sm-10">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                   id="inputName" placeholder="Confirm Password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Update Your Profile
                                            Picture</label>

                                        <div class="col-sm-10">
                                            <input type="file" name="image" class="form-control"
                                                   placeholder="Update Image">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="te_rm" value="1"> I agree to the <a
                                                            href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{csrf_field()}}

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- /.tab-pane -->

                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
@endsection