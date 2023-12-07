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
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">sản phẩm</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                    "nav": false, 
                    "dots": false,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "992": {
                            "items":3
                        },
                        "1200": {
                            "items":4
                        }
                    }
                }'>
                    @foreach ($products as $product)
                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{ config('app.base_url') . $product->feature_image_path }}"
                                        alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                            wishlist</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                        title="Quick view"><span>quick view</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="product.html">{{ $product->name }}</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <span class="old-price"> Gốc: <del>{{ number_format($product->price) }} VNĐ
                                        </del></span>
                                    <span class="new-price">{{ number_format($product->sale_price) }} VNĐ</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    @endforeach

                </div><!-- End .owl-carousel -->
            </div><!-- End owl-carousel -->
        </div><!-- End .container -->
        <hr class="mt-0 mb-5" />
        <!-- Elements list -->
    </main><!-- End .main -->
@endsection
