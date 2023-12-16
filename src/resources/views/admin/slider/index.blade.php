@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminPublic/slider/index/index.css') }}">
    <script type="text/javascript" src="{{ asset('adminPublic/main.js') }}"></script>
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminPublic/main.js') }}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header', ['name' => 'Danh sách', 'key' => 'slider'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('slider.create') }}" class="btn btn-sm btn-primary float-right m-2"><i
                                class="fas fa-plus fa-fw fa-xs"></i>Thêm</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Thứ tự</th>
                                    <th scope="col">Tên slider</th>
                                    <th scope="col">Miêu tả</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{ $slider->id }}</th>
                                        <td>{{ $slider->name }}</td>
                                        <td>{!! $slider->description !!}</td>
                                        <td><img class="image_slider_150_100" src="{{ $slider->image_path }}"
                                                alt=""></td>
                                        <td>
                                            <a href="{{ route('slider.edit', ['id' => $slider->id]) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>Sửa</a>
                                            <a href=""
                                                data-url="{{ route('slider.delete', ['id' => $slider->id]) }}"
                                                class="btn btn-sm btn-danger action_delete">
                                                <i class="fas fa-trash"></i>Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $sliders->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
