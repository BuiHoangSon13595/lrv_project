@extends('layout.admin')
@section('title','CONTACT')
@section('bar_form')
<a href="{{route('admin.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-heading">
        <form action="{{route('admin.Category.index')}}" method="GET" class="form-inline" role="form">
            <div class="form-group">
                <input class="form-control" name="key" value="{{request()->key}}">
            </div>
            <button type="submit" class="btn btn-primary">Find</button>
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
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cats as $cat)
                <tr>
                    <td>{{ $cat->id}}</td>
                    <td>{{ $cat->name}}</td>
                    <td>{{ $cat->email}}</td>
                    <td>{{ $cat->message}}</td>

                    <td>
                        <form action="{{route('admin.Contact.destroy',$cat->id)}}" method="POST" role="form">
                            @csrf @method('DELETE')
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