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
                <h1 class="page-title">Thông tin đơn hàng<span>Cửa hàng</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Đơn hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thông tin đơn hàng</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <form action="{{ URL::to('/save-checkout-customer') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 style="color: #fcb941" class="checkout-title">Chi tiết giao hàng</h2>
                                <!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Họ và tên người nhận *</label>
                                        <input name="shipping_name" type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Địa chỉ nhận hàng *</label>
                                <input name="shipping_address" type="text" class="form-control" required>

                                <label>Điện thoại người nhận *</label>
                                <input name="shipping_phone" type="tel" class="form-control" required>

                                <label>Email *</label>
                                <input name="shipping_email" type="email" class="form-control" required>

                                <label>Ghi chú đơn hàng (nếu có)</label>
                                <textarea class="form-control" cols="30" rows="4" name="shipping_notes"
                                    placeholder="Ghi chú đơn hàng của bạn, ví dụ những lưu ý khi giao hàng, thời gian giao hàng,..."></textarea>

                                <button type="submit" value="Gửi" name="send_order"
                                    class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="">Đặt hàng</span>
                                </button>
                            </div><!-- End .col-lg-9 -->
                            {{-- <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Đơn hàng của bạn</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td><a href="#">Beige knitted elastic runner shoes</a></td>
                                                <td>$84.00</td>
                                            </tr>
                                            <tr class="summary-subtotal">
                                                <td>Tổng tiền:</td>
                                                <td>$160.00</td>
                                            </tr><!-- End .summary-subtotal -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="card">
                                            <div class="card-header" id="heading-1">
                                                <h2 class="card-title">
                                                    <a role="button" data-toggle="collapse" href="#collapse-1"
                                                        aria-expanded="true" aria-controls="collapse-1">
                                                        Chuyển khoản trực tiếp
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Vui lòng chuyển đến số tài khoản: <br>
                                                    <b>1234 5678 4321</b>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                        <div class="card">
                                            <div class="card-header" id="heading-3">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                        Thanh toán khi giao hàng
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Thanh toán khi nhận hàng thành công.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-4">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-4" aria-expanded="false"
                                                        aria-controls="collapse-4">
                                                        Thanh toán với PayPal
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Vui lòng chuyển khoản đến số tài khoản:
                                                    <b>1234 5678 8765 4321</b>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-5">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-5" aria-expanded="false"
                                                        aria-controls="collapse-5">
                                                        Thẻ tín dụng
                                                        <img src="{{ asset('UserLTE/assets/images/payments-summary.png') }}"
                                                            alt="payments cards">
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-5" class="collapse" aria-labelledby="heading-5"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Vui lòng chuyển đến số tài khoản: <br>
                                                    <b>1234 5678 4321</b>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                    </div><!-- End .accordion -->
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 --> --}}
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
