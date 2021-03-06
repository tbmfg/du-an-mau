@extends('sites.layouts.index')

@section('title', 'Trang chủ')

@section('content')
    <main class="form-signin container pt-5 row">
        <div class="col-9">
            <form action="{{ route('signin.submit') }}" method="post" class="col-10 m-auto">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Đăng nhập</h1>
                <div class="mb-3">
                    <a class="link-primary text-decoration-none" href="/signup">Tạo tài khoản</a>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="*******">
                </div>

                <div class="checkbox my-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Lưu đăng nhập
                    </label>
                </div>
                <div class="mb-3">
                    @if (session()->has('message'))
                        <span class="text-danger">{{ session()->get('message') }}</span>
                    @endif
                </div>
                <button class="btn btn-primary" type="submit">Đăng nhập</button>
                <a class="btn btn-secondary" href="/">Hủy</a>
            </form>
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
    </main>
@stop
@section('footer')
