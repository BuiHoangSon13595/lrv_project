@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/blog.css">
@stop

@section('main')

<div class="blog">
<div class="top">
        <div class="text-center">
            <h1 class="animate__animated animate__backInLeft">Blog</h1>
            <div class="title">
                <a href="{{route('index')}}" title="">Home /</a>
                <a class="active" href="" title="{{route('blog')}}"> Blog</a>
            </div>
        </div>
    </div>
    <div class="blog-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <div class="search">
                        <form action="" method="GET" class="form-inline" role="form">
                            <div class="form-group">
                                <input type="text" class="form-control" name="key" placeholder="Enter keyword">
                                <button type="submit" class="btn"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="follow">
                        <h4><strong>Follow me</strong></h4>
                        <div class="icon">
                            <ul class="social">
                                <li><a class="fa fa-twitter" title="" target="_blank" href="https://twitter.com"></a></li>
                                <li><a class="fa fa-facebook" title="" target="_blank" href="https://www.facebook.com"></a></li>
                                <li><a class="fa fa-youtube" title="" target="_blank" href="https://www.instagram.com/"></a></li>
                                <li><a class="fa fa-instagram" title="" target="_blank" href="https://www.youtube.com/"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="list-category">
                        <h4><strong>Categories</strong></h4>
                        <div class="category">
                            @foreach($cats as $cat)
                            <a href="{{route('blog_view',$cat->slug)}}" class="category-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <span class="left">{{$cat->name}}</span>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <span class="right">{{number_format(count($cat->getblog))}}</span>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="popular">
                        <h4><strong>Popular posts</strong></h4>
                        <div class="popular-posts">
                            @foreach($populars as $popular)
                            <a href="{{route('single_blog',$popular->id)}}" class="post">
                                <div class="row">
                                    <div class="col-md-4 image">
                                        <img src="{{url('public/image')}}/{{$popular->image}}" width="100%"
                                            alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <h5><strong>{{$popular->meta_title}}</strong></h5>
                                        <p>{{date('D,d/F/Y',strtotime($popular->created_at))}}</p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="letter">
                        <h4><strong>Newsletter</strong></h4>
                        <div class="content">
                            <p>Subscribe to our newsletter and get our newest updates right on your</p>
                            <form action="{{route('sub')}}" method="POST" role="form">
                            @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control email" name="email" placeholder="Your email">
                                    <input type="checkbox" class="checkbox"> <span>I agree to the terms &
                                        conditions</span>
                                </div>
                                <button type="submit" class="btn btn-primary"><strong>Subscribe</strong></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-8">
                    <div class="tip">
                        <div class="tip-content">
                            <a class="link animate__animated animate__backInDown" href="">
                                <div class="img">
                                    <img src="{{url('public/home')}}/image/images/01_04_Home_02.png" alt="..."
                                        width="100%">
                                    <div class="feb">
                                        <div class="feb-left col-md-1 col-xs-2 text-center">
                                            <span>05</span>
                                            <br>
                                            <span>Feb</span>
                                        </div>
                                        <div class="feb-rigth col-md-11 col-xs-10">
                                            <span><span class="by">by</span> Lindsay Weinberg <span class="by beauty">/
                                                    Guides</span></span>
                                        </div>
                                    </div>
                                </div>
                                <h4>Beauty Tips For Women Who Don't Like Wearing</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua</p>
                            </a>
                            <div class="row">
                                @foreach($blogs as $blog)
                                <div class="col-md-6" data-aos="fade-down-left">
                                    <a class="link" href="{{route('single_blog',$blog->id)}}">
                                        <div class="img">
                                            <img src="{{url('public/image')}}/{{$blog->image}}" alt="..."
                                                width="100%">
                                            <div class="feb">
                                                <div class="feb-left col-xs-2 text-center">
                                                {{date('d F',strtotime($blog->created_at))}}
                                                </div>
                                                <div class="feb-rigth col-xs-10">
                                                    <span><span class="by">by</span> Lindsay Weinberg <span
                                                            class="by beauty">/
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
                    <div class="pagination">
                        {{$blogs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

@stop

@section('js')
<script src="{{url('public/home')}}/js/blog.js"></script>
@stop