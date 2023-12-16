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
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <figure class="product-main-image">
                                        <img id="product-zoom" src="{{ $product->feature_image_path }}"
                                            data-zoom-image="{{ $product->feature_image_path }}" alt="product image">

                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure><!-- End .product-main-image -->

                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        <a class="product-gallery-item active" href="#"
                                            data-image="{{ $product->feature_image_path }}"
                                            data-zoom-image="{{ $product->feature_image_path }}">
                                            <img src="{{ $product->feature_image_path }}" alt="product side">
                                        </a>

                                        @foreach ($product->images as $item)
                                            <a class="product-gallery-item" href="#"
                                                data-image="{{ $item->image_path }}"
                                                data-zoom-image="{{ $item->image_path }}">
                                                <img src="{{ $item->image_path }}">
                                            </a>
                                        @endforeach
                                    </div><!-- End .product-image-gallery -->
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">{{ $product->name }}</h1>
                                <!-- End .product-title -->

                                <div class="product-price">
                                    <span class="old-price"> Gốc: <del>{{ number_format($product->price) }}
                                            VNĐ</del></span>
                                </div><!-- End .product-price -->
                                <div class="product-price">
                                    <span class="new-price">{{ number_format($product->sale_price) }} VNĐ</span>
                                </div><!-- End .product-price -->
                                
                                <form action="{{ URL::to('/save-cart') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="">
                                        <label for="qty">{{ $product->quantity }} sản phẩm có sẵn</label>
                                        <div class="product-details-quantity">
                                            <input type="number" name="qty" id="qty" class="form-control"
                                                value="1" min="1" max="{{ $product->quantity }}" step="1"
                                                data-decimals="0" required>
                                                <br>
                                            <input name="productid_hidden" type="hidden" class="form-control"
                                                value="{{ $product->id }}">
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->
                                    <div class="product-details-action">
                                        {{-- <a href="#" class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></a> --}}
                                        <button type="submit" class="btn-product btn-cart"><span>Thêm vào giỏ hàng</button>

                                        <div class="details-action-wrapper">
                                            <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Thêm
                                                    vào
                                                    danh sách yêu thích</span></a>
                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->
                                </form>

                                <div class="product-details-footer">
                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                                class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                                class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                                class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                                class="icon-pinterest"></i></a>
                                    </div>
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Miêu tả sản phẩm</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Miêu tả sản phẩm</h3>
                                {!! $product->content !!}
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->

                <h2 class="title text-center mb-4">Sản phẩm liên quan</h2><!-- End .title text-center -->

                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                    @foreach ($related as $keySelling => $productsSellingItem)
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="{{ route('detail', $productsSellingItem->slug) }}">
                                    <img src="{{ config('app.base_url') . $productsSellingItem->feature_image_path }}"
                                        alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Thêm vào
                                            danh sách yêu thích</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                        title="Xem nhanh"><span>Xem nhanh</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                {{-- <div class="product-cat">
                                    <a href="#">Danh mục</a>
                                </div><!-- End .product-cat --> --}}
                                <h3 class="product-title"><a
                                        href="{{ route('detail', $productsSellingItem->slug) }}">{{ $productsSellingItem->name }}</a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <span class="old-price"> Gốc: <del>{{ number_format($productsSellingItem->price) }}
                                            VNĐ</del></span>
                                    <span class="new-price">{{ number_format($productsSellingItem->sale_price) }}
                                        VNĐ</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
