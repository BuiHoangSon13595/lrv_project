@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/favorite.css">
@stop

@section('main')

<div class="favorite">
    <div class="top">
        <div class="text-center">
            <h1 class="animate__animated animate__backInLeft">Favorites</h1>
            <div class="title">
                <a href="{{route('index')}}">Home /</a>
                <a class="active" href="{{route('fav.index')}}"> Favorites</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row"> 
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($favs as $fav)
                        <tr>
                            <td>{{$fav->product->name}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-xs-1">
                                        <img src="{{url('public/image')}}/{{$fav->product->image}}"> 
                                    </div>
                                </div> 
                            </td>
                            <td>{{$fav->product->sale_price ? $fav->product->sale_price : $fav->product->price}} $</td>
                            <td>
                                <a href="{{route('fav.del',$fav->id)}}" class="btn btn-xs btn-danger">Delete</a>
                                <a href="{{route('product_detail',['id'=>$fav->product->id,'slug'=>$fav->product->slug])}}" class="btn btn-xs btn-primary">Go Detail</a>
                            </td>          
                        </tr>
                    @endforeach
                   
                    </tbody>
                </table>
                <a href="{{route('fav.destroy')}}" class="btn btn-danger">Delete Favorites</a>
                
            </div>
        </div>

    </div>
</div>
<div class="clearfix"></div>

@stop

@section('js')

@stop