@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>

@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Sửa', 'key' => 'danh mục'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="clo-md-16">
                    <form action="{{route('categories.update', ['id' => $category ->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input 
                            name="name" 
                            value="{{$category -> name}}"
                            type="text" 
                            class="form-control" 
                            placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn danh mục cha</option>
                                {!!$htmlOption!!}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-up"></i>Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection