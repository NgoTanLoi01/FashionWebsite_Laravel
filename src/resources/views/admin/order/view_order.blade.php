@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection
<style>
    h5 {
        font-weight: bold;
        padding: 12px;
        background-color: #c5ecce;
        text-align: center;
    }

    th {
        color: gray;
        background-color: #d6efdc;
    }

    td {
        background-color: #ecf3ee;
    }
</style>

@section('content')
    <div class="content-wrapper p-3">
        <div class="col-md-12">
            <a href="{{url('/print-order')}}" class="btn btn-sm btn-secondary float-right m-2"><i
                    class="fas fa-print"></i> In đơn hàng</a>
        </div>
        <br>
        <br>
        <h5><b>THÔNG TIN KHÁCH HÀNG</b></h5>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Số điện thoại</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order_by_id->first()->customer_name }}</td>
                    <td>{{ $order_by_id->first()->customer_phone }}</td>
                </tr>
            </tbody>
        </table>

        <br>

        <h5><b>THÔNG TIN VẬN CHUYỂN</b></h5>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Tên người nhận hàng</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order_by_id->first()->shipping_name }}</td>
                    <td>{{ $order_by_id->first()->shipping_address }}</td>
                    <td>{{ $order_by_id->first()->shipping_phone }}</td>
                </tr>
            </tbody>
        </table>

        <br>

        <h5><b>CHI TIẾT ĐƠN HÀNG</b></h5>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Tình trạng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order_by_id as $order)
                    <tr>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->product_sales_quantity }}</td>
                        <td>{{ number_format(floatval($order->product_price)) }}</td>
                        <td>{{ number_format(floatval($order->product_price * $order->product_sales_quantity)) }}</td>
                        <td>{{ $order->order_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
