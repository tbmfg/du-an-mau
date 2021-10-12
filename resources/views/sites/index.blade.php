@extends('sites.layouts.index')

@section('title', 'Trang chủ')

@section('css')

    <style>
        .carousel-caption.carousel-custom {
            width: 50%;
            right: 10%;
            left: unset;
        }

    </style>

@section('content')
    <div id="specialProductsSlide" class="carousel slide carousel-dark" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($specialProducts as $specialProduct)
                <button type="button" data-bs-target="#specialProductsSlide" data-bs-slide-to="{{ $loop->index }}"
                    class={{ $loop->index == 0 ? 'active' : '' }} aria-current="true"
                    aria-label="{{ $specialProduct->name }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($specialProducts as $specialProduct)
                <div class="carousel-item py-5 bg-white {{ $loop->index == 0 ? 'active' : '' }}">
                    <div class="col-lg-4 col-sm-5 col-xs-12 justify-content-end d-flex">
                        <img src="{{ $specialProduct->image }}" class="d-block" alt="{{ $specialProduct->name }}"
                            height="300">
                    </div>
                    <div class="carousel-caption carousel-custom justify-content-center d-flex">
                        <div class="col-lg-8 col-sm-12 col-xs-12">
                            <h5>{{ $specialProduct->name }}</h5>
                            <a class="btn btn-primary btn-sm mb-3" href="/products/{{ $specialProduct->id }}">
                                Mua ngay
                            </a>
                            <div class="d-none d-md-block">
                                <p>{{ $specialProduct->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#specialProductsSlide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#specialProductsSlide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <hr />
        <div class="py-2"></div>
        <div class="row">
            <div class="col-9">
                <h5 class="mb-3">Sản phẩm được quan tâm nhất</h5>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                    @foreach ($mostViewProducts as $product)
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
                    <a class="btn btn-primary btn m-auto mt-4" href="/products">
                        Tất cả sản phẩm
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
