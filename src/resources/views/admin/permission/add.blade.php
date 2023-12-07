@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Permission', 'key' => 'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('permissions.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Chọn tên module</label>
                                <select class="form-control" name="module_parent">
                                    <option value="">Chọn tên module</option>
                                    @foreach (config('permissions.table_module') as $moduleItem)
                                        <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    @foreach (config('permissions.module_childrent') as $moduleItemChilrent)
                                        <div class="col-md-3">
                                            <label for="">
                                                <input type="checkbox" value="{{ $moduleItemChilrent }}" name="module_childrent[]">
                                                {{ $moduleItemChilrent }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-up"></i>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
