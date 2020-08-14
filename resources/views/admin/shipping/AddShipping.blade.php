@extends('layout.admin')
@section('title','ADD SHIPPING')
@section('bar_form')
<a href="{{route('admin.Shipping.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{route('admin.Shipping.store')}}" method="POST">
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
                <label for="">Status</label>
                <div class="form-control">
                    <input type="radio" name="status" value="1" checked> Show
                    <input type="radio" name="status" value="0"> Hidden
                </div>
            </div>
            <div class="form-group">
                <label for="">Priority</label>
                <input type="text" class="form-control" name="priority" placeholder="Priority">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Add Shipping</button>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
@stop