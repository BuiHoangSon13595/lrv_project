@extends('layout.admin')
@section('title','Edit client')
@section('bar_form')
<a href="{{route('admin.Client.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')


<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{route('admin.Client.update', $client->id)}}" method="POST" role="form">
            @csrf @method('PUT')
            <input type="hidden" class="form-control" name="id" value="{{$client->id}}">

            <div class="">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$client->name}}">
                    @error('name')
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="{{$client->email}}">
                    @error('email')
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$client->phone}}">
                    @error('phone')
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                    @error('password')
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>

@stop