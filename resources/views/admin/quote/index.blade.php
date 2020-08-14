@extends('layout.admin')
@section('title','QUOTE')
@section('bar_form')
<a href="{{route('admin.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')
<style>
    th{
        width: 300px
    }
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <form action="{{route('admin.Quote.index')}}" method="GET" class="form-inline" role="form">
            <div class="form-group">
                <input class="form-control" name="key" value="{{request()->key}}">
            </div>
            <button type="submit" class="btn btn-primary">Find</button>
            <a class="btn btn-success" href="{{route('admin.Quote.create')}}">Add Quote</a>
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
                    <th style="width: 50px">Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cats as $cat)
                <tr>
                    <td>{{ $cat->id}}</td>
                    <td>{{ $cat->name}}</td>
                    <td>{{ $cat->address}}</td>
                    <td>
                        {{ $cat->message}}
                    </td>

                    <td>

                        <form action="{{route('admin.Quote.destroy',$cat->id)}}" method="POST" role="form">
                            @csrf @method('DELETE')
                            <a href="{{route('admin.Quote.edit',$cat->id)}}" class="btn btn-primary btn-xs">Edit</a>
                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">{{$cats->links()}}</div>
        
    </div>
</div>


@stop