@extends('layout.admin')
@section('title','SHIPPING')
@section('bar_form')
<a href="{{route('admin.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-heading">
        <form action="" method="GET" class="form-inline" role="form">
            <div class="form-group">
                <input class="form-control" name="key" value="{{request()->key}}">
            </div>
            <button type="submit" class="btn btn-primary">Find</button>
            <a class="btn btn-success" href="{{route('admin.Shipping.create')}}">Add Shipping</a>
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
                @foreach($ships as $ship)
                <tr>
                    <td>{{$ship->id}}</td>
                    <td>{{$ship->name}}</td>
                    <td>{{$ship->status==1? 'Show':'Hidden'}}</td>
                    <td>{{$ship->priority}}</td>
                    <td>
                        <form action="{{route('admin.Shipping.destroy',$ship->id)}}" method="POST" role="form">
                            @csrf @method('DELETE')
                            <a href="{{route('admin.Shipping.edit',$ship->id)}}" class="btn btn-primary btn-xs">Edit</a>
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