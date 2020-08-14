@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/checkout.css">
@stop

@section('main')

<div class="checkout">
    <div class="top">
        <div class="text-center">
            <h1 class="animate__animated animate__backInLeft">Checkout</h1>
            <div class="title">
                <a href="{{route('index')}}">Home /</a>
                <a class="active" href="{{route('checkout')}}"> Checkout</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <form action="{{route('submit')}}" method="POST" class="form">
                @csrf
                <div class="col-md-8">
                    <div class="row">
                        <div class="contact">
                            <p>Contact information</p>
                            <input type="text" class="form-control" name="email"
                                placeholder="Email or mobile phone number"
                                value="{{Auth::guard('client')->user()->email}}">
                            @error('email')

                            <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <strong>Warning!</strong> {{$message}}
                            </div>

                            @enderror
                            <input type="checkbox"> Keep me up to date on news and exclusive offers
                        </div>
                        <div class="shipping">
                            <h3>Shipping address</h3>
                            <div class="name">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{Auth::guard('client')->user()->name}}">
                                    @error('name')

                                    <div class="alert alert-warning">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        <strong>Warning!</strong> {{$message}}
                                    </div>

                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address..">
                                @error('address')

                                <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <strong>Warning!</strong> {{$message}}
                                </div>

                                @enderror
                                <div class="form">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="row">
                                            <select name="calc_shipping_district" class="form-control" required="">
                                                <option value="">Quận / Huyện</option>
                                            </select>
                                        </div>
                                        @error('calc_shipping_district')

                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                            <strong>Warning!</strong> {{$message}}
                                        </div>

                                        @enderror
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="row">
                                            <select name="calc_shipping_provinces" class="form-control">
                                                <option value="">Tỉnh / Thành phố</option>
                                            </select>
                                        </div>
                                        @error('calc_shipping_provinces')

                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                            <strong>Warning!</strong> {{$message}}
                                        </div>

                                        @enderror
                                    </div>
                                    <input class="billing_address_1" name="" type="hidden" value="">
                                    <input class="billing_address_2" name="" type="hidden" value="">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number" class="form-control" name="phone"
                                    value="{{Auth::guard('client')->user()->phone}}">
                                @error('phone')

                                <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <strong>Warning!</strong> {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Order note</label>
                                <input type="text" class="form-control"
                                    placeholder="Note about your order, e.g, special note for delivery">
                            </div>
                            <div class="form-group">
                                <input type="checkbox"><span> Save this infomation for next time</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="jumbotron">
                        <legend>
                            <h2><strong>Your order</strong></h2>
                        </legend>
                        @if(!Auth::guard('client')->user()->coupon_code_id)
                        <div class="form-group">
                            <label for="">Coupon code</label>
                            <input type="text" class="form-control" placeholder="Your code here">
                            <a href="" class="btn apply">APPLY</a>
                        </div>
                        @endif
                        <div class="product">
                            <h3>Product</h3>
                            <div class="row">
                                @foreach($cart->items as $item)
                                <div class="col-xs-8">
                                    <strong>{{$item['quantity']}} x </strong>{{$item['name']}} 
                                    @if($item['color'])
                                        -{{$item['color']}} 
                                    @endif
                                =
                                </div>
                                <div class="col-xs-4">
                                    ${{$item['quantity']*$item['price']}}
                                </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="money">
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>Subtotal</p>
                                    <p><strong>Total: </strong></p>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <p>$ {{$cart->total_price}}</p>
                                    <p>$ {{$cart->total_price}}</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="pay">
                            <label for="">Payment</label>
                            <select name="payment_id" class="form-control" required>
                            @foreach($payment as $pay)
                                <option value="{{$pay->id}}">{{$pay->name}}</option>
                            @endforeach
                            </select>
                            
                           
                        </div>
                        <div class="pay">
                            <label for="">Shipping</label>
                            <select name="shipping_id" class="form-control" required>
                            @foreach($shipping as $ship)
                                <option value="{{$ship->id}}">{{$ship->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="button">
                            <button type="submit" class="btn btn-danger form-control">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="clearfix"></div>

@stop

@section('js')
<script src="{{url('public/home')}}/js/districts.min.js"></script>
<script src="{{url('public/home')}}/js/checkout.js"></script>
@stop