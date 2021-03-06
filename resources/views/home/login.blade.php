@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/login.css">
@stop

@section('main')
    <div class="top">
        <div class="text-center">
            <h1 class="animate__animated animate__backInLeft">Login</h1>
            <div class="title">
                <a href="{{route('index')}}">Home /</a>
                <a class="active" href="{{route('login')}}"> Login</a>
            </div>
        </div>
    </div>
    
   
    <div class="shell">
    
        <div class="login-form">
            <form  action="{{route('post_login')}}" method="POST">
                @csrf
                <div class="avatar">
                    <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/unknown-512.png" alt="Avatar">
                </div>
                <h2 class="text-center">Member Login</h2>   
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                @error('email')                
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{$message}}</strong> 
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <input  type="password" class="form-control" name="password" placeholder="Password">
                @error('password')                
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{$message}}</strong> 
                    </div>
                @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </div>
                <div class="clearfix">
                    <label class="pull-left checkbox-inline"> <input class="form-check-input" type="checkbox" name="remember_token"> Remember me</label>
                    <a href="{{route('reset_password')}}" target="" class="pull-right">Forgot Password?</a>
                </div>
                <p class="text-center small">Don't have an account? <a href="{{route('register')}}">Sign up here!</a></p>
            </form>
            
        </div>
    </div>
@stop

@section('js')	
    <script src="{{url('public/home')}}/js/about.js"></script>
@stop