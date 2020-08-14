@extends('layout.admin')
@section('title','Add Role')
@section('bar_form')
<a href="{{route('admin.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <form action="" method="GET" class="form-inline" role="form">
            <div class="form-group">
                <input class="form-control" name="key" value="{{request()->key}}">
            </div>
            <button type="submit" class="btn btn-primary">Find</button>
            <a href="{{route('admin.Role.create')}}" class="btn btn-success">Add Role</a>
        </form>
    </div>
    <div class="panel-body">
        <!-- Table -->

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                @foreach($data as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>
                        <form action="{{route('admin.Role.destroy',$model->id)}}" method="POST" role="form">
                            @csrf @method('DELETE')
                            <a href="{{route('admin.Role.edit',$model->id)}}" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
                <div class="text-center">
                    {{$data->links()}}
                </div>
            </tbody>
        </table>
    </div>
</div>


@stop