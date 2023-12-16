@extends('layouts.admin')

@section('title')
<title>Admin</title>

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'Home', 'key' => 'home'] ) 
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-12">
                </div>
                <div class="col-md-12">
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection