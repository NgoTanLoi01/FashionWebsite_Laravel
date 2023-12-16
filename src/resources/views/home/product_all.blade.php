@extends('layouts.master')
@section('title')
    <title>NGO TAN LOI</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
    <div class="main">
        <div class="intro-section pt-3 pb-3 mb-2">
            <div class="container">
                <div class="row">
                    <div class="container">
                        {{-- <div class="cta cta-border cta-border-image mb-5 mb-lg-7" style="background-image: url({{('UserLTE/assets/images/demos/demo-3/bg-1.jpg)')}};">
                            <div class="cta-border-wrapper bg-white">
                                <div class="row justify-content-center">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="cta-content">
                                            <div class="cta-heading">
                                                <h3 class="cta-title text-right"><span class="text-primary">New Deals</span> <br>Start Daily at 12pm e.t.</h3><!-- End .cta-title -->
                                            </div><!-- End .cta-heading -->
                                            
                                            <div class="cta-text">
                                                <p>Get <span class="text-dark font-weight-normal">FREE SHIPPING* & 5% rewards</span> on <br>every order with Molla Theme rewards program</p>
                                            </div><!-- End .cta-text -->
                                            <a href="#" class="btn btn-primary btn-round"><span>Add to Cart for $50.00/yr</span><i class="icon-long-arrow-right"></i></a>
                                        </div><!-- End .cta-content -->
                                    </div><!-- End .col-xl-7 -->
                                </div><!-- End .row -->
                            </div><!-- End .bg-white -->
                        </div><!-- End .cta --> --}}
                    </div><!-- End .container -->
                    <div class="col-lg-12">
                        <div class="products">
                            <div class="row">
                                <br><br><br>

                                @foreach ($products as $product)
                                    <div class="col-3">
                                        <div class="product product-2">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="{{ config('app.base_url') . $product->feature_image_path }}"
                                                        alt="Product image" class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <h3 class="product-title"><a href="product.html">
                                                        {{ $product->name }}</a>
                                                </h3>
                                                <!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="old-price">Gốc: <del>{{ number_format($product->price) }}
                                                            VNĐ </del></span>
                                                    <span class="new-price">{{ number_format($product->sale_price) }}
                                                        VNĐ</span>
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 -->
                                @endforeach

                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- End .col-lg-6 -->
                </div>
            </div>
        </div>
    </div>
@endsection
