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
                <div class="row mb-5 py-4 rounded">
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
                <div class="row mb-4">
                    <div class="py-3 rounded">
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
                <div>
                    <h5 class="mb-3">Sản phẩm cùng loại</h5>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                        @foreach ($productsCategory as $productCategory)
                            <div class="col">
                                <a href="/products/{{ $productCategory->id }}" class="text-decoration-none">
                                    <div class="card text-dark bg-light shadow-sm product-card">
                                        <div class="card-img-top pt-2">
                                            <img src="{{ $productCategory->image }}" width="100%" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $productCategory->name }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                {{ $productCategory->category->name }}</h6>
                                            <p class="card-text">{{ number_format($productCategory->price) }} đ
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <a class="btn btn-primary btn m-auto mt-4"
                        href="/categories/{{ $productsCategory[0]->category_id }}">
                        Xem thêm
                    </a>
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
