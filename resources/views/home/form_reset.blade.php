@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/login.css">
@stop

@section('main')
<div class="top">
    <div class="text-center">
        <h1 class="animate__animated animate__backInLeft">Form Reset</h1>
        <div class="title">
            <a href="{{route('index')}}">Home /</a>
            <a class="active" href="{{route('reset_password')}}"> Form Reset</a>
        </div>
    </div>
</div>

<div class="shell">
    <div class="login-form">
        <form action="" method="POST">
            @csrf
            <div class="avatar">
                <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/unknown-512.png" alt="Avatar">
            </div>
            <h2 class="text-center">Member Reset Password</h2>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
                @if(Session::has('error'))

                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{Session::get('error')}}</strong>
                    </div>

                @endif
                @if(Session::has('sucess'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{Session::get('sucess')}}</strong>
                    </div>
                @endif
                @error('email')
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{$message}}</strong>
                    </div>
                @enderror
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
            </div>

            <p class="text-center small">Don't have an account? <a href="{{route('register')}}">Sign up here!</a></p>
        </form>

    </div>
</div>
@stop

@section('js')
<script src="{{url('public/home')}}/js/about.js"></script>
@stop