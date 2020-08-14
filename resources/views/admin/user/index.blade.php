@extends('layout.admin')
@section('title','USER')
@section('bar_form')
<a href="{{route('admin.User.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
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
            <a class="btn btn-success" href="{{route('admin.User.create')}}">Add Admin</a>
        </form>
    </div>
    <div class="panel-body">

        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                @foreach($data as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->email}}</td>
                    <td>{{$model->phone}}</td>
                    <td>
                        <form action="{{route('admin.User.destroy',$model->id)}}" method="POST" role="form">
                            @csrf @method('DELETE')
                            <a href="{{route('admin.User.show',$model->id)}}" class="btn btn-success">Roles</a>
                            <a href="{{route('admin.User.edit',$model->id)}}" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
            <div class="text-center">
                {{$data->links()}}
            </div>
        </table>
    </div>
</div>

@stop