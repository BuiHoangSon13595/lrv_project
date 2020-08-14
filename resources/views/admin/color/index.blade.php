@extends('layout.admin')
@section('title','COLOR')
@section('bar_form')
<a href="{{route('admin.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')


<div class="panel panel-default">
    <div class="panel-heading">
        <form action="{{route('admin.Color.index')}}" method="GET" class="form-inline" role="form">
            <div class="form-group">
                <label class="sr-only" for="">label</label>
                <input class="form-control" name="key" value="{{request()->key}}">
            </div>

            <button type="submit" class="btn btn-primary">Find</button>
            <a class="btn btn-success" href="{{route('admin.Color.create')}}">Add Color</a>
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
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($colors as $color)
                <tr>
                    <td>{{$color->id}}</td>
                    <td>{{$color->name}}</td>
                    <td>{{$color->status}}</td>
                    <td>{{$color->priority}}</td>
                    <td>

                        <form action="{{route('admin.Color.destroy',$color->id)}}" method="POST" role="form">
                            @csrf @method('DELETE')
                            <a href="{{route('admin.Color.edit',$color->id)}}" class="btn btn-primary btn-xs">Edit</a>
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