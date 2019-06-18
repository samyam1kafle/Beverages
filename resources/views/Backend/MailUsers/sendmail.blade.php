@extends('Backend.master')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Mailbox
                <small>13 new messages</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Mailbox</li>
            </ol>
        </section>
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{Session::flash('Error',$error)}}
        @endforeach
    @endif
    <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('inbox')}}" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>

                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Folders</h3>

                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{route('inbox')}}"><i class="fa fa-inbox"></i> Inbox
                                        <span class="label label-primary pull-right">4</span></a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                                <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                                <li><a href="#"><i class="fa fa-filter"></i> Junk <span
                                                class="label label-warning pull-right">65</span></a>
                                </li>
                                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->

                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Compose New Message</h3>
                        </div>
                        <!-- /.box-header -->
                        <form action="{{route('create_mail')}}" method="post" autocomplete="on">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder="To:">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="subject" placeholder="Subject:">
                                </div>
                                <div class="form-group">
                    <textarea id="editor" name="message" class="form-control" style="height: 300px">
                      <p>Thank you sir for registering to our site . Hope you will enjoy all our facilities and our services .Buy your favourate beverages at reasonable price with absolutely free delivery to your footsteps .</p>
                      <p>Thank you,</p>
                      <p>NAB Family</p>
                    </textarea>
                                </div>
                                {{--<div class="form-group">--}}
                                {{--<div class="btn btn-default btn-file">--}}
                                {{--<i class="fa fa-paperclip"></i> Attachment--}}
                                {{--<input type="file" name="attachment">--}}
                                {{--</div>--}}
                                {{--<p class="help-block">Max. 32MB</p>--}}
                                {{--</div>--}}
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft
                                    </button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send
                                    </button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard
                                </button>
                            </div>
                            <!-- /.box-footer -->
                        </form>

                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection