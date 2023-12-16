@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'Danh sách', 'key' => 'khách hàng'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{-- <a href="{{route('menus.create')}}" class="btn btn-sm btn-primary float-right m-2"><i class="fas fa-plus fa-fw fa-xs"></i>Thêm</a> --}}
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Thứ tự</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                                {{-- <th scope="col">Hành động</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($customers as $customer) --}}
                            <tr>
                                {{-- <th scope="row">{{ $customer->customer_id }}</th>
                                <td>{{ $customer->customer_name }}</td>
                                <td>{{ $customer->customer_email }}</td>
                                <td>{{ $customer->customer_phone }}</td> --}}

                                <td>
                                    {{-- <a href="{{ route('menus.edit', ['id'=> $menu->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>Sửa</a>
                                    <a href="{{ route('menus.delete', ['id'=> $menu->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Xóa</a> --}}
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{-- {{ $customers->links('pagination::bootstrap-4') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection