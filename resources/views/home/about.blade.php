@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/about.css">
@stop

@section('main')
<div class="about">
    <div class="top">
        <div class="text-center">
            <h1 class="animate__animated animate__backInLeft">About</h1>
            <div class="title">
                <a href="{{route('index')}}">Home /</a>
                <a class="active" href="{{route('about')}}"> About</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="header">
            <div class="col-md-6">
                <img src="{{url('public/home')}}/image/Untitled-1.png" alt="">
            </div>
            <div class="col-md-6" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <h5>about <span>eliah</span></h5>
                <legend >When You Look
                    Good, You Feel Good</legend>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, eius. Consequuntur, mollitia
                    voluptatum, illum, itaque neque vero qui nesciunt laborum exercitationem rem molestiae?
                    Assumenda expedita possimus, incidunt facere aut harum?</p>
                <a href="" class="btn btn-default">APPOINTMENT</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="middle">
            <div class="video">
                <video width="100%" controls>
                    <source src="{{url('public/home/video')}}/Zinzin.mp4" type="video/mp4">
                </video>
            </div>
            <div class="text">
                <div class="box" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    <h4>2006</h4>
                    <p>Supro was born</p>
                    <h4>2010</h4>
                    <p>We went international, lauching in London and the US.</p>
                    <h4>2015</h4>
                    <p>We hir 1 mil followes on Facebook Opened Sydney office</p>
                    <h4>2020</h4>
                    <p>1000+ employees and we launched Supro Premium</p>
                </div>
            </div>
        </div>
        <div class="feedback">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="text-center" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                    <h5>testiminial</h5>
                    <legend>What People Say?</legend>
                </div>
                <div class="col-md-6" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="thumbnail">
                                <img src="{{url('public/home')}}/image/about/03_01_About_03.png" alt="">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="thumbnail">
                                <img src="{{url('public/home')}}/image/about/03_01_About_05.png" alt="">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="thumbnail">
                                <img src="{{url('public/home')}}/image/about/03_01_About_07.png" alt="">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="thumbnail">
                                <img src="{{url('public/home')}}/image/about/03_01_About_09.png" alt="">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="thumbnail">
                                <img src="{{url('public/home')}}/image/about/03_01_About_15.png" alt="">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="thumbnail">
                                <img src="{{url('public/home')}}/image/about/03_01_About_16.png" alt="">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="thumbnail">
                                <img src="{{url('public/home')}}/image/about/03_01_About_17.png" alt="">
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="thumbnail img">
                                <img src="{{url('public/home')}}/image/about/03_01_About_18.png" alt="">
                            </div>
                        </div>

                    </div>
                </div>
                @foreach($data as $model)
                <div class="col-md-6" data-aos="flip-down" data-aos-easing="linear" data-aos-duration="1000">
                    <div class="top_feedback">
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="icon">
                                    <span><i class="fa fa-comments" aria-hidden="true"></i></span>
                                </div>
                                <div class="nick_name">
                                    <span><strong>{{$model->name}}</strong><br>{{$model->address}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 text-right">
                            <div class="row">
                                <select class="star-rating">
                                    <option value="">Select a rating</option>
                                    <option value="5">Excellent</option>
                                    <option value="4">Very Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Poor</option>
                                    <option value="1">Terrible</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <p>{{$model->message}}</p>
                </div>
                @endforeach
                {{$data->links()}}
            </div>
        </div>
        <div class="bot">
            <div class="head"></div>
            <div class="bottom"></div>
            <div class="title">
                <div class="brand">
                    <div id="owl-brand" class="owl-carousel owl-theme">
                        <div class="item">
                            <a title="" class="thumbnails">
                                <img src="{{url('public/home')}}/image/about/brand1.png" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a title="" class="thumbnails">
                                <img src="{{url('public/home')}}/image/about/brand2.png" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a title="" class="thumbnails">
                                <img src="{{url('public/home')}}/image/about/brand3.png" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a title="" class="thumbnails">
                                <img src="{{url('public/home')}}/image/about/brand4.png" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a title="" class="thumbnails">
                                <img src="{{url('public/home')}}/image/about/brand5.png" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a title="" class="thumbnails">
                                <img src="{{url('public/home')}}/image/about/brand6.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bottom_banner jumbotron">
                    <div class="container text-center note">
                        <h1>New items are released weekly!</h1>
                        <p>
                            <a href="" class="button">ALL NEW ITEMS</a>
                        </p>
                    </div>
                </div>
                <div class="method">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="row">
                            <div class="col-md-2 col-xs-3 img">
                                <div class="row">
                                    <img src="{{url('public/home')}}/image/about/L00011.png">
                                </div>
                            </div>
                            <div class="col-md-10 col-xs-9">
                                <div class="row">
                                    <p><strong>Free Shipping</strong></p>
                                    <span>Free shipping on all order</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="row">
                            <div class="col-md-2 col-xs-3 img">
                                <div class="row">
                                    <img src="{{url('public/home')}}/image/about/L00012.png">
                                </div>
                            </div>
                            <div class="col-md-10 col-xs-9">
                                <div class="row">
                                    <p><strong>Valuable Gift</strong></p>
                                    <span>Free gift after every 10 order</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="row">
                            <div class="col-md-2 col-xs-3 img">
                                <div class="row">
                                    <img src="{{url('public/home')}}/image/about/Forma-1.png">
                                </div>
                            </div>
                            <div class="col-md-10 col-xs-9">
                                <div class="row">
                                    <p><strong>All Day Support</strong></p>
                                    <span>Call us: +0123456789</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="row">
                            <div class="col-md-2 col-xs-3 img">
                                <div class="row">
                                    <img src="{{url('public/home')}}/image/about/L0001.png">
                                </div>
                            </div>
                            <div class="col-md-10 col-xs-9">
                                <div class="row">
                                    <p><strong>Seasonal Sale</strong></p>
                                    <span>Discounts uspan to 50% on all</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="clearfix"></div>

@stop

@section('js')
<script src="{{url('public/home')}}/js/about.js"></script>
@stop