@extends('layout.admin')
@section('title','EDIT COMMENT')
@section('bar_form')
<a href="{{route('admin.Comment.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{route('admin.Comment.update',$comment->id)}}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="id" value="{{$comment->id}}">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">User</label>
                    <select name="user_id" class="form-control">
                        @foreach($users as $user)
                        <option value="{{$user->id}}" {{$user->id==$comment->user_id?'selected':''}}>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('user_id')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" class="form-control" cols="30" rows="10">{{$comment->content}}</textarea>
                </div>
                @error('content')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Blog</label>
                    <select name="blog_id" class="form-control">
                        <option value="">Chọn blog</option>
                        @foreach($blogs as $blog)
                        <option value="{{$blog->id}}"{{$blog->id==$comment->blog_id?'selected':''}}>{{$blog->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('blog_id')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Status</label>
                    <div class="form-control">
                        <input type="radio" name="status" value="1" checked> Show
                        <input type="radio" name="status" value="0"> Hidden
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Edit Comment</button>
                </div>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
@stop