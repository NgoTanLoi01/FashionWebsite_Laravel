@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminPublic/setting/index/index.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminPublic/main.js') }}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Danh sách', 'key' => 'đơn hàng'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Thứ tự</th>
                                    <th scope="col">Tên người đặt</th>
                                    <th scope="col">Tổng giá tiền</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_order as $order)
                                    <tr>
                                        <th scope="row">{{ $order->order_id }}</th>
                                        <td>{{ $order->customer_name }}</td>
                                        <td style="color: red">{{ number_format(floatval($order->order_total)) }} VNĐ</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td>
                                            <a href="{{ URL::to('/view-order/' . $order->order_id) }}"
                                                class="btn btn-sm btn-success"><i class="far fa-eye"></i>Xem</a>
{{-- 
                                            <a href="{{ URL::to('/delete-order/' . $order->order_id) }}" class="btn btn-sm btn-danger"><i
                                                    class="fas fa-trash"></i>Xóa</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="col-md-12">
                        {{ $all_order->links('pagination::bootstrap-4') }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
