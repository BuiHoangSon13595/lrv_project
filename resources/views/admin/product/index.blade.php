@extends('layout.admin')

@section('title','PRODUCT')

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
            <a class="btn btn-success" href="{{route('admin.Product.create')}}">Add Product</a>
        </form>
    </div>
    @if(Session::has('success'))

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success!</strong>{{Session::get('success')}}
    </div>

    @endif
    <div class="panel-body">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Sale_price</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $pro)
                <tr>
                    <td>{{$pro->id}}</td>
                    <td>{{$pro->name}}</td>
                    <td class="col-md-1"><img src="{{url('public/image')}}/{{$pro->image}}" width="100%" alt=""></td>
                    <td>
                        @foreach($pro->getcolor as $col)
                        {{$col->name}}
                        @endforeach
                    </td>
                    <td>{{$pro->price}}</td>
                    <td>{{$pro->sale_price}}</td>
                    <td>{{$pro->category->name}}</td>
                    <td>{{$pro->brand->name}}</td>
                    <td>

                        <form action="{{route('admin.Product.destroy',$pro->id)}}" method="POST" role="form">
                            @csrf @method('DELETE')
                            <a href="{{route('admin.Product.edit',$pro->id)}}" class="btn btn-primary btn-xs"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"
                                    aria-hidden="true"></i></button>
                        </form>

                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <div class="text-center">{{$products->links()}}</div>
    
</div>





@stop