@extends('layout.admin')
@section('title','ADD QUOTE')
@section('bar_form')
<a href="{{route('admin.Quote.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{route('admin.Quote.store')}}" method="POST" role="form">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            @error('name')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Address">
            </div>
            @error('address')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror
            <div class="form-group">
                <label for="">Message</label>
                <textarea class="form-control" style="width: 100%" name="message"  rows="15"></textarea>
            </div>
            @error('message')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror

            <button type="submit" class="btn btn-primary">Add Quote</button>
        </form>

    </div>
</div>


@stop