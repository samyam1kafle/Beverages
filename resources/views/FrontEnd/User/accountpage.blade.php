@extends('FrontEnd.layers.master')
@section('content')

    <div id="edit_account_info" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Edit your account info</h4>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Old-Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword"
                                   placeholder="Old Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Re-Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2"
                                   placeholder="Re-Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <div id="edit_personal_info" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit your personal info</h4>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName">
                        </div>
                        <div class="form-group">
                            <label for="userName">User Name</label>
                            <input type="text" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div class="radio">
                                <label><input type="radio" name="gender">Male</label>

                            </div>
                            <div class="radio">
                                <label><input type="radio" name="gender">Female</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date Of Birth</label>
                            <input type="text" id="datepicker" class="form-control" placeholder="Choose">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



    <div id="edit_commnotifysettings" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Notification Settings</h3>
                    <h5>Choose the notifications you want to receive.</h5>
                </div>
                <form>
                    <div class="modal-body">
                        <ul class="liststyle--none">
                            <li class="notify--list">
                                <a href="#" class="accordion-title" data-toggle="collapse"
                                   data-target="#collapseExample" aria-expanded="false" aria-selected="false">
                                    <h4><b>Recommendations</b></h4>
                                    <span>You are special! Get personalized offers, promotions and coupons on your favorite brand and items.</span>
                                    <span class="btn btn-primary pull-right mb-10">options</span>
                                    <span class="clearfix"></span>
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <form>
                                        <input type="hidden" name="updateCustomerCPC" value="1">
                                        <ul class="liststyle--none">
                                            <li>
                                                <input type="checkbox" class="channel_settings channel_settings_1"
                                                       checked="">Email
                                            </li>
                                            <li>

                                                <input type="checkbox" class="channel_settings channel_settings_1"
                                                       checked="">Push Notifications

                                            </li>
                                            <li>
                                                <input type="checkbox" class="channel_settings channel_settings_1"
                                                       checked="">SMS
                                            </li>
                                        </ul>
                                        <div class="save-action ">
                                            <input type="submit" class="btn btn-primary btn-sm pull-right" value="Save">
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>


                </form>
            </div>
        </div>
    </div>


    <section class="content-box-row">
        <div class="container " style="margin:10px auto;padding:0;">

            <div class="alert__section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <strong>Success!</strong> Indicates a successful or positive action.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="profile__section">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="account--userInfo p-2">
                            <a href="javascript:void(0)" class="d-block ">
                                <span class="userInfo--name bold">{{Auth::User()->name}}</span>
                                <small class="userInfo--email data">{{Auth::User()->email}}</small>
                            </a>
                        </div>
                        <div class="grouplist tab d-none d-sm-block">
                            <ul class="liststyle--none">
                                <li><a href="javascript:void(0)" class="tabslinks"
                                       onclick="accountsettings(event, 'orders')"><i
                                                class="fas fa-book fa-2x mr-10"></i>My orders</a></li>
                                <li><a href="javascript:void(0)" class="tabslinks"
                                       onclick="accountsettings(event, 'address')"><i
                                                class="fas fa-address-card fa-2x mr-10"></i>Shipping addresses</a></li>
                                @if($requested)
                                    <li><a href="javascript:void(0)" class="tabslinks"
                                           onclick="accountsettings(event, 'wishlist')" id="defaultOpen"><i
                                                    class="fas fa-heart fa-2x mr-10"></i>wish lists</a></li>
                                @else
                                    <li><a href="javascript:void(0)" class="tabslinks"
                                           onclick="accountsettings(event, 'wishlist')"><i
                                                    class="fas fa-heart fa-2x mr-10"></i>wish lists</a></li>
                                @endif
                                <li><a href="javascript:void(0)" class="tabslinks"
                                       onclick="accountsettings(event, 'account')" id="defaultOpen"><i
                                                class="fas fa-edit fa-2x mr-10"></i>account settings</a></li>

                            </ul>
                        </div>


                    </div>

                    <div class="col-md-9 col-sm-12">

                        <div id="account" class="account-settings__container tabcontent">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 ">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <strong class="titles">Account Information</strong>
                                                <a class="pull-right link" href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#edit_account_info"><i class="far fa-edit"></i> Edit</a>
                                            </div>
                                            <div class="panel-body">

                                                <ul class="liststyle--none">
                                                    <li><span class="mr-10 bold">Name:</span><span
                                                                class="userInfo--name">{{Auth::User()->name}}</span>
                                                    </li>
                                                    <li><span class="mr-10 bold">Password:</span><span
                                                                class="userInfo--password data">********</span></li>
                                                    <li><a class="link" href="javascript:void(0)" data-toggle="modal"
                                                           data-target="#edit_account_info">Change Password</a></li>
                                                </ul>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12 ">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <strong class="titles">Personal Information</strong>
                                                <a class="pull-right link" href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#edit_personal_info"><i class="far fa-edit"></i>
                                                    Edit</a>

                                            </div>
                                            <div class="panel-body">
                                                <ul class="liststyle--none">
                                                    <div class="row">
                                                        <div class="container">
                                                            <div class="col-sm-12">
                                                                <div class="col-sm-3">
                                                                    <li><span class="mr-10 bold">Name:</span>{{Auth::User()->name}}
                                                                    </li>
                                                                    <br>
                                                                    <li><span class="mr-10 bold">Email:</span><span
                                                                                class="userInfo--username data">{{Auth::user()->email}}</span>
                                                                    </li>
                                                                </div>
                                                                <div class="com-sm-3">
                                                                    <li><img
                                                                                src="{{asset('uploads/Users/'.Auth::User()->image)}}"
                                                                                width="100px" alt=""></li>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="container orders__container tabcontent" id="orders">
                            <h3>My orders</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ORDERS#</th>
                                        <th>DATE</th>
                                        <th>SHIP TO</th>
                                        <th>ORDER TOTAL</th>
                                        <th>ORDER STATUS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                        <td>John</td>
                                        <td>Doe</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="container wishlist__container tabcontent " id="wishlist">
                            <h3>My wishlist</h3>


                            <div class="table-responsive d-none d-sm-block">
                                @foreach($wishlists as $wish)
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td style="width:100px;">
                                                <div class="wishlist-product-img">
                                                    <a href="{{route('product-detail',$wish->products->slug)}}" class="d-block">

                                                        <img src="{{asset('uploads/Products/thumbnail/'.$wish->products->image)}}"
                                                             alt="" style="width: 100%;">
                                                    </a>
                                                </div>
                                            </td>
                                            <td style="width:100px;">
                                                <a href="{{route('product-detail',$wish->products->slug)}}" class="link">{!!$wish->products->name!!}</a>
                                            </td>
                                            <td class="price">
                                                @if($wish->products->offer)
                                                    <del>
                                                        <span class="price d-block">Rs. {{$wish->products->price}}</span>
                                                    </del>
                                                @endif
                                                <span class="price d-block">Rs. {{$wish->products->offer ? $wish->products->offer_price : $wish->products->price}}</span>

                                            </td>
                                            <td>
                                                <a
                                                        class="button--cancel"
                                                        href="{{url('wishlist/delete',$wish->products->id)}}"><i
                                                            class="fa fa-trash"></i></a>

                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                @endforeach
                                {!! $wishlists->render() !!}
                            </div>


                        </div>

                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                {{Session::flash('Error',$error)}}
                            @endforeach
                        @endif
                        <div class="container address__container tabcontent" id="address">
                            <h3>Address settings</h3>
                            <form action="{{route('shipping-address')}}" method="post">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
                                <input type="hidden" name="user_email" value="{{Auth::user()->email}}">

                                <div class="form-group">
                                    <label for="country">Country *</label>
                                    <select class="form-control" name="Country" id="country">
                                        <option value="Nepal">Nepal</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="city">District *</label>
                                    <select class="form-control" id="city" name="City">
                                        <option value="Kathmandu">Kathmandu</option>
                                        <option value="Bhaktapur">Bhaktapur</option>
                                        <option value="Lalitpur">Lalitpur</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="country">State *</label>
                                    <input type="text" class="form-control" name="state" id="acc_streetName">
                                </div>
                                <div class="form-group">
                                    <label for="acc_streetName">Address *</label>
                                    <input type="text" class="form-control" name="address1" id="acc_streetName">
                                </div>
                                <div class="form-group">
                                    <label for="acc_streetName">Optional Address *</label>
                                    <input type="text" class="form-control" name="address2" id="acc_streetName">
                                </div>


                                <div class="form-group">

                                    <label for="mobile">Mobile</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+977</div>
                                        </div>
                                        <input type="text" name="mobile" class="form-control" id="mobile">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="landline">Mobile(Optional) *</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+977</div>
                                        </div>
                                        <input type="text" class="form-control" name="landline" id="landline">
                                    </div>
                                </div>
                                {{csrf_field()}}
                                <button type="submit" class="view-cart">Submit</button>
                                <button type="submit" class="btn view-cart">Cancel</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection