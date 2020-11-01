@extends('frontend.layout.app')

@section('title')
    My Sky Book
@endsection

@section('content')
    <div class="col-sm-12 col-xs-12 col-lg-12" style="padding: 0 !important; margin-top: -19px;">
        <section class="hero-area hero-slider-1">
            <div class="sb-slick-slider" data-slick-setting='{"autoplay": true, "fade": true, "autoplaySpeed": 3000, "speed": 3000, "slidesToShow": 1, "dots":true}'>
                @php($sliderCount = count($books) > 1 ? 2 : 1)
                @for ($i = 0; $i < $sliderCount ; $i++)
                    <div class="single-slide bg-shade-whisper">
                        <div class="container">
                            <div class="home-content text-center text-sm-left position-relative">
                                <div class="hero-partial-image image-right text-center">
                                    <img src="{{ asset('storage/books/'.$books[$i]->filename) }}" alt="" style="width: 300px; margin: 0 auto;">
                                </div>
                                <div class="row no-gutters ">
                                    <div class="col-xl-6 col-md-6 col-sm-7">
                                        <div class="home-content-inner content-left-side">
                                            <h1>{{ $books[$i]->name }}</h1>
                                            <h6>{{ $books[$i]->short_description }}</h6>
                                            <a href="{{ route('bookRead', $books[$i]->slug) }}" class="btn btn-outlined--primary" style="margin-bottom: 30px;">
                                                Read online
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </section>
    </div>

    <section class="mb--30">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="text">
                            <h5>Register Your Account</h5>
                            <p><a href="{{ route('login') }}">Login</a> or <a href="{{ route('login', ['sign-up' => 1]) }}">Registration</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-redo-alt"></i>
                        </div>
                        <div class="text">
                            <h5>Start your Free Trail</h5>
                            <p>Try 7 days for free</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-smile"></i>
                        </div>
                        <div class="text">
                            <h5>Enjoy</h5>
                            <p>You get access to all library</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--<section class="section-padding">--}}
        {{--<h2 class="sr-only">Home Tab Slider Section</h2>--}}
        {{--<div class="container">--}}
            {{--<div class="sb-custom-tab">--}}
                {{--<ul class="nav nav-tabs" id="myTab" role="tablist">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab"--}}
                           {{--aria-controls="shop" aria-selected="true">--}}
                            {{--Featured Products--}}
                        {{--</a>--}}
                        {{--<span class="arrow-icon"></span>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab"--}}
                           {{--aria-controls="men" aria-selected="true">--}}
                            {{--New Arrivals--}}
                        {{--</a>--}}
                        {{--<span class="arrow-icon"></span>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" id="woman-tab" data-toggle="tab" href="#woman" role="tab"--}}
                           {{--aria-controls="woman" aria-selected="false">--}}
                            {{--Most view products--}}
                        {{--</a>--}}
                        {{--<span class="arrow-icon"></span>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<div class="tab-content" id="myTabContent">--}}
                    {{--<div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">--}}
                        {{--<div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"--}}
                             {{--data-slick-setting='{--}}
                            {{--"autoplay": true,--}}
                            {{--"autoplaySpeed": 8000,--}}
                            {{--"slidesToShow": 5,--}}
                            {{--"rows":2,--}}
                            {{--"dots":true--}}
                        {{--}' data-slick-responsive='[--}}
                            {{--{"breakpoint":1200, "settings": {"slidesToShow": 3} },--}}
                            {{--{"breakpoint":768, "settings": {"slidesToShow": 2} },--}}
                            {{--{"breakpoint":480, "settings": {"slidesToShow": 1} },--}}
                            {{--{"breakpoint":320, "settings": {"slidesToShow": 1} }--}}
                        {{--]'>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--jpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Rpple iPad with Retina Display--}}
                                                {{--MD510LL/A</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-1.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-1.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Bpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Koss KPH7 Lightweight Portable--}}
                                                {{--Headphone</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-2.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-3.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Cpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Beats EP Wired On-Ear Headphone-Black</a>--}}
                                        {{--</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-3.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-2.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Dpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Beats Solo2 Solo 2 Wired On-Ear--}}
                                                {{--Headphone</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-4.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-5.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Lpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Beats Solo3 Wireless On-Ear Headphones--}}
                                                {{--2</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-5.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-4.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Fpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">3 Ways To Have (A) More Appealing--}}
                                                {{--BOOK</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-6.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-7.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Epple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">In 10 Minutes, I'll Give You The Truth--}}
                                                {{--About</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-7.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-6.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Fpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">5 Ways To Get Through To Your BOOK</a>--}}
                                        {{--</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-8.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-9.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Gpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">What Can You Do To Save Your BOOK</a>--}}
                                        {{--</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-9.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-8.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="#" class="author">--}}
                                            {{--Hpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">From Destruction By Social Media?</a>--}}
                                        {{--</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-10.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-11.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Gpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Find Out More About BOOK By Social--}}
                                                {{--Media?</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-11.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-10.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Vpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Read This Controversial BOOK By--}}
                                                {{--Social Media?</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-12.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-11.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">--}}
                        {{--<div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"--}}
                             {{--data-slick-setting='{--}}
                                        {{--"autoplay": true,--}}
                                        {{--"autoplaySpeed": 8000,--}}
                                        {{--"slidesToShow": 5,--}}
                                        {{--"rows":2,--}}
                                        {{--"dots":true--}}
                                    {{--}' data-slick-responsive='[--}}
                                        {{--{"breakpoint":1200, "settings": {"slidesToShow": 3} },--}}
                                        {{--{"breakpoint":768, "settings": {"slidesToShow": 2} },--}}
                                        {{--{"breakpoint":480, "settings": {"slidesToShow": 1} },--}}
                                        {{--{"breakpoint":320, "settings": {"slidesToShow": 1} }--}}
                                    {{--]'>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--jpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Bpple iPad with Retina Display--}}
                                                {{--MD510LL/A</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-3.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-1.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Bpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Koss KPH7 Lightweight Portable--}}
                                                {{--Headphone</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-2.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-3.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Cpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Beats EP Wired On-Ear--}}
                                                {{--Headphone-Black</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-1.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-2.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Dpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Beats Solo2 Solo 2 Wired On-Ear--}}
                                                {{--Headphone</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-4.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-5.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Lpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Beats Solo3 Wireless On-Ear--}}
                                                {{--Headphones 2</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-7.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-4.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Fpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">3 Ways To Have (A) More Appealing--}}
                                                {{--BOOK</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-6.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-7.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Epple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">In 10 Minutes, I'll Give You The--}}
                                                {{--Truth About</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-5.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-6.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Fpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">5 Ways To Get Through To Your--}}
                                                {{--BOOK</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-8.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-9.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Gpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">What Can You Do To Save Your BOOK</a>--}}
                                        {{--</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-3.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-8.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Hpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">From Destruction By Social Media?</a>--}}
                                        {{--</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-9.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-11.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Gpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Find Out More About BOOK By Social--}}
                                                {{--Media?</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-10.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-10.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Apple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Read This Controversial BOOK By--}}
                                                {{--Social Media?</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-9.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-11.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">--}}
                        {{--<div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"--}}
                             {{--data-slick-setting='{--}}
                                        {{--"autoplay": true,--}}
                                        {{--"autoplaySpeed": 8000,--}}
                                        {{--"slidesToShow": 5,--}}
                                        {{--"rows":2,--}}
                                        {{--"dots":true--}}
                                    {{--}' data-slick-responsive='[--}}
                                        {{--{"breakpoint":1200, "settings": {"slidesToShow": 3} },--}}
                                        {{--{"breakpoint":768, "settings": {"slidesToShow": 2} },--}}
                                        {{--{"breakpoint":480, "settings": {"slidesToShow": 1} },--}}
                                        {{--{"breakpoint":320, "settings": {"slidesToShow": 1} }--}}
                                    {{--]'>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--jpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Zpple fPad with Retina Display--}}
                                                {{--MD510LL/A</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-1.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-1.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Bpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Koss KPH7 Lightweight Portable--}}
                                                {{--Headphone</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-4.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-3.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Cpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Beats EP Wired On-Ear--}}
                                                {{--Headphone-Black</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-3.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-2.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Dpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Beats Solo2 Solo 2 Wired On-Ear--}}
                                                {{--Headphone</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-1.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-5.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Lpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Beats Solo3 Wireless On-Ear--}}
                                                {{--Headphones 2</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-11.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-4.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Fpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">3 Ways To Have (A) More Appealing--}}
                                                {{--BOOK</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-10.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-7.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Epple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">In 10 Minutes, I'll Give You The--}}
                                                {{--Truth About</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-9.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-6.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Fpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">5 Ways To Get Through To Your--}}
                                                {{--BOOK</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-8.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-9.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Gpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">What Can You Do To Save Your BOOK</a>--}}
                                        {{--</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-5.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-8.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Hpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">From Destruction By Social Media?</a>--}}
                                        {{--</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-3.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-11.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Gpple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Find Out More About BOOK By Social--}}
                                                {{--Media?</a></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-11.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-10.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="single-slide">--}}
                                {{--<div class="product-card">--}}
                                    {{--<div class="product-header">--}}
                                        {{--<a href="" class="author">--}}
                                            {{--Apple--}}
                                        {{--</a>--}}
                                        {{--<h3><a href="product-details.html">Read This Controversial BOOK By--}}
                                                {{--Social Media? Out More</a>--}}
                                        {{--</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-card--body">--}}
                                        {{--<div class="card-image">--}}
                                            {{--<img src="{{ asset('/frontend/image/products/product-12.jpg') }}" alt="">--}}
                                            {{--<div class="hover-contents">--}}
                                                {{--<a href="product-details.html" class="hover-image">--}}
                                                    {{--<img src="{{ asset('/frontend/image/products/product-11.jpg') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<div class="hover-btns">--}}
                                                    {{--<a href="cart.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-shopping-basket"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="wishlist.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-heart"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="compare.html" class="single-btn">--}}
                                                        {{--<i class="fas fa-random"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" data-toggle="modal" data-target="#quickModal"--}}
                                                       {{--class="single-btn">--}}
                                                        {{--<i class="fas fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="price-block">--}}
                                            {{--<span class="price">£51.20</span>--}}
                                            {{--<del class="price-old">£51.20</del>--}}
                                            {{--<span class="price-discount">20%</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    <section class="section-margin">
        <div class="container-fluid">
            <div class="promo-section-heading">
                <h2>Most popular in last 30 days</h2>
            </div>
            <div class="product-slider with-countdown  slider-border-single-row sb-slick-slider" data-slick-setting='{ "autoplay": true, "autoplaySpeed": 8000, "slidesToShow": 6, "dots":true }' data-slick-responsive='[{"breakpoint":1400, "settings": {"slidesToShow": 4} },{"breakpoint":992, "settings": {"slidesToShow": 3} },{"breakpoint":768, "settings": {"slidesToShow": 2} },{"breakpoint":575, "settings": {"slidesToShow": 2} },{"breakpoint":490, "settings": {"slidesToShow": 1} } ]'>
                @foreach ($books as $book)
                    <div class="single-slide">
                        <div class="product-card">
                            <div class="product-header">
                                <h3>
                                    <a href="{{ route('book', ['slug' => $book->slug]) }}">{{ $book->short_name }}</a>
                                </h3>
                            </div>
                            <div class="product-card--body">
                                <div class="card-image">
                                    <img src="{{ asset('storage/books/'.$book->filename) }}" style="max-height: 280px; margin: 0 auto" alt="">
                                </div>
                                <div class="price-block">
                                    <a href="{{ url('/author/'.$book->author->id) }}" class="author">
                                        By {{ $book->author->name }}
                                    </a>
                                </div>
                                <div class="count-down-block">
                                    {{ $book->short_description }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection