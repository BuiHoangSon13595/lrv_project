@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/shopping_cart.css">
@stop

@section('main')

<div class="shopping_cart">
    <div class="top">
        <div class="text-center">
            <h1 class="animate__animated animate__backInLeft">Shopping cart</h1>
            <div class="title">
                <a href="{{route('index')}}">Home /</a>
                <a class="active" href="{{route('shopping_cart')}}"> Shopping cart</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th colspan="2"class="text-center">Product</th>
                            <th class="text-center">Color</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->items as $item)
                        <tr class="text-center">
                            <td class="col-xs-1"><img src="{{url('public/image')}}/{{$item['image']}}" alt=""></td>
                            <td>
                                <p>{{$item['category']}}</p>
                                <h3><strong>{{$item['name']}}</strong></h3>
                            </td>
                            <td class="common">{{$item['color']}}</td>
                            <td>
                                <form action="{{route('cart.update')}}" method="post" accept-charset="utf-8">
                                    @csrf
                                    <input type="hidden" name="id[]" value="{{$item['id']}}">
                                    <div class="buttons_added">
                                        <input class="minus is-form" type="button" value="-">
                                        <input aria-label="quantity" class="input-qty" max="100" min="1" name="quantity[]"
                                            type="number" value="{{$item['quantity']}}">
                                        <input class="plus is-form" type="button" value="+">
                                    </div>
                            </td>
                            <td id="price" class="common">{{$item['price']}}</td>
                            <td id="total" class="common">{{$item['price']*$item['quantity']}} $</td>
                            <td class="common"><a href="{{route('cart.remove',['id' => $item['id']])}}" class="btn-a"><i
                                        class="fa fa-times-circle-o" aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                        <tr class="update">
                            <td colspan="5">
                                <a href="{{route('shop')}}" class="btn-a"><i class="fa fa-undo" aria-hidden="true"></i>
                                    Continute
                                    shopping</a></td>
                            <td class="text-center">
                                <a href="{{route('cart.clear')}}" class="btn-a"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i>
                                    Clear Shopping
                                    cart</a>
                            </td>
                            <td class="text-right">
                                <button type="submit" class="btn-a"><i class="fa fa-refresh"
                                        aria-hidden="true"></i>Update</button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="bot">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="jumbotron content">
                        <div class="col-md-6">
                            <p>Enter coupon code. It will be applied at checkout</p>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('coupon')}}" method="POST">
                                @csrf
                                <div class="form-group form-inline">
                                    <input type="text" class="form-control" name="coupon" placeholder="Your code here">
                                    <button type="submit" class="btn btn-primary but">APPLY</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="jumbotron">
                        <h3>Cart Total</h3>
                        <div class="subtotal">
                            <div class="col-md-6">
                                <div class="row">
                                    Subtotal
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row text-right">
                                    $ {{$cart->total_price}}
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <div class="col-md-6">
                                <div class="row">
                                    Total
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row text-right">
                                    $ {{$cart->total_price}}
                                </div>
                            </div>
                        </div>
                        <div class="checkout">
                            <a class="btn btn-primary but" href="{{route('checkout')}}">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

@stop

@section('js')
<script src="{{url('public/home')}}/js/shopping_cart.js"></script>
@stop