@extends('FrontEnd.layers.master')
@section('content')
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{Session::flash('Error',$error)}}
        @endforeach
    @endif

    <section id="form">
        <div class="container">
            <div class="row bg-img">
                <div class="col-sm-4 col-sm-offset-4" style="border: 1px solid #F7F7F5;">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="{{route('login')}}" method="post" autocomplete="on">

                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="password" type="password" placeholder="Password">
                            </div>
                            <span>
								<input type="checkbox" name="remember" value="1" class="checkbox">
								<p style="color: #1fff38; ">Keep me signed in</p>
							</span>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">Login</button>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section>
@endsection