@extends('layouts.master')
@section('title')
    <title>NGO TAN LOI</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>
                {{-- Đăng nhập --}}
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab"
                                    aria-controls="signin" aria-selected="true">Đăng nhập</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                                    aria-controls="register" aria-selected="false">Đăng ký</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">

                            {{-- Đăng nhập --}}
                            <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                aria-labelledby="signin-tab">

                                <form action="{{ URL::to('/login-customer') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="singin-email">Nhập địa chỉ Email của bạn *</label>
                                        <input type="email" class="form-control" name="email_account" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="singin-password">Mật khẩu *</label>
                                        <input type="password" class="form-control" name="password_account" required>
                                    </div>

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Đăng nhập</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember">
                                            <label class="custom-control-label" for="signin-remember">Nhớ mật
                                                khẩu</label>
                                        </div>

                                        <a href="#" class="forgot-link">Quên mật khẩu?</a>
                                    </div>
                                </form>
                                {{-- end form --}}
                            </div><!-- .End .tab-pane -->

                            {{-- Đăng ký --}}
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="{{ URL::to('/add-customer') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="register-email">Họ và tên</label>
                                        <input type="text" class="form-control" id="register-email" name="customer_name"
                                            required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-email">Số điện thoại *</label>
                                        <input type="text" class="form-control" id="register-email" name="customer_phone"
                                            required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-email">Địa chỉ Email *</label>
                                        <input type="email" class="form-control" id="register-email" name="customer_email"
                                            required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label>Mật khẩu *</label>
                                        <input type="password" class="form-control" name="customer_password" required>
                                    </div><!-- End .form-group -->

                                    <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                                    <br>

                                    @if ($errors->has('g-recaptcha-respones'))
                                        <span class="invalid-feedback" style="display:block">
                                            <strong>{{ $errors->first('g-recaptcha-respones') }}</strong>
                                        </span>
                                    @endif

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Đăng ký</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy"
                                                required>
                                            <label class="custom-control-label" for="register-policy">Tôi đồng ý với
                                                <a href="#">chính sách bảo mật</a> *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
@endsection
