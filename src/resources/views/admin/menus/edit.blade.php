@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>

@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Sửa', 'key' => 'menu'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="clo-md-16">
                    <form action="{{route('menus.update', ['id' => $menuFollowIdEdit->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên menu</label>
                            <input 
                            name="name" type="text" 
                            class="form-control" 
                            value="{{$menuFollowIdEdit->name}}"
                            placeholder="Nhập tên menus">
                        </div>
                        <div class="form-group">
                            <label>Chọn menu </label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn menu cha</option>
                                {!!$optionSelect!!}

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