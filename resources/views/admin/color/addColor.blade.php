@extends('layout.admin')
@section('title','ADD COLOR')
@section('bar_form')
<a href="{{route('admin.Color.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{route('admin.Color.store')}}" method="POST" role="form">
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
                <input type="text" class="form-control" name="status" placeholder="Status">
            </div>
            @error('status')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror
            <div class="form-group">
                <label for="">Priority</label>
                <input type="text" class="form-control" name="priority" placeholder="Priority">
            </div>

            <button type="submit" class="btn btn-primary">Add Color</button>
        </form>

    </div>
</div>


@stop