<style>
    h6 {
        font-size: 12px;
    }
</style>
<div class="container featured">
    <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="products-featured-link" data-toggle="tab" href="#products-featured-tab"
                role="tab" aria-controls="products-featured-tab" aria-selected="true">Mới</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="products-top-link" data-toggle="tab" href="#products-top-tab" role="tab"
                aria-controls="products-top-tab" aria-selected="false">Nổi bậc</a>
        </li>
    </ul>

    <div class="tab-content tab-content-carousel">
        <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel"
            aria-labelledby="products-featured-link">
            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                    "nav": true, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "600": {
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
                            <a href="{{ route('detail', $product->slug) }}">
                                <img src="{{ config('app.base_url') . $product->feature_image_path }}"
                                    alt="Product image" class="product-image">
                            </a>
                            {{-- <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Thêm Danh sách yêu thích</span></a>
                        </div><!-- End .product-action --> --}}

                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{ route('detail', $product->slug) }}"></a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="#">{{ $product->name }}</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                <span class="old-price">Gốc: <del>{{ number_format($product->price) }} VNĐ </del></span>
                                <span class="new-price">{{ number_format($product->sale_price) }} VNĐ</span>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                @endforeach

            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->
        <div class="tab-pane p-0 fade" id="products-top-tab" role="tabpanel" aria-labelledby="products-top-link">
            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                    "nav": true, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "600": {
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
                {{-- ảnh nổi bậc --}}
                {{-- <div class="product product-2">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="UserLTE/assets/images/demos/demo-3/products/product-3.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        </div><!-- End .product-action -->

                        <div class="product-action product-action-dark">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Laptops</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Lenovo - 330-15IKBR 15.6"</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="out-price">$339.99</span>
                            <span class="out-text">Out of Stock</span>
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 3 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product --> --}}
                @foreach ($productsSelling as $keySelling => $productsSellingItem)
                    <div class="product product-2">
                        <figure class="product-media">
                            <a href="{{ route('detail', $productsSellingItem->slug) }}">
                                <img src="{{ config('app.base_url') . $productsSellingItem->feature_image_path }}"
                                    alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Danh sách
                                        yêu thích</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a
                                    href="{{ route('detail', $productsSellingItem->slug) }}">{{ $productsSellingItem->category->name }}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a
                                    href="{{ asset('UserLTE/product') }}">{{ $productsSellingItem->name }}</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                <span class="old-price"> Gốc: <del>{{ number_format($productsSellingItem->price) }} VNĐ
                                    </del></span>
                                <span class="new-price">{{ number_format($productsSellingItem->sale_price) }}
                                    VNĐ</span>
                            </div><!-- End .product-price -->
                            
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                @endforeach
                {{-- ảnh nổi bậc --}}
            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->
    </div>
