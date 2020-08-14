@extends('layout.admin')
@section('link','admin.Banner.index')
@section('title','BANNER')
@section('bar_form')
<a href="{{route('admin.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-heading">
        <form action="{{route('admin.Banner.index')}}" method="GET" class="form-inline" role="form">
            <div class="form-group">
                <input class="form-control" name="key" value="{{request()->key}}">
            </div>
            <button type="submit" class="btn btn-primary">Find</button>
            <a class="btn btn-success" href="{{route('admin.Banner.create')}}">Add Banner</a>
        </form>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            @if(Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{Session::get('success')}}</strong>
            </div>
            @endif
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Link</th>
                    <th>Priority</th>
                    <th>Position</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                <tr>
                    <td>{{$banner->id}}</td>
                    <td>{{$banner->name}}</td>
                    <td>{{$banner->description}}</td>
                    <td><img src="{{url('public/image')}}/{{$banner->image}}" width="50px" height="50px" alt="">
                    </td>
                    <td>{{$banner->status}}</td>
                    <td>{{$banner->link}}</td>
                    <td>{{$banner->priority}}</td>
                    <td>{{$banner->position}}</td>
                    <td>

                        <form action="{{route('admin.Banner.destroy',$banner->id)}}" method="POST" role="form">
                            @csrf @method('DELETE')
                            <a href="{{route('admin.Banner.edit',$banner->id)}}" class="btn btn-primary btn-xs">Edit</a>
                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>







@stop