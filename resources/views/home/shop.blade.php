@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/shop.css">
@stop

@section('main')

<div class="shop">
    <div class="top">
        <div class="text-center">
            <h1 class="animate__animated animate__backInLeft">Shop</h1>
            <div class="title">
                <a href="{{route('index')}}">Home /</a>
                <a class="active" href="{{route('shop')}}"> Shop</a>
            </div>
        </div>
    </div>
    <div class="product">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="category">
                        <div class="title">
                            <legend>Categories</legend>
                        </div>
                        <div class="menu">
                            <ul>
                                <li><a class="link_pro" href="{{route('shop')}}">All Product</a></li>
                                @foreach($cats as $cat)
                                <li><a class="link_pro"
                                        href="{{route('view',['id'=>$cat->id,'slug'=>$cat->slug])}}">{{$cat->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="refine_search">
                        <div class="title">
                            <legend>Refine Search</legend>
                        </div>
                        <div class="feature">
                            <form action="" method="GET" role="form">
                                <label for="">
                                    <h4 style="font-weight: bold;">Name</h4>
                                </label>
                                <div class="form-group">
                                    <input class="form-control" name="key" value="{{request()->key}}">
                                </div>
                        </div>
                        <div class="price">
                            <h4 style="font-weight: bold; margin-top:50px; margin-bottom: 25px;">Price</h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="row slider-labels">
                                <div class="col-xs-6 caption">
                                    <strong>Min:</strong> <span id="slider-range-value1"></span>
                                </div>
                                <div class="col-xs-6 text-right caption">
                                    <strong>Max:</strong> <span id="slider-range-value2"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" id="min_price" name="min_price" value="">
                                    <input type="hidden" id="max_price" name="max_price" value="">
                                </div>
                            </div>
                            <input class="filter" type="submit" data-inline="true" value="Filter">
                            </form>
                        </div>
                    </div>
                    <div class="sale">
                        <div class="img_sale">
                            <img src="{{url('public/home')}}/image/sale.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-6 col-sm-9 col-xs-12">
                                <span class="botton_show_tab_1">
                                    <i class="fa fa-th"></i>
                                </span>
                                <span class="botton_show_tab_2">
                                    <i class="fa fa-navicon"></i>
                                </span>
                                <span class="title_check_tab_1">Shop Fullwidth Left Sidebar</span>
                                <span class="title_check_tab_2">Shop List Sidebar</span>

                            </div>
                            <div class="col-md-3 col-md-offset-3 col-sm-3 col-xs-12">
                                <form action="" method="get" id="form_order" role="form">
                                    <select name="orderby" class="form-control orderby">
                                        <option value="md">Default</option>
                                        <option value="desc">Newest</option>
                                        <option value="asc">Oldest</option>
                                        <option value="price_max">Price Asc</option>
                                        <option value="price_min">Price Desc</option>
                                    </select>
                                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product_view_full">
                        <div class="list-pro">
                            <div class="row">
                                @foreach($products as $pro)
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="thumbnail pro-item">
                                        <a href="{{route('product_detail',['id'=>$pro->id,'slug'=>$pro->slug])}}">
                                            <div class="img">
                                                <img src="{{url('public/image')}}/{{$pro->image}}" alt="...">
                                                <div class="icon">
                                                    <ul class="social">
                                                        <li><a class="fa fa-cart-plus" data-toggle="modal"
                                                                href='#modal-id-{{$pro->id}}'></a>
                                                        </li>
                                                        <li>
                                                            <a class="fa fa-eye"
                                                                href="{{route('product_detail',['id'=>$pro->id,'slug'=>$pro->slug])}}">
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="fa fa-heart"
                                                                href="{{route('fav.add',$pro->id)}}"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="caption">
                                            <div class="row">
                                                <div class="col-xs-6"><span>{{$pro->category->name}}</span></div>
                                                <div class="col-xs-6 text-right"><select class="star-rating">
                                                        <option value="{{$pro->star_rating()>0?$pro->star_rating():''}}"
                                                            selected>Select a
                                                            rating</option>
                                                        <option value="5">Excellent</option>
                                                        <option value="4">Very Good</option>
                                                        <option value="3">Average</option>
                                                        <option value="2">Poor</option>
                                                        <option value="1">Terrible</option>
                                                    </select></div>
                                            </div>
                                            <p>{{$pro->name}}</p>
                                            <strong>{{number_format($pro->sale_price ? $pro->sale_price : $pro->price,2)}}$</strong>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{$products->links()}}
                    </div>
                    <div class="product_view_list">
                        <div class="row">
                            @foreach($products as $pro)
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="thumbnail pro-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="img">
                                                <img src="{{url('public/image')}}/{{$pro->image}}" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="caption">
                                                <div class="row">
                                                    <div class="col-xs-6"><span
                                                            style="color: #b7b7b7;">{{$pro->category->name}}</span>
                                                    </div>
                                                    <div class="col-xs-6 text-right"><select class="star-rating">
                                                            <option
                                                                value="{{$pro->star_rating()>0?$pro->star_rating():''}}"
                                                                selected>Select a
                                                                rating</option>
                                                            <option value="">Select a rating</option>
                                                            <option value="5">Excellent</option>
                                                            <option value="4">Very Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Poor</option>
                                                            <option value="1">Terrible</option>
                                                        </select></div>
                                                </div>
                                                <p>{{$pro->name}}</p>
                                                <strong>{{number_format($pro->sale_price?$pro->sale_price:$pro->price,2)}}$</strong>
                                            </div>
                                            <div class="content">
                                                <p>{{$pro->sumary}}</p>
                                            </div>
                                            <div class="icon">
                                                <div class="add_to_cart">
                                                    <p>ADD TO CART</p>
                                                    <div class="cart">
                                                        <a class="fa fa-cart-plus" data-toggle="modal"
                                                            href='#modal-id-{{$pro->id}}'></a>
                                                    </div>
                                                </div>
                                                <div class="eye">
                                                    <a class="fa fa-eye"
                                                        href="{{route('product_detail',['id'=>$pro->id,'slug'=>$pro->slug])}}"></a>
                                                </div>
                                                <div class="like">
                                                    <a class="fa fa-heart" href="{{route('fav.add',$pro->id)}}"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
@foreach($products as $modal)
<div class="modal fade" id="modal-id-{{$modal->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{$modal->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="product_img">
                        @if($modal->image)
                        <div class="">
                            <img src="{{url('public/image')}}/{{$modal->image}}" alt="" width="100%">
                        </div>
                        @endif
                    </div>
                    <div id="owl-modal" class="owl-carousel owl-theme owl-modal">
                        @if($modal->getimage->count()>0)
                        @foreach($modal->getimage as $image)
                        <div class="item">
                            <a title="">
                                <img src="{{url('public/image')}}/{{$image->image}}" alt="">
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="check">
                        <div class="title">
                            <p>Cheek&Coutour</p>
                            <h2>{{$modal->name}}</h2>
                        </div>
                        <div class="evaluate">
                            <span>
                                <select class="star-rating">
                                    <option value="{{$modal->star_rating()>0?$modal->star_rating():''}}" selected>Select
                                        a
                                        rating</option>
                                    <option value="5">Excellent</option>
                                    <option value="4">Very Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Poor</option>
                                    <option value="1">Terrible</option>
                                </select>
                            </span>
                            <div class="price">
                                <h2>{{number_format($modal->sale_price?$modal->sale_price:$modal->price,2)}}$</h2>
                            </div>
                        </div>
                    </div>
                    <div class="conten">
                        <form action="{{route('cart.add')}}" id="my_form" method="POST" role="form">
                            @csrf
                            <input type="hidden" name="id" value="{{$modal->id}}">
                            <div class="title">
                                <div><span style="color: #989898;">Brand:</span><span> {{$modal->brand->name}}</span>
                                </div>
                                <div><span style="color: #989898;">modal code:</span><span> {{$modal->id}}</span>
                                </div>
                                <div><span style="color: #989898;">Reward points:</span><span> 30</span></div>
                                <div><span style="color: #989898;">Availability:</span><span> In Stock</span></div>
                            </div>
                            @if($modal->getcolor->count()>0)
                            <div class="color">
                                <p>Color:</p>
                                @foreach($modal->getcolor as $color)
                                <input type="radio" id="{{$modal->id}}_color_{{$color->id}}" name="color_id"
                                    value="{{$color->id}}">
                                <label for="{{$modal->id}}_color_{{$color->id}}"><i class="ho"><span class="fa fa-check"
                                            aria-hidden="true"></span></i><i class="circle"
                                        style="background-color:{{$color->name}};"></i></label>
                                @endforeach
                            </div>
                            @endif
                            <div class="clearfix"></div>
                            <div class="buttons_added">
                                <input class="minus is-form" type="button" value="-">
                                <input aria-label="quantity" class="input-qty" max="100" min="1" name="quantity"
                                    type="number" value="1">
                                <input class="plus is-form" type="button" value="+">
                                <div class="add_to_cart">
                                    <button type="submit"><i class="fa fa-cart-plus"></i><span>ADD TO
                                            CART</span></button>
                                </div>
                                <div class="like">
                                    <a class="fa fa-heart" title="" href="{{route('fav.add',$modal->id)}}"></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="footer">
                        <div class="hearder">
                            <a href="" class="des">
                                <span>Description</span>
                            </a>
                            <span class="fa fa_3">
                                <i class="fa">/</i>
                            </span>
                            <a href="" class="des_1">
                                <span>Shipping & Returns</span>
                            </a>
                            <span class="fa fa_4">
                                <i class="fa">/</i>
                            </span>
                            <a href="" class="des_2">
                                <span>Reviews (03)</span>
                            </a>
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor incidunt non debitis sunt
                                minus totam amet, tenetur eos alias deserunt quibusdam animi aliquam est at quas natus
                                nisi hic assumenda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@stop

@section('js')
<script src="{{url('public/home')}}/js/shop.js"></script>

@stop