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
    @if(Session::has('checkout_success'))

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success!</strong>{{Session::get('checkout_success')}}
    </div>

    @endif
</div>
<div class="clearfix"></div>

@stop

@section('js')

@stop