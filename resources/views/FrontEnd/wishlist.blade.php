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
                        <td class="image">Image</td>
                        <td class="description-block">Name / volume</td>
                        <td class="description-block">Availability</td>
                        <td class="price">Price</td>
                        <td class="cart_description">View</td>
                        <td class="cart_description">Delete</td>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wishlist as $wish)
                        <tr>
                            <td class="cart_product">
                                <a href="{{route('product-detail',$wish->products->slug)}}"><img src="{{asset('uploads/Products/thumbnail/' .$wish->products->image)}}" style="width: 72px" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$wish->products->name}} | {{$wish->products->volume}}</a></h4>

                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$wish->products->stock > 0 ? $wish->products->stock : 'NO stock Left' }} </a></h4>

                            </td>
                            <td class="cart_total">
                                @if($wish->products->offer)
                                    <del>Rs. {{$wish->products->price}}</del>
                                @endif
                                    <h2>
                                        Rs. {{$wish->products->offer ? $wish->products->offer_price : $wish->products->price}}</h2>
                            </td>

                            <td class="cart_quantity">
                                <a href="{{route('product-detail',$wish->products->slug)}}" class="btn"><i class="fa fa-plus-circle"></i>  Product Details</a>
                            </td>

                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url('wishlist/delete',$wish->products->id)}}"><i class="fa fa-minus-circle"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="col-sm-offset-5">
                    {{$wishlist->render()}}
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->


@endsection