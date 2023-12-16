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
        <div class="page-header text-center"
            style="background-image: url('{{ asset('UserLTE/assets/images/page-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title">Thanh toán đơn hàng<span>Cửa hàng</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Đơn hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thanh toán đơn hàng</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->



        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="page-title">
                        <h4 style="color: #c59d33">Xem lại giỏ hàng</h4>
                    </div>
                    <div class="col-lg-12">
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
                                                    <input type="hidden" value="{{ $v_content->rowId }}" name="rowId_cart"
                                                        class="form-control" style="padding: 2px 6px; font-size: 10px;">
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
                    </div>
                    <br>
                    <div class="page-title">
                        <h6 style="color: #c59d33">Chọn hình thức thanh toán</h6>
                    </div>

                    <form action="{{ URL::to('/order-place') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="accordion-summary" id="accordion-payment">
                            <div class="card">
                                <div class="card-header" id="heading-1">
                                    <h2 class="card-title">
                                        <label><input name="payment_option" value="1" type="checkbox">
                                            Chuyển khoản ATM</label>
                                    </h2>
                                </div><!-- End .card-header -->
                            </div><!-- End .card -->
                            <br>
                            <div class="card">
                                <div class="card-header" id="heading-3">
                                    <h2 class="card-title">
                                        <label><input name="payment_option" value="2" type="checkbox">
                                            Thanh toán tiền mặt</label>
                                    </h2>
                                </div><!-- End .card-header -->
                            </div><!-- End .card -->
                            <br>
                            <div class="card">
                                <div class="card-header" id="heading-4">
                                    <h2 class="card-title">
                                        <label><input name="payment_option" value="3" type="checkbox">
                                            Thanh toán với thẻ ghi nợ</label>
                                            <br><br>
                                        <img src="{{'UserLTE/assets/images/payments-summary.png'}}" alt="payments cards">
                                    </h2>
                                </div><!-- End .card-header -->
                            </div><!-- End .card -->
                            <br>
                            <button type="submit" value="Đặt hàng" name="send_order_place"
                                class="btn btn-outline-primary-2 btn-order btn-block">
                                <span class="">Đặt hàng</span>
                            </button>
                        </div><!-- End .accordion -->
                    </form>
                </div><!-- End .summary -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
            </form>
        </div><!-- End .container -->
        </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
