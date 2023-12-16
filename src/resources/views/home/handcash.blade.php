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
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <div>
                    <h2>Cảm ơn bạn đã đặt hàng ở cửa hàng chúng tôi. Chúng tôi sẽ liên hệ với bạn sớm nhất!</h2>
                </div>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
    </main><!-- End .main -->
@endsection
