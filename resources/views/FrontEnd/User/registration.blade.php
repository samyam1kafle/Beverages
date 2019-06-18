@extends('FrontEnd.layers.master')
@section('content')
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{Session::flash('Error',$error)}}
        @endforeach
    @endif
    <section id="form">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4" style="border: 1px solid #F7F7F5; box-shadow: 2px 2px 20px 0 rgba(0,0,0,.4)">
                    <div class="signup-form"><!--sign up form-->
                        <h2 >New User Signup !</h2>
                        <form action="{{route('userRegister')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="role" value="3">
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input class="form-control" name="name" type="text" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input class="form-control" name="email" type="email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input class="form-control" name="password" type="password" placeholder="password"/>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input class="form-control" name="password_confirmation" type="password"
                                       placeholder="Confirm Password"/>
                            </div>

                            <div class="form-group">
                                <label for="image">Upload Your Image</label>
                                <input class="form-control" name="image" type="file"/>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">Signup</button>

                            </div>

                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section>

@endsection