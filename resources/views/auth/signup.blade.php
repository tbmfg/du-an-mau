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
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            margin-bottom: -1px;
        }

        .form-signin input[name="confirm_password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

    </style>
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="{{ route('signup.submit') }}" method="post">
            @csrf
            <h1 class="display-1 mb-5">X-Shop</h1>
            <h1 class="h3 mb-3 fw-normal">Đăng ký</h1>
            <p>{{ csrf_token() }}</p>
            <div class="mb-3">
                <a class="link-primary text-decoration-none" href="/signin">Đăng nhập</a>
            </div>

            <div class="form-floating">
                <input name="name" class="form-control" id="nameInput"
                    placeholder="">
                <label for="nameInput">Name</label>
            </div>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="emailInput"
                    placeholder="name@example.com">
                <label for="emailInput">Email</label>
            </div>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="passwordInput"
                    placeholder="*******">
                <label for="passwordInput">Mật khẩu</label>
            </div>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            <div class="form-floating">
                <input type="password" name="confirm_password" class="form-control" id="confirmPasswordInput"
                    placeholder="*******">
                <label for="confirmPasswordInput">Nhập lại mật khẩu</label>
            </div>
            @if ($errors->has('confirm_password'))
                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
            @endif
            <button class="w-100 btn btn-lg btn-primary" type="submit">Tạo tài khoản</button>
            <a class="w-100 btn btn-lg btn-default" type="button" href="/">Hủy</a>
            <p class=" mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
