@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/single_post.css">
@stop

@section('main')

<div class="single-blog">
    <div class="banner">
        <img src="{{url('public/image')}}/{{$blog->image}}">
    </div>
    <div class="single-blog-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 left">
                    <div class="search">
                        <form action="" method="POST" class="form-inline" role="form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter keyword">
                                <button type="submit" class="btn"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="follow">
                        <h4><strong>Follow me</strong></h4>
                        <div class="icon">
                            <ul class="social">
                                <li><a class="fa fa-twitter" title="" target="_blank" href="#"></a></li>
                                <li><a class="fa fa-facebook" title="" target="_blank" href="#"></a></li>
                                <li><a class="fa fa-youtube" title="" target="_blank" href="#"></a></li>
                                <li><a class="fa fa-instagram" title="" target="_blank" href="#"></a></li>
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
                                        <img src="{{url('public/image')}}/{{$popular->image}}" width="100%" alt="">
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
                            <form action="" method="POST" role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control email" id="" placeholder="Your email">
                                    <input type="checkbox" class="checkbox"> <span>I agree to the terms &
                                        conditions</span>
                                </div>
                                <button type="submit" class="btn btn-primary"><strong>Subscribe</strong></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 base">
                    <div class="tip">
                        <div class="tip-content">
                            <div class="link" href="">
                                <div class="feb">
                                    <div class="feb-left col-md-1 col-xs-2 text-center">
                                        {{date('d F',strtotime($blog->updated_at))}}
                                    </div>
                                    <div class="feb-rigth col-md-11 col-xs-10">
                                        <span><span class="by">by</span> Lindsay Weinberg <span class="by beauty">/
                                                <a href="">{{$blog->category->name}}</a></span></span>
                                        <h2>{{$blog->name}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tip-text">
                            {!!$blog->content!!}
                        </div>
                        <div class="tags">
                            <!-- <div class="col-md-7">
                                    <span><strong>Tag: </strong></span>
                                    <a class="tag" href="">Baking soda</a>
                                    <a class="tag" href="">Tricks</a>
                                    <a class="tag" href="">Cleaning</a>
                                </div> -->
                            <div class="">
                                <span><strong>Share: </strong></span>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-instagram"></i></a>
                                <a href=""><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                        <div class="link-post">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href=""><i class="fa fa-angle-left" aria-hidden="true"></i> PRE POSTS</a>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <a href="">NEXT POSTS <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="rating_comment">
                            <div class="text-center">
                                <h3 class="text-uppercase">leave a comment</h3>
                            </div>

                            <div class="number_comment">

                            </div>
                            <form action="{{route('comment.add')}}" method="POST" role="form">
                                @csrf
                                <div class="new_comment">
                                    <div class="row">
                                        @if(Auth::guard('client')->user())

                                        <input type="hidden" name="client_id"
                                            value="{{Auth::guard('client')->user()->id}}">
                                        <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                        <div class="avatar col-md-2 col-sm-3 col-xs-4">
                                            <img src="{{url('public/home/avatars/')}}/{{Auth::guard('client')->user()->avatar}}"
                                                alt="">
                                        </div>
                                        @else
                                        <div class="avatar col-md-2 col-sm-3 col-xs-4">
                                            <img src="{{url('public/home/avatars/default.jpg')}}">
                                        </div>
                                        @endif
                                        <div class="form-group col-md-10 col-sm-9 col-xs-8">
                                            <textarea name="content" class="form-control" rows="3"
                                                placeholder="Your comment..."></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button class="send_comment" type="submit"><strong>Send</strong> </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            @foreach($comments as $comment)
                            <div class="old_comment">
                                <div class="user">
                                    <div class="row">
                                        <div class="avatar col-md-2 col-sm-3 col-xs-4">
                                            <img src="{{url('public/home/avatars/')}}/{{$comment->user_comment->avatar}}"
                                                alt="">
                                        </div>
                                        <div class="nick_name col-md-10 col-sm-9 col-xs-8">
                                            <p><i>{{$comment->user_comment->name}}</i> </p>
                                            <p>
                                                by {{date('D,d-F-Y',strtotime($comment->created_at))}}
                                            </p>
                                            <div class="user_comment">
                                                <p><strong>{{$comment->content}}</strong> </p>
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
            </div>
        </div>
    </div>
</div>
<div class="space"></div>

@stop

@section('js')

@stop