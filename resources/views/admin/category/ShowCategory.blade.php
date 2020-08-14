@extends('layout.admin')
@section('title','Show Product')
@section('bar_form')
<a href="{{route('admin.Category.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-default">
    <div class="panel-heading">
        <form action="" method="GET" class="form-inline" role="form">
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
                    <th>Slug</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cats->product as $pro)
                <tr>
                    <td>{{ $pro->id}}</td>
                    <td>{{ $pro->name}}</td>
                    <td>{{ $pro->slug}}</td>
                    <td>{{ $pro->price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop