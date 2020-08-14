<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eliah</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('public/home')}}/css/master/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('public/home')}}/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{url('public/home')}}/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{url('public/home')}}/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{url('public/home')}}/star-rating.js-master/dist/star-rating.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/master/master.css">
    @yield('css')
</head>

<body>
    <header>
        <div class="login-user">
            <div class="container">
                <div class="col-sm-6">
                    <div class="symbol text-left">
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-instagram"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                    </div>

                </div>
                <div class="col-sm-6"></div>
                @if(Auth::guard('client')->user())
                <div class="login text-right">
                    @if(Auth::guard('client')->user()->avatar)
                    <img src="{{url('public/home/avatars/')}}/{{Auth::guard('client')->user()->avatar}}"
                        style="width:25px;height:25px; border-radius:50%">
                    @else
                    <img src="{{url('public/home/avatars/default.jpg')}}"
                        style="width:25px;height:25px; border-radius:50%">
                    @endif
                    <a href="{{route('profile')}}"><i>{{Auth::guard('client')->user()->name}}</i></a>
                    <a href="">|</a>
                    <a href="{{route('logout')}}">Logout</a>
                </div>
                @else
                <div class="login text-right">
                    <a href="{{route('login')}}">Login</a>
                    <a href="">|</a>
                    <a href="{{route('register')}}">Register</a>
                </div>
                @endif
            </div>

        </div>
        </div>

        <div class="menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="{{route('index')}}" title=""><img
                                    src="{{url('public/home')}}/image/images/logo2.png" width="100%" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ul class="hide nav navbar-nav">
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('service')}}">Services</a></li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('shop')}}">Shop</a></li>
                            <li><a href="{{route('blog')}}">Blog</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                        <ul class="show nav navbar-nav menu-left">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"
                                        aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li><a href="{{route('service')}}">Services</a></li>
                                    <li><a href="{{route('about')}}">About</a></li>
                                    <li><a href="{{route('shop')}}">Shop</a></li>
                                    <li><a href="{{route('blog')}}">Block</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav navbar-nav navbar-right icon text-right">
                            <li>
                                <a href=""><i class="fa fa-search" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{route('fav.index')}}">
                                    <i class="fa fa-heart-o" aria-hidden="true">
                                        <!-- <div class="number_cart">
                                            <span>1</span>
                                        </div> -->
                                    </i>
                                    @if($like)
                                    <span style="color: #f1625e">({{$like}})</span>
                                    @endif
                                </a>
                            </li>
                            <li>
                                <a href="{{route('shopping_cart')}}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    @if($cart->total_quantity > 0)
                                    <span style="color:#f1625e">({{$cart->total_quantity}} -
                                        {{number_format($cart->total_price,2)}}$)</span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                </div>

    </header>

    @yield('main')

    <footer>
        <div id="owl-footer" class="owl-carousel owl-theme">

            <!-- @foreach($banners_bot as $banner_bot) -->
            <div class="item">
                <a title="">
                    <img src="{{url('public/')}}/image/{{$banner_bot->image}}" alt="">
                </a>
            </div>
            <!-- @endforeach -->
        </div>
        <div class="container">
            <div class="up">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <img src="{{url('public/home')}}/image/images/logo.png" width="100%" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-contact">
                            <div class="row">
                                <div class="col-xs-4 text-right">
                                    <h5 class="text">Subcribe Newletter</h5>
                                </div>
                                <div class="col-xs-8">
                                    <form action="{{route('sub')}}" method="POST" role="form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xs-7 data text-right">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Your Email" width="100%">
                                                </div>
                                            </div>
                                            <div class="col-xs-5 data text-left">
                                                <button type="submit" class="btn btn-light"><i class="fa fa-paper-plane"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="icon">
                            <ul class="social text-right">
                                <li><a class="fa fa-twitter" title="" target="_blank" href="https://twitter.com"></a>
                                </li>
                                <li><a class="fa fa-facebook" title="" target="_blank"
                                        href="https://www.facebook.com"></a></li>
                                <li><a class="fa fa-instagram" title="" target="_blank"
                                        href="https://www.instagram.com/"></a></li>
                                <li><a class="fa fa-youtube" title="" target="_blank"
                                        href="https://www.youtube.com/"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mid">
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <h3>Contact info</h3>
                        <p>Address: <a class="link-contact" href="" title="">2168 S Acher Ave, Chicago.IL 60616, US</a>
                        </p>
                        <p>Phone: <a class="link-contact" href="" title="">+1 312-808-1999</a></p>
                        <p>Email: <a class="link-contact" href="" title="">Beatycosmetic@gmail.com</a></p>
                        <p>Opentime:<a class="link-contact" href=""> 8.00am - 11.00.pm</a></p>
                    </div>
                    <div class="col-md-2 col-xs-6">
                        <h3>Accout</h3>
                        <p><a href="" title="">My account</a></p>
                        <p><a href="" title="">Wistlist</a></p>
                        <p><a href="" title="">Cart</a></p>
                        <p><a href="" title="">Shop</a></p>
                        <p><a href="" title="">Checkout</a></p>
                    </div>
                    <div class="fix"></div>
                    <div class="col-md-2 col-xs-6">
                        <h3>Information</h3>
                        <p><a href="" title="">About us</a></p>
                        <p><a href="" title="">Careers</a></p>
                        <p><a href="" title="">Delivery Information</a></p>
                        <p><a href="" title="">Privacy Policy</a></p>
                        <p><a href="" title="">Term & Condition</a></p>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <h3>Payment methods</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="brands">
                            <a href="" title=""><img src="{{url('public/home')}}/image/brand1.png" alt=""
                                    width="100%"></a>
                            <a href="" title=""><img src="{{url('public/home')}}/image/brand2.png" alt=""
                                    width="100%"></a>
                            <a href="" title=""><img src="{{url('public/home')}}/image/brand3.png" alt=""
                                    width="100%"></a>
                            <a href="" title=""><img src="{{url('public/home')}}/image/brand4.png" alt=""
                                    width="100%"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="down">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <h5><i class="fa fa-copyright" aria-hidden="true"></i> Copyright 2020 Beauty</h5>
                    </div>
                    <div class="col-xs-6 text-right privacy">
                        <a href="" title="">Privacy Policy |</a>
                        <a href="" title="">Terms & Conditions |</a>
                        <a href="" title=""> Site Map</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{url('public/home')}}/js/master/jquery-3.5.1.min.js"></script>
    <script src="{{url('public/home')}}/js/master/bootstrap.min.js"></script>
    <script src="{{url('public/home')}}/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{url('public/home')}}/star-rating.js-master/dist/star-rating.min.js"></script>
    <script src="{{url('public/home')}}/js/master/master.js"></script>
    @yield('js')
</body>

</html>