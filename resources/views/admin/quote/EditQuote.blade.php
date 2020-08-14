@extends('layout.admin')
@section('title','EDIT QUOTE')
@section('bar_form')
<a href="{{route('admin.Quote.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')


<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{route('admin.Quote.update',$cat->id)}}" method="POST" role="form">
            @csrf @method('PUT')
            <input type="hidden" class="form-control" name="id" value="{{$cat->id}}">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$cat->name}}">
            </div>
            @error('name')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="address" value="{{$cat->address}}">
            </div>
            @error('address')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror
            <div class="form-group">
                <label for="">Message</label>
                <textarea class="form-control" style="width: 100%" name="message" value="{{$cat->message}}" rows="15">{{$cat->message}}</textarea>
            </div>
            @error('message')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror


            <button type="submit" class="btn btn-primary">Edit Quote</button>
        </form>
    </div>
</div>



@stop