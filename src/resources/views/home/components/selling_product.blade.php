
<div class="container top">
    <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">Sản phẩm thịnh hành</h2><!-- End .title -->
        </div><!-- End .heading-left -->
    </div><!-- End .heading -->

    <div class="tab-content tab-content-carousel just-action-icons-sm">
        <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                    "nav": true, 
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
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":5
                        }
                    }
                }'>

                @foreach ($productsSelling as $keySelling => $productsSellingItem)
                    <div class="product product-2">
                        <figure class="product-media">
                            <a style="width: 300px;" href="{{ route('detail', $productsSellingItem->slug) }}">
                                <img src="{{ config('app.base_url') .  $productsSellingItem->feature_image_path}}"
                                    alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Danh sách yêu thích</span></a>
                            </div><!-- End .product-action -->

                            <div class="product-action product-action-dark">
                                <a href="#" class="btn-product btn-cart" title="Thêm vào giỏ hàng"><span>Thêm vào giỏ
                                        hàng</span></a>
                                <a href="popup/quickView.html" class="btn-product btn-quickview"
                                    title="Xem nhanh"><span>Xem nhanh</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{ route('detail', $productsSellingItem->slug) }}"></a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a
                                    href="{{ asset('UserLTE/product') }}">{{ ($productsSellingItem->name) }}</a></h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                                <span class="old-price"> Gốc: <del>{{ number_format($productsSellingItem->price) }} VNĐ</del></span>
                                <span class="new-price">{{ number_format($productsSellingItem->sale_price) }} VNĐ</span>
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                @endforeach
            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->
    </div><!-- End .tab-content -->
</div>
