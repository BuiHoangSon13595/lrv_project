@extends('layout.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('public/home')}}/css/contact.css">
@stop

@section('main')

<div class="contact">
    <div class="top">
        <div class="text-center">
            <h1 class="animate__animated animate__backInLeft">Contact</h1>
            <div class="title">
                <a href="{{route('index')}}" title="">Home /</a>
                <a class="active" href="{{route('contact')}}" title=""> Contact</a>
            </div>
        </div>
    </div>
    <div class="contact-main">
        <div class="container">
            <div class="top">
                <div class="col-md-5">
                    <div class="contact-info">
                        <div class="title">
                            <h3><strong>Contact info</strong></h3>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p><strong>Address</strong></p>
                                    <p>2168 S Archer, Chicago, IL60616, US</p>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-headphones" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p><strong>Phone</strong></p>
                                    <p>+1 312-808-1999 | +1 233-688-8999</p>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p><strong>Email</strong></p>
                                    <p>Beautycosmetics@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p><strong>Opentime</strong></p>
                                    <p>Sun-Sat: 8.00.am - 9.00.pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="get-in-touch">
                        <div class="title">
                            <h3><strong>Get in touch</strong></h3>
                        </div>
                        <div class="form">
                            <form action="{{route('con')}}" method="POST" role="form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Message" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14894.507655458094!2d105.79380725!3d21.04760905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1c9e359e2a4f618c!2sB%C3%A1ch%20Khoa%20Aptech!5e0!3m2!1svi!2s!4v1593370797116!5m2!1svi!2s"
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0">
                </iframe>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

@stop

@section('js')
<script src="{{url('public/home')}}/js/contact.js"></script>
@stop