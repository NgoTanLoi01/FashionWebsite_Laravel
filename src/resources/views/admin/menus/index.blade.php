@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'Menu', 'key' => 'List'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('menus.create')}}" class="btn btn-sm btn-primary float-right m-2"><i class="fas fa-plus fa-fw fa-xs"></i>Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Thứ tự</th>
                                <th scope="col">Tên menu</th>
                                <th scope="col">Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $menu)
                            <tr>
                                <th scope="row">{{ $menu->id }}</th>
                                <td>{{ $menu->name }}</td>
                                <td>
                                    <a href="{{ route('menus.edit', ['id'=> $menu->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>Sửa</a>
                                    <a href="{{ route('menus.delete', ['id'=> $menu->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $menus->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection