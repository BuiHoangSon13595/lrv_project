@extends('layout.admin')
@section('title','EDIT PAYMENT')
@section('bar_form')
<a href="{{route('admin.Payment.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{route('admin.Payment.update',$payment->id)}}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="id" value="{{$payment->id}}">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$payment->name}}">
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
                    <input type="radio" name="status" value="1" {{$payment->status==1?'checked':''}}> Show
                    <input type="radio" name="status" value="0" {{$payment->status==0?'checked':''}}> Hidden
                </div>
            </div>
            <div class="form-group">
                <label for="">Priority</label>
                <input type="text" class="form-control" name="priority" value="{{$payment->priority}}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Edit Payment</button>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
@stop