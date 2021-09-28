@extends('admin.layouts.index')

@section('title', 'Trang chủ')
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/sidebar.css') }}" rel="stylesheet">
<link href="css/app.css" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

@section('css')

    <style>
        .table-content {
            max-height: calc(100vh - 117px);
            overflow: auto;
        }

    </style>

@section('content')
    <div class="container-fluid">
        <div class="py-3 d-flex">
            <button class="btn btn-primary btn-sm me-2">
                Chọn tất cả
            </button>
            <button class="btn btn-danger btn-sm position-relative">Xóa
                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary border border-dark">
                    13
                </span>
            </button>
        </div>
        <div class="table-content">
            <table class="table table-bordered table-sm table-hover align-middle header-fixed">
                <thead>
                    <tr>
                        <th scope="col">
                        </th>
                        <th scope="col">ID <i class="fa fa-fw fa-sort"></i></th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Tên sản phẩm <i class="fa fa-fw fa-sort"></i></th>
                        <th scope="col">Giá <i class="fa fa-fw fa-sort"></i></th>
                        <th scope="col">Giảm giá (%) <i class="fa fa-fw fa-sort"></i></th>
                        <th scope="col">Đặc biệt <i class="fa fa-fw fa-sort"></i></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" value="">
                            </th>
                            <th scope="row">{{ $product->id }}</th>
                            <td><img src="{{ $product->image }}" width="120px" /></td>
                            <td scope="row text-center">{{ $product->category->name }}</td>
                            <td scope="row">{{ $product->name }}</td>
                            <td scope="row">{{ number_format($product->price) }}</td>
                            <td scope="row">{{ $product->saleOff }}</td>
                            <td scope="row align-middle">
                                @if ($product->isSpecial)
                                    <span class="badge bg-success">Có</span>
                                @endif
                            <td scope="row">
                                <a class="btn btn-sm btn-secondary" title="Chi tiết">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-info-lg" viewBox="0 0 16 16">
                                        <path
                                            d="m10.277 5.433-4.031.505-.145.67.794.145c.516.123.619.309.505.824L6.101 13.68c-.34 1.578.186 2.32 1.423 2.32.959 0 2.072-.443 2.577-1.052l.155-.732c-.35.31-.866.434-1.206.434-.485 0-.66-.34-.536-.939l1.763-8.278zm.122-3.673a1.76 1.76 0 1 1-3.52 0 1.76 1.76 0 0 1 3.52 0z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@stop
