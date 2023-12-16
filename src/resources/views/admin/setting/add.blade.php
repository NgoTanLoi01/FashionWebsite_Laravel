@extends('layouts.admin')

@section('title')
    <title>Setting</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Thêm', 'key' => 'setting'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('settings.store') . '?type=' . request() ->type }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Config key</label>
                                <input name="config_key" type="text"
                                    class="form-control form-control @error('config_key') is-invalid @enderror"
                                    placeholder="Nhập config key">
                                @error('config_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @if (request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <input name="config_value" type="text"
                                        class="form-control form-control @error('config_value') is-invalid @enderror"
                                        placeholder="Nhập config value">
                                    @error('config_value')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @elseif(request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <textarea id="content" name="config_value"
                                        class="form-control form-control @error('config_value') is-invalid @enderror"></textarea>
                                    @error('config_value')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

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
