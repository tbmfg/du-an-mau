@extends('admin.layouts.index')

@section('title', 'Trang chủ')
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/sidebar.css') }}" rel="stylesheet">
<link href="css/app.css" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@section('css')

    <style>
        .product-card {
            cursor: pointer;
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        }

        .product-card:hover {
            transform: scale(1.1);
            z-index: 2;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .3), 0 4px 8px rgba(0, 0, 0, .06);
        }

    </style>

@section('content')
    <br />
    <div class="container">
        <h3>Sản phẩm</h3>
        <div class="row">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card text-dark bg-light shadow-sm product-card">
                            <div class="card-img-top pt-2">
                                <img src="{{ $product->image }}" width="100%" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-md btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-md btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-dark bg-white shadow-sm product-card">
                            <div class="card-img-top pt-2">
                                <img src="{{ $product->image }}" width="100%" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-md btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-md btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-dark bg-white shadow-sm product-card">
                            <div class="card-img-top pt-2">
                                <img src="{{ $product->image }}" width="100%" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-md btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-md btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-dark bg-white shadow-sm product-card">
                            <div class="card-img-top pt-2">
                                <img src="{{ $product->image }}" width="100%" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-md btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-md btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-dark bg-white shadow-sm product-card">
                            <div class="card-img-top pt-2">
                                <img src="{{ $product->image }}" width="100%" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-md btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-md btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card text-dark bg-white shadow-sm product-card">
                            <div class="card-img-top pt-2">
                                <img src="{{ $product->image }}" width="100%" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-md btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-md btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-dark bg-white shadow-sm product-card">
                            <div class="card-img-top pt-2">
                                <img src="{{ $product->image }}" width="100%" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-md btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-md btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-dark bg-white shadow-sm product-card">
                            <div class="card-img-top pt-2">
                                <img src="{{ $product->image }}" width="100%" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-md btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-md btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-dark bg-white shadow-sm product-card">
                            <div class="card-img-top pt-2">
                                <img src="{{ $product->image }}" width="100%" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-md btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-md btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-dark bg-white shadow-sm product-card">
                            <div class="card-img-top pt-2">
                                <img src="{{ $product->image }}" width="100%" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-md btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-md btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
