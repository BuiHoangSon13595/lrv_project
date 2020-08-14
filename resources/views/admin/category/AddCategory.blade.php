@extends('layout.admin')
@section('title','ADD CATEGORY')
@section('bar_form')
<a href="{{route('admin.Category.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{route('admin.Category.store')}}" method="POST" role="form">
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

            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>

    </div>
</div>


@stop