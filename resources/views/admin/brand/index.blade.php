@extends('layout.admin')
@section('title','BRAND')
@section('bar_form')
<a href="{{route('admin.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-heading">
        <form action="{{route('admin.Brand.index')}}" method="GET" class="form-inline" role="form">
            <div class="form-group">
                <label class="sr-only" for="">label</label>
                <input class="form-control" name="key" value="{{request()->key}}">
            </div>

            <button type="submit" class="btn btn-primary">Find</button>

            <a class="btn btn-success" href="{{route('admin.Brand.create')}}">Add Brand</a>
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
            @if(Session::has('error'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{Session::get('error')}}</strong>
            </div>
            @endif
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>image</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                <tr>
                    <td>{{$brand->id}}</td>
                    <td>{{$brand->name}}</td>
                    <td><img src="{{url('public/image')}}/{{$brand->image}}" width="50px" height="50px" alt="">
                    </td>
                    <td>{{$brand->slug}}</td>
                    <td>

                        <form action="{{route('admin.Brand.destroy',$brand->id)}}" method="POST" role="form">
                            @csrf @method('DELETE')
                            <a href="{{route('admin.Brand.edit',$brand->id)}}" class="btn btn-primary btn-xs">Edit</a>
                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">{{$brands->links()}}</div>
    </div>
</div>


@stop