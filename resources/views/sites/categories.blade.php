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
        <h4>{{ $category->name }}</h4>
        <div class="py-2"></div>
        <div class="row">
            <div class="col-9">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                    @foreach ($category->products as $product)
                        <div class="col">
                            <a href="/products/{{ $product->id }}" class="text-decoration-none">
                                <div class="card text-dark bg-light shadow-sm product-card">
                                    <div class="card-img-top pt-2">
                                        <img src="{{ $product->image }}" width="100%" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                        <p class="card-text">{{ number_format($product->price) }} đ</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
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
