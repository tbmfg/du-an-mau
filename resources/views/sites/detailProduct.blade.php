@extends('sites.layouts.index')

@section('title', 'Trang chủ')
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/sidebar.css') }}" rel="stylesheet">
<link href="css/app.css" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@section('css')

@section('content')
    <div class="py-2"></div>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="text-decoration-none" href="/products">Tất cả sản phẩm</a>
                </li>
                <li class="breadcrumb-item active">
                    <a class="text-decoration-none" href="/categories/{{ $product->category->id }}">
                        {{ $product->category->name }}
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    <a class="text-decoration-none text-muted">
                        {{ $product->name }}
                    </a>
                </li>
            </ol>
        </nav>
        <div class="py-2"></div>
        <div class="row">
            <div class="col-9">
                <div class="row mb-5 py-4 border rounded">
                    <div class="col-4">
                        <img src="{{ $product->image }}" width="100%" />
                    </div>
                    <div class="col-7 border rounded p-3">
                        <div>
                            <h4 class="mb-4">{{ $product->name }}</h4>
                            <h5 class="text-danger">{{ number_format($product->price) }} đ</h5>
                            <p>Giảm giá: {{ $product->saleOff }}%</p>
                            <p class="text-">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="border py-3 rounded">
                        @foreach ($comments as $comment)

                            <div class="mb-1">
                                <strong>{{ $comment->customer->name }} :</strong>
                                <span>{{ $comment->content }}</span>
                                <small class="text-muted">
                                    - {{ $comment->createdAt }}
                                </small>
                            </div>
                            <hr class="my-2" />
                        @endforeach

                        <div class="row mt-3">
                            <div class="col-9">
                                <textarea class="form-control" aria-label="With textarea"
                                    placeholder="Nhập bình luận..."></textarea>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary btn-md col-12">Gửi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="list-group">
                    @foreach ($categories as $category)
                        <a href="/categories/{{ $category->id }}" class="list-group-item list-group-item-action"
                            aria-current="true">
                            {{ $category->name }}
                        </a>
                    @endforeach
                    <a href="/products" class="list-group-item list-group-item-action" aria-current="true">
                        Tất cả sản phẩm
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
