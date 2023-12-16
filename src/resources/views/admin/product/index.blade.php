@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminPublic/product/index/list.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminPublic/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Danh sách', 'key' => 'sản phẩm'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary float-right m-2"><i
                                class="fas fa-plus fa-fw fa-xs"></i>Thêm</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <th scope="col">Thứ tự</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá gốc</th>
                                <th scope="col">Giá khuyến mãi</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Kho</th>
                                <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $productItem)
                                    <tr>
                                        <th scope="row">{{ $productItem->id }}</th>
                                        <td>{{ $productItem->name }}</td>
                                        {{-- <td>{{ number_format($productItem->price) }}</td> --}}
                                        <td>{{ number_format(floatval($productItem->price)) }} VNĐ</td>
                                        <td style="color: red">{{ number_format(floatval($productItem->sale_price)) }} VNĐ</td>
                                        <td>
                                            <img class="product_image_150_100" src="{{ $productItem->feature_image_path }}"
                                                alt="">
                                        </td>
                                        <td>{{ optional($productItem->category)->name }}</td>
                                        <td>{{ $productItem->quantity }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', ['id' => $productItem->id]) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>Sửa</a>
                                            <a href="" class="btn btn-sm btn-danger action_delete"
                                                data-url="{{ route('product.delete', ['id' => $productItem->id]) }}"><i
                                                    class="fas fa-trash"></i>Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
