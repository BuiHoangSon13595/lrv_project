@extends('layout.admin')
@section('title','USER')
@section('bar_form')
<a href="{{route('admin.index')}}" style="margin:10px" title="Về danh sách" class="btn btn-info btn-sm ml-1"><i class="fa fa-undo"></i> Back</a>
@stop()
@section('main')

<div class="panel panel-primary">
    <div class="panel-body">
        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Role Name</th>
                </tr>

            </thead>
            <tbody>
                @foreach($data as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@stop