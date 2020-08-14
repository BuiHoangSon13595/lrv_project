@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/register.css">
@stop

@section('main')

<div class="login">
    <div class="top">
        <div class="text-center">
            <h1 class="animate__animated animate__backInLeft">Profile</h1>
            <div class="title">
                <a href="{{route('index')}}">Home /</a>
                <a class="active" href="{{route('profile')}}"> Profile</a>
            </div>
        </div>
    </div>

    <div class="shell">
        <div class="login-form">
            <form action="{{route('profile_edit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="avatar">
                    <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/unknown-512.png" alt="Avatar">
                </div>
                <h2 class="text-center">Member Profile</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            @if(Auth::guard('client')->user()->avatar)
                                <img class="profile_avatar" src="{{url('public/home/avatars/')}}/{{Auth::guard('client')->user()->avatar}}">
                            @else
                             <img class="profile_avatar" src="{{url('public/home/avatars/default.jpg')}}">
                            @endif
                            <label for="file-upload" class="custom-file-upload text-center">
                                <i class="fa fa-cloud-upload"></i> Your Avatar
                            </label>
                            <input id="file-upload" type="file" name="upload" />
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Name: </label>
                            <input type="text" value="{{Auth::guard('client')->user()->name}}" class="form-control"
                                name="name" placeholder="Name">
                            @error('name')
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email: </label>
                            <input type="email" value="{{Auth::guard('client')->user()->email}}" class="form-control"
                                name="email" placeholder="Email">
                            @error('email')
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password: </label>
                            <input type="password" value="" class="form-control" name="password" placeholder="Password">
                            @error('password')
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Phone: </label>
                            <input type="number" value="{{Auth::guard('client')->user()->phone}}" class="form-control"
                                name="phone" placeholder="Phone">
                            @error('phone')
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Gender: </label>

                            <select class="form-control" value="{{Auth::guard('client')->user()->gender}}" name="gender"
                                id="input" class="form-control">
                                <option name="gender" value="1">Male</option>
                                <option name="gender" value="2">Female</option>
                            </select>
                        </div>
                        <div class="form-group"> 
                            <label for="">Birthday: </label>
                            <input type="date" value="{{date('Y-m-d',strtotime(Auth::guard('client')->user()->birthday))}}" class="form-control"
                                name="birthday">
                            @error('birthday')
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <strong>{{$message}}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button style="width: 100px" type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
                </div>
            </form>

        </div>
    </div>


</div>

@stop

@section('js')
<script src="{{url('public/home')}}/js/about.js"></script>
@stop