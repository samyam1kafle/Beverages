@extends('FrontEnd.layers.master')
@section('content')
    <div class="panel-group">
        <div class="panel panel-default" id="address" style="display: block;">
            <div class="panel-heading">Want to Update Your Shipping Address ?</div>

            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 panel-body">
                        <form action="{{route('checkout')}}" method="post">
                            <input type="hidden" name="user_id" value="1">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="user_name" value="{{$user->user_name}}">
                            </div>

                            <div class="form-group">
                                <label for="country">Email</label>
                                <input type="email" class="form-control" name="user_email"
                                       value="{{$user->user_email}}">
                            </div>


                            <div class="form-group">
                                <label for="country">Country *</label>
                                <select class="form-control" name="Country" id="country">
                                    <option value="Nepal">{{$user->Country}}</option>
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
                                <input type="text" class="form-control" name="state" value="{{$user->state}}"
                                       id="acc_streetName">
                            </div>
                            <div class="form-group">
                                <label for="acc_streetName">Address *</label>
                                <input type="text" class="form-control" value="{{$user->address1}}" name="address1"
                                       id="acc_streetName">
                            </div>
                            <div class="form-group">
                                <label for="acc_streetName">Optional Address *</label>
                                <input type="text" class="form-control" value="{{$user->address2}}" name="address2"
                                       id="acc_streetName">
                            </div>


                            <div class="form-group">

                                <label for="mobile">Mobile</label>
                                <div class="input-group mb-2">
                                    <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control"
                                           id="mobile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="landline">Mobile(Optional) *</label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" value="{{$user->landline}}" name="landline"
                                           id="landline">
                                </div>
                            </div>
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-sm btn-primary">Update & checkout</button>
                            <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div><br><br>

    <div class="panel-group">
        <div class="panel panel-default" id="address" style="display: block;">
            <div class="panel-heading"> Review & Payment</div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 panel-body">
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                <thead>
                                <tr class="cart_menu">
                                    <td class="image">Image</td>
                                    <td class="description-block">Product Details</td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $subtotal = 0 ;
                                    $product_price = 0;
                                    $tax = 0;
                                    $shipping_cost = 0;
                                    $total = 0;
                                @endphp
                                @foreach($products as $product)
                                    <input type="hidden"
                                           value="{{$subtotal +=  $product->price * $product->quantity}}">
                                    <input type="hidden" value="{{$tax = 0.07 * $subtotal}}">
                                    @if($subtotal < 2000)
                                        <input type="hidden" value="{{$shipping_cost = 100}}">
                                    @elseif($subtotal > 2000 && $subtotal < 6000)
                                        <input type="hidden" value="{{$shipping_cost = 70}}">
                                    @elseif($subtotal > 6000 && $subtotal < 15000)
                                        <input type="hidden" value="{{$shipping_cost = 50}}">
                                    @elseif($subtotal > 15000)
                                        <input type="hidden" value="{{$shipping_cost = null}}">
                                    @endif

                                    <tr>
                                        <td class="cart_product">
                                            <a href=""><img
                                                        src="{{asset('uploads/Products/thumbnail/'.$product->image)}}"
                                                        style="width: 72px" alt=""></a>
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href="">{{$product->product_name}} | {{$product->product_volume}}</a>
                                            </h4>

                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">Rs {{$product->price}}</p>
                                        </td>

                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">

                                                <input class="cart_quantity_input" type="text" name="quantity"
                                                       value="{{$product->quantity}}" autocomplete="off" size="2"
                                                       disabled>

                                            </div>
                                        </td>

                                        <td class="cart_price">
                                            <p>Rs {{$product->price * $product->quantity}}</p>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete"
                                               href="{{url('cart/delete',$product->slug)}}"><i
                                                        class="fa fa-times"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                                <input type="hidden"
                                       value="{{$total += $subtotal + $tax + $shipping_cost }}">
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                    <td colspan="2">
                                        <table class="table table-condensed total-result">
                                            <tbody>
                                            <tr>
                                                <td>Cart Sub Total</td>
                                                <td>Rs. {{$subtotal}}</td>
                                            </tr>
                                            <tr>
                                                <td>Exo Tax (7%)</td>
                                                <td>Rs. {{$tax}}</td>
                                            </tr>
                                            <tr class="shipping-cost">
                                                <td>Shipping Cost</td>
                                                @if($shipping_cost != null)
                                                    <td>Rs. {{$shipping_cost}}</td>
                                                @else
                                                    <td>Free</td>
                                                @endif

                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td><span>Rs. {{$total}}</span></td>
                                            </tr>


                                            </tbody>

                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <br><br>
@endsection