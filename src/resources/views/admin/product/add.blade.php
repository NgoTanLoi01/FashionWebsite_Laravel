@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminPublic/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Thêm', 'key' => 'sản phẩm'])
        <div class="col-md-12">
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="clo-md-16">
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên sản phẩm"
                                    value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input name="price" type="text"
                                    class="form-control @error('price') is-invalid @enderror"
                                    placeholder="Nhập giá sản phẩm" value="{{ old('price') }}">
                            </div>
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Giá sản phẩm sau khi giảm</label>
                                <input name="sale_price" type="text"
                                    class="form-control @error('sale_price') is-invalid @enderror"
                                    placeholder="Nhập giá sản phẩm sau khi giảm" value="{{ old('sale_price') }}">
                            </div>
                            @error('sale_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input name="feature_image_path" type="file" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input name="image_path[]" multiple type="file" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label>Danh mục sản phẩm</label><br>
                                <select class="form-control select2_init @error('category_id') is-invalid @enderror"
                                    name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Thêm tags cho sản phẩm</label><br>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea name="contents" class="form-control @error('content') is-invalid @enderror" id="content">{{ old('contents') }}</textarea>
                            </div>
                            @error('contents')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label>Kho</label>
                                <input name="quantity" type="text" class="form-control"
                                    placeholder="Nhập số lượng sản phẩm nhập" value="{{ old('quantity') }}">
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
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('adminPublic/product/add/add.js') }}"></script>
@endsection
