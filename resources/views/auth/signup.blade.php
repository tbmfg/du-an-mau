@extends('sites.layouts.index')

@section('title', 'Trang chủ')

@section('content')
    <main class="form-signin container pt-5 row">
        <div class="col-9">
            <form action="{{ route('signup.submit') }}" method="post" class="col-10 m-auto">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Tạo tài khoản</h1>
                <div class="mb-3">
                    <a class="link-primary text-decoration-none" href="/signin">Đăng nhập</a>
                </div>

                <div class="mb-3">
                    <label for="nameInput" class="form-label">Họ tên</label>
                    <input name="name" class="form-control" id="nameInput" placeholder="Nguyễn Văn A">
                </div>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif

                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="emailInput" placeholder="name@example.com">
                </div>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <div class="mb-3">
                    <label for="passwordInput" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" id="passwordInput" placeholder="*******">
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <div class="mb-3">
                    <label for="confirmPasswordInput" class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirmPasswordInput"
                        placeholder="*******">
                </div>
                @if ($errors->has('confirm_password'))
                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                @endif
                <button class="btn btn-primary" type="submit">Tạo tài khoản</button>
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

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@stop
@section('footer')
