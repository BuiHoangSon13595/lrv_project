@extends('layout.admin')
@section('title','ADD BLOG')
@section('bar_form')
<a href="{{route('admin.Blog.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{route('admin.Blog.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                @error('name')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" id="mytextarea" class="form-control" cols="30" rows="10"></textarea>
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
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Chọn danh mục</option>
                        @foreach($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Image</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="show_img" name="image">
                        <span class="input-group-btn">
                            <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Select</a>
                        </span>
                    </div>
                    <div class="form-group">
                        <img src="" id="show" width="100%" alt="">
                    </div>
                </div>
                @error('image')
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
                <div class="form-group">
                    <label for="">Meta title</label>
                    <input type="text" class="form-control" name="meta_title" placeholder="Meta title">
                </div>
                @error('meta_title')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Meta desc</label>
                    <input type="text" class="form-control" name="meta_desc" placeholder="Meta desc">
                </div>
                @error('meta_desc')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Meta key</label>
                    <input type="text" class="form-control" name="meta_key" placeholder="Meta key">
                </div>
                @error('meta_key')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
                @enderror
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add Blog</button>
                </div>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal-id">
    <div class="modal-dialog" style="width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ảnh</h4>
            </div>
            <div class="modal-body">
                <iframe
                    src="{{url('public/filemanager')}}/dialog.php?akey=JDmgWEZBvxs9fYw6jRK7qsB5QJnafF4ig39kw4ygs&field_id=show_img"
                    style="height:500px; width:100%" frameborder="0"></iframe>
            </div>

        </div>
    </div>
</div>

@stop

@section('js')
<script src="{{url('public/tinymce')}}/config.js"></script>
<script>
$('#modal-id').on('hide.bs.modal', function() {
    var show = $('#show_img').val();
    $('#show').attr('src', show);
})
</script>

@stop