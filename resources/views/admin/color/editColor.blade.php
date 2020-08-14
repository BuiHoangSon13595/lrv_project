@extends('layout.admin')
@section('title','EDIT COLOR')
@section('bar_form')
<a href="{{route('admin.Color.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')


<div class="panel panel-default">
    <div class="panel-body">

        <form action="{{route('admin.Color.update',$color->id)}}" method="POST" role="form">
            @csrf @method('PUT')
            <input type="hidden" class="form-control" name="id" value="{{$color->id}}">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$color->name}}">
            </div>
            @error('name')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror

            <div class="form-group">
                <label for="">Status</label>
                <input type="text" class="form-control" name="status" value="{{$color->status}}">
            </div>
            @error('status')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror

            <div class="form-group">
                <label for="">Priority</label>
                <input type="text" class="form-control" name="priority" value="{{$color->priority}}">
            </div>


            <button type="submit" class="btn btn-primary">Edit Color</button>
        </form>

    </div>
</div>


@stop