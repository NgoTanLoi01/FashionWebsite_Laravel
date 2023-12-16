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
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Giỏ hàng<span>Cửa hàng</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
                    {{-- <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li> --}}
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <?php
                            $content = Cart::content();
                            ?>
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng cộng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($content as $v_content)
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="#">


                                                            <img src=" {{ config('app.base_url') . $v_content->options->feature_image_path }}"
                                                                alt="Product image">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="#">{{ $v_content->name }}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col">{{ number_format($v_content->price) }} VNĐ</td>
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <form action="{{ URL::to('/update-cart-quantity') }}" method="GET">
                                                        {{ csrf_field() }}

                                                        <input class="form-control" type="number" name="cart_quantity"
                                                            value="{{ $v_content->qty }}" required autocomplete="off"
                                                            style="padding: 2px 6px; font-size: 10px;" min="1"
                                                            max="{{ $v_content->qty }}">
                                                        <input type="hidden" value="{{ $v_content->rowId }}"
                                                            name="rowId_cart" class="form-control"
                                                            style="padding: 2px 6px; font-size: 10px;">
                                                        <br>
                                                        <input type="submit" value="Cập nhật" name="update_qty"
                                                            class="form-control" style="padding: 2px 6px; font-size: 10px;">

                                                    </form>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
                                            <td class="total-col">{{ number_format($v_content->price * $v_content->qty) }}
                                                VNĐ</td>
                                            {{-- delete cart --}}
                                            <td class="remove-col"><a
                                                    href="{{ URL::to('/delete-to-cart/' . $v_content->rowId) }}"
                                                    class="btn-remove"><i class="icon-close"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Đơn hàng</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Tổng tiền sản phẩm:</td>
                                            <td>{{ Cart::subtotal() }} VNĐ</td>
                                        </tr><!-- End .summary-subtotal -->

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="free-shipping" name="shipping"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="free-shipping">Phí vận
                                                        chuyển</label>
                                                </div><!-- End .custom-control -->
                                            </td>
                                            <td>0 VNĐ</td>
                                        </tr><!-- End .summary-shipping-row -->
                                        <tr class="summary-total">
                                            <td>Tổng tiền phải trả:</td>
                                            <td>{{ Cart::subtotal() }} VNĐ</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <?php
                                $customer_id = Session::get('customer_id');
                                if ($customer_id != null) {
                                ?>
                                <a href="{{ URL::to('/checkout') }}"
                                    class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Thanh toán</span>
                                    <span class="btn-hover-text">Kiểm tra thông tin thanh toán</span>
                                </a>
                                <?php
                                }else {
                                ?>
                                <a href="{{ URL::to('/login-checkout') }}"
                                    class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Thanh toán</span>
                                    <span class="btn-hover-text">Kiểm tra thông tin thanh toán</span>
                                </a>
                                <?php
                                } 
                                ?>

                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
