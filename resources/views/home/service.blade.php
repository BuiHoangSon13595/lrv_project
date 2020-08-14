@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/service.css">
@stop

@section('main')

<div class="service">
    <div class="top">
        <div class="text-center">
            <h1 class="animate__animated animate__backInLeft">Service</h1>
            <div class="title">
                <a href="{{route('index')}}" title="">Home /</a>
                <a class="active" href="{{route('service')}}" title=""> Service</a>
            </div>
        </div>
    </div>
    <div class="service-list" >
        <div class="service-item" data-aos="fade-right" data-aos-duration="1000">
            <div class="container">
                <div class="col-md-6 img1">
                    <img src="{{url('public/home')}}/image/images/01_04_Home_30_04.png" alt="">
                </div>
                <div class="col-md-6 content">
                    <h3>
                        <strong>01.</strong>
                        <img src="{{url('public/home')}}/image/Waves-1.png" alt="">
                    </h3>
                    <h1><strong>Body treatment</strong></h1>
                    <br>
                    <p class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa modi, similique rem
                        possimus odio excepturi a quis quaerat iste doloribus quos inventore animi, minima quas,
                        expedita vitae ipsum necessitatibus autem.</p>
                    <br>
                    <p><i class="fa fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.</p>
                    <br>
                    <a href="" class="btn">READ MORE</a>
                </div>
            </div>
        </div>
        <div class="service-item" data-aos="fade-left" data-aos-duration="1000">
            <div class="container">
                <div class="col-md-6 text-right content1">
                    <h3>
                        <img src="{{url('public/home')}}/image/Waves-1.png" alt="">
                        <strong>02.</strong>
                    </h3>
                    <h1><strong>Professinal makeup</strong></h1>
                    <p class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa modi, similique rem
                        possimus odio excepturi a quis quaerat iste doloribus quos inventore animi, minima quas,
                        expedita vitae ipsum necessitatibus autem.</p>
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <i class="fa fa-check"
                            aria-hidden="true"></i> </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <i class="fa fa-check"
                            aria-hidden="true"></i> </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <i class="fa fa-check"
                            aria-hidden="true"></i> </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <i class="fa fa-check"
                            aria-hidden="true"></i> </p>
                    <br>
                    <a href="" class="btn">READ MORE</a>
                </div>
                <div class="col-md-6 img2">
                    <img src="{{url('public/home')}}/image/images/01_04_Home_30_01.png" alt="">
                </div>
            </div>
        </div>
        <div class="service-item" data-aos="flip-left" data-aos-duration="1000">
            <div class="container">
                <div class="col-md-6 img1">
                    <img src="{{url('public/home')}}/image/images/01_04_Home_30_06.png" alt="">
                </div>
                <div class="col-md-6 content">
                    <h3>
                        <strong>03.</strong>
                        <img src="{{url('public/home')}}/image/Waves-1.png" alt="">
                    </h3>
                    <h1><strong>Maincure & pedicure</strong></h1>
                    <p class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa modi, similique rem
                        possimus odio excepturi a quis quaerat iste doloribus quos inventore animi, minima quas,
                        expedita vitae ipsum necessitatibus autem.</p>
                    <br>
                    <p><i class="fa fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.</p>
                    <p><i class="fa fa-check" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.</p>
                    <br>
                    <a href="" class="btn">READ MORE</a>
                </div>
            </div>
        </div>
        <div class="service-item" data-aos="flip-right" data-aos-duration="1000">
            <div class="container">
                <div class="col-md-6 text-right content1">
                    <h3>
                        <img src="{{url('public/home')}}/image/Waves-1.png" alt="">
                        <strong>04.</strong>
                    </h3>
                    <h1><strong>Hair cut & Coloring</strong></h1>
                    <p class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa modi, similique rem
                        possimus odio excepturi a quis quaerat iste doloribus quos inventore animi, minima quas,
                        expedita vitae ipsum necessitatibus autem.</p>
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <i class="fa fa-check"
                            aria-hidden="true"></i> </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <i class="fa fa-check"
                            aria-hidden="true"></i> </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <i class="fa fa-check"
                            aria-hidden="true"></i> </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <i class="fa fa-check"
                            aria-hidden="true"></i> </p>
                    <br>
                    <a href="" class="btn">READ MORE</a>
                </div>
                <div class="col-md-6 img2">
                    <img src="{{url('public/home')}}/image/images/01_04_Home_30_05.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="book-service">
        <div class="form">
            <form action="" method="POST" role="form">
                <h3 class="text-center"><strong>Book Service</strong></h3 class="text-center">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your phone">
                </div>
                <div class="form-group">
                    <select name="" id="input" class="form-control" required="required">
                        <option value="">Choose a services</option>
                        <option value="">Choose a services</option>
                        <option value="">Choose a services</option>
                        <option value="">Choose a services</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="" id="input" class="form-control" required="required">
                        <option value="">Choose a date</option>
                        <option value="">Choose a date</option>
                        <option value="">Choose a date</option>
                        <option value="">Choose a date</option>
                    </select>
                </div>
                <div class="fix text-center">
                    <button type="submit" class="btn btn-primary">Apoitment</button>
                </div>

            </form>
        </div>
    </div>
</div>
<div class="clearfix"></div>

@stop

@section('js')

@stop