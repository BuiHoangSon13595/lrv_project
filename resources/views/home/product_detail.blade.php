@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/product_detail.css">
@stop

@section('main')

<div class="shop_detail">
    <div class="top">
        <div class="text-center">
            <h1 class="animate__animated animate__backInLeft">{{$product->name}}</h1>
            <div class="title">
                <a href="{{route('index')}}">Home /</a>
                <a href="{{route('shop')}}">Shop /</a>
                <a class="active">{{$product->name}}</a>
            </div>
        </div>
    </div>
    <div class="product_detail">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="product_img">
                        @if($product->image)
                        <div class="">
                            <img src="{{url('public/image')}}/{{$product->image}}" alt="" width="100%">
                        </div>
                        @endif
                    </div>
                    <div id="owl-product" class="owl-carousel owl-theme">
                        @if($product->getimage->count()>0)
                        @foreach($product->getimage as $image)
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
                            <h2>{{$product->name}}</h2>
                        </div>
                        <div class="evaluate">
                            <span>
                                <select class="star-rating">
                                    <option value="{{$product->star_rating()>0?$product->star_rating():''}}" selected>
                                        Select a
                                        rating</option>
                                    <option value="5">Excellent</option>
                                    <option value="4">Very Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Poor</option>
                                    <option value="1">Terrible</option>
                                </select>
                            </span>
                            <span class="fa fa_1">
                                <i class="fa">/</i>
                            </span>
                            <a href="" class="review">
                                <span>03 reviews</span>
                            </a>
                            <span class="fa fa_2">
                                <i class="fa">/</i>
                            </span>
                            <a href="" class="write_review">
                                <span>Write a review</span>
                            </a>
                            <div class="price">
                                <h2>{{number_format($product->sale_price?$product->sale_price:$product->price,2)}}$</h2>
                            </div>
                        </div>
                    </div>
                    <div class="conten">
                        <div class="title">
                            <div><span style="color: #989898;">Brand:</span><span> {{$product->brand->name}}</span>
                            </div>
                            <div><span style="color: #989898;">Product code:</span><span> {{$product->id}}</span></div>
                            <div><span style="color: #989898;">Reward points:</span><span> 30</span></div>
                            <div><span style="color: #989898;">Availability:</span><span> In Stock</span></div>
                        </div>
                        <form action="{{route('cart.add')}}" id="my_form" method="POST" role="form">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            @if($product->getcolor->count()>0)
                            <div class="color">
                                <p>Color:</p>
                                @foreach($product->getcolor as $color)
                                <input type="radio" id="color_{{$color->id}}" name="color_id" value="{{$color->id}}">
                                <label for="color_{{$color->id}}"><i class="ho"><span class="fa fa-check"
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
                                    <p>ADD TO CART</p>
                                    <div class="cart">
                                        <button type="submit"><i class="fa fa-cart-plus"></i></button>
                                    </div>
                                </div>
                                <div class="like">
                                    <a class="fa fa-heart" title="" href="{{route('fav.add',$product->id)}}"></a>
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
    <div class="related_product">
        <div class="head">
            <h1>Related Product</h1>
        </div>
        <div class="product_re">
            <div class="container">
                <div class="list-pro">
                    <div class="row">
                        @foreach($pro_cat->product as $pro)
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="thumbnail pro-item">
                                <div class="img">
                                    <a href="{{route('product_detail',['id'=>$pro->id,'slug'=>$pro->slug])}}">
                                        <img src="{{url('public/image')}}/{{$pro->image}}" alt="..." width="100%">
                                        <div class="icon">
                                            <ul class="social">
                                                <li><a class="fa fa-cart-plus" title="" href="#"></a>
                                                </li>
                                                <li><a class="fa fa-eye" title=""
                                                        href="{{route('view',['id'=>$pro->id,'slug'=>$pro->slug])}}"></a>
                                                </li>
                                                <li><a class="fa fa-heart" title="" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>

                                <div class="caption">
                                    <div class="row">
                                        <div class="col-xs-6"><span>{{$pro_cat->name}}</span></div>
                                        <div class="col-xs-6 text-right"><select class="star-rating">
                                                <option value="">Select a rating</option>
                                                <option value="5">Excellent</option>
                                                <option value="4">Very Good</option>
                                                <option value="3">Average</option>
                                                <option value="2">Poor</option>
                                                <option value="1">Terrible</option>
                                            </select></div>
                                    </div>
                                    <p>{{$pro->name}}</p>
                                    <strong>{{number_format($product->sale_price?$product->sale_price:$product->price,2)}}$</strong>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rating_comment">
        <div class="container">
            <!-- <div class="number_comment">

            </div> -->

            <form action="{{route('rating.add')}}" method="POST" role="form">
                @csrf
                <div class="star">
                    <h3 class="col-md-2 col-sm-3 col-xs-4">Your Rating: </h3>
                    <div class="rating col-md-10 col-sm-9 col-xs-8">
                        <select class="star-rating" name="star_number">
                            <option value="5">Excellent</option>
                            <option value="4">Very Good</option>
                            <option value="3">Average</option>
                            <option value="2">Poor</option>
                            <option value="1">Terrible</option>
                        </select>
                    </div>
                </div>
                <div class="new_comment">
                    @if(Auth::guard('client')->user())
                    <input type="hidden" name="client_id" value="{{Auth::guard('client')->user()->id}}">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="avatar col-md-2 col-sm-3 col-xs-4">
                        <img src="{{url('public/home/avatars/')}}/{{Auth::guard('client')->user()->avatar}}" alt="">
                    </div>
                    @else
                    <div class="avatar col-md-2 col-sm-3 col-xs-4">
                        <img src="{{url('public/home/avatars/default.jpg')}}">
                    </div>
                    @endif

                    <div class="form-group col-md-10 col-sm-9 col-xs-8">
                        <textarea name="comment" class="form-control" rows="4" placeholder="Your comment..."></textarea>
                    </div>
                    <div class="text-center">
                        <button class="send_comment" type="submit"><strong>Send</strong> </button>
                    </div>
                </div>

            </form>
            @foreach($comment_ratings as $comment_rating)
            <div class="old_comment">
                <div class="user">
                    <div class="row">
                        <div class="avatar col-md-2 col-sm-3 col-xs-4">
                            <img src="{{url('public/home/avatars/')}}/{{$comment_rating->getclient->avatar}}" alt="">
                        </div>
                        <div class="nick_name col-md-10 col-sm-9 col-xs-8">
                            <p><i> {{$comment_rating->getclient->name}}</i></p>
                            <p>
                                <select class="star-rating">
                                    <option value="{{$comment_rating->star_number}}" selected></option>
                                    <option value="5">Excellent</option>
                                    <option value="4">Very Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Poor</option>
                                    <option value="1">Terrible</option>
                                </select>
                                by {{date('D,d-F-Y',strtotime($comment_rating->created_at))}}
                            </p>
                            <div class="user_comment">
                                <p><strong>{{$comment_rating->comment}}</strong></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@stop

@section('js')
<script src="{{url('public/home')}}/js/product_detail.js"></script>
@stop