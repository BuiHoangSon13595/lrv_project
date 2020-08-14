@extends('layout.admin')
@section('title','EDIT BANNER')
@section('bar_form')
<a href="{{route('admin.Banner.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{route('admin.Banner.update',$banner->id)}}" method="POST" role="form"
            enctype="multipart/form-data">
            @csrf @method('PUT')
            <input type="hidden" class="form-control" name="id" value="{{$banner->id}}">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$banner->name}}">
            </div>
            @error('name')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description" value="{{$banner->description}}">
            </div>
            @error('description')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror
            <div class="form-group">
                <label for="">Image</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="show_img" value="{{url('public/image')}}/{{$banner->image}}" name="image">
                        <span class="input-group-btn">
                            <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Select</a>
                        </span>
                    </div>
                    <div class="form-group">
                        <img src="{{url('public/image')}}/{{$banner->image}}" id="show" width="100%" alt="">
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
                <input type="text" class="form-control" name="Status" value="{{$banner->status}}">
            </div>
            @error('Status')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror
            <div class="form-group">
                <label for="">Link</label>
                <input type="text" class="form-control" name="Link" value="{{$banner->link}}">
            </div>
            @error('Link')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror
            <div class="form-group">
                <label for="">Priority</label>
                <input type="text" class="form-control" name="Priority" value="{{$banner->priority}}">
            </div>
            @error('Priority')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror
            <div class="form-group">
                <label for="">Position</label>
                <!-- <input type="text" class="form-control" name="Position" value="{{$banner->position}}"> -->
                <select name="position" id="input" class="form-control">
                    <option value="{{$banner->position}}">Select option</option>
                    <option value="top">Top</option>
                    <option value="mid">Mid</option>
                    <option value="bot">Bot</option>
                </select>
            </div>
            @error('Position')
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{$message}}</strong>
            </div>
            @enderror

            <button type="submit" class="btn btn-primary">Edit Banner</button>
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