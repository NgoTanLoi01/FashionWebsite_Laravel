@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminPublic/slider/add/add.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Sửa', 'key' => 'slider'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="clo-md-16">
                        <form action="{{route('slider.update', ['id' => $slider->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên slider</label>
                                <input name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên slider"
                                    value="{{ $slider->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Mô tả slider</label>
                                <textarea name="description" id="content" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Nhập mô tả" value="">{{ $slider->description }}</textarea>
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input name="image_path" type="file"
                                    class="form-control @error('image_path') is-invalid @enderror">
                                <div class="col-md-4">
                                    <div class="row">
                                        <img class="image_slider_edit_200_100" src="{{ $slider->image_path }}" alt="">
                                    </div>
                                </div>
                                @error('image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-up"></i>Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('adminPublic/product/add/add.js') }}"></script>
@endsection
