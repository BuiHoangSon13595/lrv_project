@extends('layout.admin')
@section('title','CLIENT')
@section('bar_form')
<a href="{{route('admin.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <form action="" method="GET" class="form-inline" role="form">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="key" placeholder="Input field">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <div class="panel-body">


    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $model)
            <tr>
                <td>{{$model->id}}</td>
                <td>{{$model->email}}</td>
                <td>
                    <form action="{{route('admin.Subcriber.destroy',$model->id)}}" method="POST" role="form">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
         </table>
    <div class="text-center">
        {{$data->links()}}
    </div>
    </table>
</div>


@stop