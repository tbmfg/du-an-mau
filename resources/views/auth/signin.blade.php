<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

    </style>
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="{{ route('signin.submit') }}" method="post">
            @csrf
            <h1 class="display-1 mb-5">X-Shop</h1>
            <h1 class="h3 mb-3 fw-normal">Đăng nhập</h1>
            <div class="mb-3">
                <a class="link-primary text-decoration-none" href="/signup">Tạo tài khoản</a>
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword"
                    placeholder="*******">
                <label for="floatingPassword">Mật khẩu</label>
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
            <button class="w-100 btn btn-lg btn-primary" type="submit">Đăng nhập</button>
            <a class="w-100 btn btn-lg btn-default" href="/">Hủy</a>
            <p class=" mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>

</body>

</html>
