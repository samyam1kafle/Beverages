@extends('FrontEnd.layers.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('home-index')}}">Home</a></li>
                    <li class="active">Your Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Items</td>
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
                                <a href=""><img src="{{asset('uploads/Products/thumbnail/'.$product->image)}}"
                                                style="width: 72px" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$product->product_name}} | {{$product->product_volume}}</a></h4>

                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">Rs {{$product->price}}</p>
                            </td>

                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input class="cart_quantity_input" type="text" name="quantity"
                                           value="{{$product->quantity}}" autocomplete="off" size="2" disabled>
                                </div>
                            </td>

                            <td class="cart_price">
                                <p>Rs {{$product->price * $product->quantity}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url('cart/delete',$product->slug)}}"><i
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

                                <tr>

                                    <td>
                                        <hr>
                                        <a href="{{route('home-index')}}" class="btn btn-sm btn-primary ">Shop More</a>
                                    </td>
                                    <td>
                                        <hr>
                                        <a href="{{route('checkout')}}" class="btn btn-sm btn-primary ">Checkout</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>

                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->


@endsection