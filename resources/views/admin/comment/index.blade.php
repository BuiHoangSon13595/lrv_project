@extends('layout.admin')
@section('title','COMMENT')
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
            <a class="btn btn-success" href="{{route('admin.Comment.create')}}">Add Comment</a>
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
                    <th>User</th>
                    <th>Blog</th>
                    <th>Status</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->user_comment->name}}</td>
                    <td>{{$comment->blog_comment->name}}</td>
                    <td>{{$comment->status==1? 'Show':'Hidden'}}</td>
                    <td>{{$comment->content}}</td>
                    <td>
                        <form action="{{route('admin.Comment.destroy',$comment->id)}}" method="POST" role="form">
                            @csrf @method('DELETE')
                            <a href="{{route('admin.Comment.edit',$comment->id)}}" class="btn btn-primary btn-xs">Edit</a>
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