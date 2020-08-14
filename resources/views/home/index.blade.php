@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/home.css">
@stop

@section('main')

<div class="home">
    <div id="owl-banner" class="owl-carousel owl-theme">
        @if($banners)
        @foreach($banners as $banner)
        <div class="item">
            <div class="deal">
                <img src="{{url('public/')}}/image/{{$banner->image}}" alt="">
                <div class="container">
                    <div class="content">
                        <h4 class="animate__animated animate__rubberBand"><strong>PRODUCT FOR</strong></h4>
                        <ul class="price animate__animated animate__backInLeft">
                            <li>
                                <h1>Spa</h1>
                            </li>
                            <li>
                                <h1 class="treat">Treatment</h1>
                            </li>
                        </ul>
                        <a href="" class="btn btn-primary"><strong>Shop Now</strong></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="container">
        <div class="view-info">
            <div class="title">
                <div class="row">
                    <div class="col-xs-6">
                        <h1><strong>New arrivals</strong> </h1>
                    </div>
                    <div class="col-xs-6">
                        <ul class="cats text-right">
                            <li><a href="{{route('shop')}}">All</a></li>
                            @foreach($cats as $cat)
                            <li>
                                <a href="{{route('view',['id'=>$cat->id,'slug'=>$cat->slug])}}">{{$cat->name}}</a>
                            </li>
                            @endforeach
                            <li><a href="{{route('shop')}}" class="btn btn-xs btn-primary" href="">VIEW ALL</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="space"></div>
        <div class="view-content">
            <div class="row">
                @if($products && $product_price)
                <div class="col-md-6" data-aos="fade-down-right" data-aos-duration="2000">
                    <div class="list-pro">
                        <div class="thumbnail pro-item">
                            <a
                                href="{{route('product_detail',['id'=>$product_price->id,'slug'=>$product_price->slug])}}">
                                <div class="img">
                                    <img src="{{url('public/image')}}/{{$product_price->image}}" alt="..." width="100%">
                                    <div class="icon">
                                        <ul class="social">
                                            <li><a class="fa fa-cart-plus" data-toggle="modal"
                                                    href='#modal-id-{{$product_price->id}}'></a></li>
                                            <li><a class="fa fa-eye"
                                                    href="{{route('product_detail',['id'=>$product_price->id,'slug'=>$product_price->slug])}}"></a>
                                            </li>
                                            <li><a class="fa fa-heart"
                                                    href="{{route('fav.add',$product_price->id)}}"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                            <div class="caption">
                                <div class="row">
                                    <div class="col-xs-6"><span>{{$product_price->category->name}}</span></div>
                                    <div class="col-xs-6 text-right">
                                        <select class="star-rating" disabled>
                                            <option
                                                value="{{$product_price->star_rating()>0?$product_price->star_rating():''}}"
                                                selected>Select a rating</option>
                                            <option value="5">Excellent</option>
                                            <option value="4">Very Good</option>
                                            <option value="3">Average</option>
                                            <option value="2">Poor</option>
                                            <option value="1">Terrible</option>
                                        </select>
                                    </div>
                                </div>
                                <p>{{$product_price->name}}</p>
                                <strong>{{number_format($product_price->sale_price ? $product_price->sale_price :$product_price->price)}}$</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-down-left" data-aos-duration="2000">
                    <div class="list-pro">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="thumbnail pro-item">
                                    <div class="img">
                                        <a
                                            href="{{route('product_detail',['id'=>$product->id,'slug'=>$product->slug])}}">
                                            <img src="{{url('public/image')}}/{{$product->image}}" alt="..."
                                                width="100%">
                                            <div class="icon">
                                                <ul class="social">
                                                    <li><a class="fa fa-cart-plus" data-toggle="modal"
                                                            href='#modal-id-{{$product->id}}'></a></li>
                                                    <li><a class="fa fa-eye"
                                                            href="{{route('product_detail',['id'=>$product->id,'slug'=>$product->slug])}}"></a>
                                                    </li>
                                                    <li><a class="fa fa-heart"
                                                            href="{{route('fav.add',$product->id)}}"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="caption">
                                        <div class="row">
                                            <div class="col-xs-6"><span>{{$product->category->name}}</span></div>
                                            <div class="col-xs-6 text-right">
                                                <select class="star-rating" disabled>
                                                    <option
                                                        value="{{$product->star_rating()>0?$product->star_rating():''}}"
                                                        selected>Select a
                                                        rating</option>
                                                    <option value="5">Excellent</option>
                                                    <option value="4">Very Good</option>
                                                    <option value="3">Average</option>
                                                    <option value="2">Poor</option>
                                                    <option value="1">Terrible</option>
                                                </select>
                                            </div>
                                        </div>
                                        <p>{{$product->name}}</p>
                                        @if($product->sale_price)
                                        <strike style="color: #7f8b92">{{number_format($product->price)}}$</strike>
                                        <strong>{{number_format($product->sale_price)}}$</strong>
                                        @else()
                                        <strong>{{number_format($product->price)}}$</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="deal">
        <img src="{{url('public/home')}}/image/images/01_04_Home_18.png" alt="..." width="100%">
        <div class="container">
            <div class="content" >
                <h4 data-aos="flip-left" data-aos-duration="2000">DEAL OF THE WEEK</h4>
                <h1 class="h1" data-aos="flip-right" data-aos-duration="2000"><strong>Lip and liner</strong></h1>
                <ul class="price">
                    <li>
                        <h3>$20.00</h3>
                    </li>
                    <li><strike>$30.00</strike></li>
                </ul>
                <ul class="clock" data-aos="zoom-in" data-aos-duration="2000">
                    <li>
                        <div class="text">
                            <span class="time" id="day">03</span>
                            <br>
                            <span>Day</span>
                        </div>

                    </li>
                    <li>
                        <div class="text">
                            <span class="time" id="hour">18</span>
                            <br>
                            <span>Hours</span>
                        </div>
                    </li>
                    <li>
                        <div class="text">
                            <span class="time" id="minute">39</span>
                            <br>
                            <span>Minutes</span>
                        </div>
                    </li>
                    <li>
                        <div class="text">
                            <span class="time" id="second">26</span>
                            <br>
                            <span>Seconds</span>
                        </div>
                    </li>
                </ul>
                <a href="" class="btn btn-primary"><strong>Shop Now</strong></a>
            </div>
        </div>
    </div>
    <div class="tip" data-aos="flip-left" data-aos-duration="3000">
        <div class="container">
            <div class="tip-title text-center">
                <h1>Tips & tricks</h1>
            </div>
            <div class="tip-content">
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-md-4">
                        <a class="link" href="{{route('single_blog',$blog->id)}}">
                            <div class="img">
                                <img src="{{url('public/image')}}/{{$blog->image}}" alt="..." width="100%">
                                <div class="feb">
                                    <div class="feb-left col-xs-2 text-center">
                                        {{date('d F',strtotime($blog->updated_at))}}
                                    </div>
                                    <div class="feb-rigth col-xs-9">
                                        <span><span class="by">by</span> Lindsay Weinberg <span class="by beauty">/
                                                Guides</span></span>
                                    </div>
                                </div>
                            </div>
                            <h4>{{$blog->name}}</h4>
                            <p>{{$blog->meta_desc}}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="shipping">
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="row">
                        <div class="col-xs-2">
                            <h3><i class="fa fa-car" aria-hidden="true"></i></h3>
                        </div>
                        <div class="col-xs-10">
                            <h4>Free Shipping</h4>
                            <p>Free shipping on all order</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="row">
                        <div class="col-xs-2">
                            <h3><i class="fa fa-gift" aria-hidden="true"></i></h3>
                        </div>
                        <div class="col-xs-10">
                            <h4>Valuable Gifts</h4>
                            <p>Free gift after 10 order</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="row">
                        <div class="col-xs-2">
                            <h3><i class="fa fa-headphones" aria-hidden="true"></i></h3>
                        </div>
                        <div class="col-xs-10">
                            <h4>All Day Support</h4>
                            <p>Call us: +01 234 567 89</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="row">
                        <div class="col-xs-2">
                            <h3><i class="fa fa-vine" aria-hidden="true"></i></h3>
                        </div>
                        <div class="col-xs-10">
                            <h4>Seasonal Sale</h4>
                            <p>Discounts up to 50& on all</p>
                        </div>
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
                                <input type="radio" id="{{$modal->id}}_color_{{$color->id}}" name="color_id" value="{{$color->id}}">
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
<script src="{{url('public/home')}}/js/home.js"></script>
@stop