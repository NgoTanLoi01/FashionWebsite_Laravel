@extends('layouts.admin')

@section('title')
    <title>Setting</title>
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

        @include('partials.content-header', ['name' => 'Danh sách', 'key' => 'setting'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group dropleft float-right">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="">
                                <b class="">Thêm setting</b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('settings.create') . '?type=Text' }}">Văn bản</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('settings.create') . '?type=Textarea' }}">Vùng văn bản</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Thứ tự</th>
                                    <th scope="col">Config key</th>
                                    <th scope="col">Config value</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                    <tr>
                                        <th scope="row">{{ $setting->id }}</th>
                                        <td>{{ $setting->config_key }}</td>
                                        <td>{{ $setting->config_value }}</td>
                                        <td>
                                            <a href="{{ route('settings.edit', ['id' => $setting->id]) . '?type=' . $setting->type }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>Sửa</a>
                                            <a href="" class="btn btn-sm btn-danger action_delete"
                                                data-url="{{ route('settings.delete', ['id' => $setting->id]) }}"><i
                                                    class="fas fa-trash"></i>Xóa</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $settings->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
