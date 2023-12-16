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
        @include('partials.content-header', ['name' => 'Sửa', 'key' => 'sản phẩm'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="clo-md-16">
                        <form action="{{ route('product.update', ['id' =>$product->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm"
                                    value="{{ $product->name }}">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input name="price" type="text" class="form-control" placeholder="Nhập giá sản phẩm"
                                    value="{{ $product->price }}">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm sau khi giảm</label>
                                <input name="sale_price" type="text" class="form-control" placeholder="Nhập giá sản phẩm sau khi giảm"
                                    value="{{ $product->sale_price }}">
                            </div>

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input name="feature_image_path" type="file" class="form-control-file">
                                <div class="col-md-3 feature_image_container">
                                    <div class="row">
                                        <img class="feature_image" src="{{ $product->feature_image_path }}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input name="image_path[]" multiple type="file" class="form-control-file">
                                <div class="col-md-12 containe_image_detail" >
                                    <div class="row">
                                        @foreach ($product->productImage as $productImageItem)
                                            <div class="col-md-3">
                                                <img class="image_detail" src="{{ $productImageItem->image_path }}"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Danh mục sản phẩm</label><br>
                                <select class="form-control select2_init" name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Thêm tags cho sản phẩm</label><br>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                    @foreach ($product->tags as $tagItem)
                                    <option value="{{$tagItem -> name}}" selected>{{$tagItem -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea name="contents" class="form-control" id="content">{{ $product->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Kho</label>
                                <input name="quantity" type="text" class="form-control" placeholder="Nhập số lượng sản phẩm nhập"
                                    value="{{ $product->quantity }}">
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
