@extends('layout.admin')

@section('css')
<link rel="stylesheet" href="{{url('public/Admin/dist/css/admin')}}/profile.css">
@stop()

@section('bar_form')
<a href="{{route('admin.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()

@section('main')
@if(Auth::user())
<div class="container">
    <legend>ADMIN : {{Auth::user()->name}}</legend>
    <div class="container">
        <div class="col-xs-12 col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3 class="panel-title">Avatar</h3>
                </div>
                <div class="panel-body">
                    <form action="{{route('admin.avatar',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="form-group text-center">
                            @if(Auth::user()->avatar)
                            <img class="profile_avatar"
                                src="{{url('public/home/avatars/')}}/{{Auth::user()->avatar}}">
                            @else
                            <img class="profile_avatar" src="{{url('public/home/avatars/default.jpg')}}">
                            @endif
                            <label for="file-upload" class="custom-file-upload text-center">
                                <i class="fa fa-cloud-upload"></i> Your Avatar
                            </label>
                            <input id="file-upload" type="file" name="upload" />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" style="margin-bottom:10px">Save avatar</button>
                            <a href="" class="btn btn-warning">Change the password</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-md-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Profile</h3>
                </div>
                <div class="panel-body">
                    <form action="{{route('admin.profile',Auth::user()->id)}}" method="POST" role="form">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"
                                placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <div class="form-control">
                                <input type="radio" name="gender" value="1" id=""
                                    {{Auth::user()->gender==1?'checked':''}}>Male
                                <input type="radio" name="gender" value="0" id=""
                                    {{Auth::user()->gender==0?'checked':''}}>Female
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Birthday</label>
                            <input type="date" class="form-control" name="birtday"
                                value="{{date('Y-m-d',strtotime(Auth::user()->birtday))}}">
                        </div>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>
@endif

@stop