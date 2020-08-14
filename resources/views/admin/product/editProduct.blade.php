@extends('layout.admin')

@section('title',' EDIT PRODUCT')

@section('bar_form')
<a href="{{route('admin.Product.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()

@section('main')

<div class="panel panel-default">
    <div class="panel-body">

        <form action="{{route('admin.Product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <legend>Form title</legend>
            <input type="hidden" class="form-control"name="id" value="{{$product->id}}">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>
                @error('name')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Cảnh báo!</strong>{{$message}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Sumary</label>
                    <textarea name="sumary" class="form-control" cols="30" rows="10">{{$product->sumary}}</textarea>
                </div>
                @error('sumary')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Cảnh báo!</strong>{{$message}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" class="form-control" cols="30" rows="10">{{$product->content}}</textarea>
                </div>
                @error('content')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Cảnh báo!</strong>{{$message}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Images</label>
                    <a class="btn btn-primary" data-toggle="modal" href='#modal-images'>Select</a>
                    <input type="hidden" class="form-control" id="show_imgs" name="images">
                    <div class="form-group" id="show_lists">

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach($cats as $cat)
                        <option value="{{$cat->id}}" {{$product->category_id==$cat->id?'selected':''}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Cảnh báo!</strong>{{$message}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Brand</label>
                    <select name="brand_id" class="form-control">
                        <option value="">Choose Brand</option>
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}" {{$product->brand_id==$brand->id?'selected':''}}>{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('brand_id')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Cảnh báo!</strong>{{$message}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Color</label>
                    <div>
                        @foreach($colors as $color)
                        <div class="col-xs-6 col-md-4">
                            <input type="checkbox" name="color[]"
                                value="{{$color->id}}"><span><strong>{{$color->name}}</strong></span>
                        </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="show_img" name="image" value="{{url('public/image')}}/{{$product->image}}">
                        <span class="input-group-btn">
                            <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Select</a>
                        </span>
                    </div>
                    <div class="form-group">
                        <img src="{{url('public/image')}}/{{$product->image}}" id="show" width="100%" alt="">
                    </div>
                </div>
                @error('image')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$message}}</strong>
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" value="{{$product->price}}">
                </div>
                @error('price')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Cảnh báo!</strong>{{$message}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Sale Price</label>
                    <input type="number" class="form-control" name="sale_price" value="{{$product->sale_price}}">
                </div>
                <div class="form-group">
                    <label for="">Meta title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{$product->meta_title}}">
                </div>
                @error('meta_title')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Cảnh báo!</strong>{{$message}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Meta description</label>
                    <input type="text" class="form-control" name="meta_desc" value="{{$product->meta_desc}}">
                </div>
                @error('meta_desc')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Cảnh báo!</strong>{{$message}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="">meta key</label>
                    <input type="text" class="form-control" name="meta_key" value="{{$product->meta_key}}">
                </div>
                @error('meta_key')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Cảnh báo!</strong>{{$message}}
                </div>
                @enderror
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
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
<div class="modal fade" id="modal-images">
    <div class="modal-dialog" style="width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ảnh</h4>
            </div>
            <div class="modal-body">
                <iframe
                    src="{{url('public/filemanager')}}/dialog.php?akey=JDmgWEZBvxs9fYw6jRK7qsB5QJnafF4ig39kw4ygs&field_id=show_imgs"
                    style="height:500px; width:100%" frameborder="0"></iframe>
            </div>

        </div>
    </div>
</div>

@stop

@section('js')

<script>
$('#modal-id').on('hide.bs.modal', function() {
    var show = $('#show_img').val();
    $('#show').attr('src', show);
})
</script>
<script>
$('#modal-images').on('hide.bs.modal', function() {
    var show = $('#show_imgs').val();
    var show_list = $.parseJSON(show);
    var _html = '';
    for (var i = 0; i < show_list.length; i++) {
        _html += '<div class="col-md-3 thumbnail">';
        _html += '<img src="' + show_list[i] + '" alt="">';
        _html += '</div>';
    }
    $('#show_lists').html(_html);
})
</script>
@stop