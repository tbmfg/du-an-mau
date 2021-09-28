<!-- Stored in resources/views/layouts/master.blade.php -->

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>X-Shop - @yield('title')</title>

    <meta name="theme-color" content="#7952b3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <style>

    </style>
</head>

<body>
    <main style="">
        @if (Session::has('success'))
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div class="toast show align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ Session::get('success') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        @section('navbar')
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="/">X-Shop</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="/">Trang chủ</a>
                                <a class="nav-link" href="#">Giới thiệu</a>
                                <a class="nav-link" href="#">Liên hệ</a>
                                <a class="nav-link" href="#">Góp ý</a>
                            </div>
                        </div>
                        <form class="d-flex my-2">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <div class="ms-3">
                            <div class="btn-group">
                                @if (!$user)
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" aria-expanded="false">
                                        Tài khoản
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end mt-2 rounded shadow-lg px-4 pt-4"
                                        style="width:400px;">
                                        <form action="{{ route('signin.submit') }}" method="post">
                                            @csrf
                                            <div class="form-floating">
                                                <input type="email" name="email" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com">
                                                <label for="floatingInput">Email</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="password" name="password" class="form-control"
                                                    id="floatingPassword" placeholder="*******">
                                                <label for="floatingPassword">Mật khẩu</label>
                                            </div>
                                            <div class="checkbox my-3">
                                                <label>
                                                    <input type="checkbox" value="remember-me"> Lưu đăng
                                                    nhập
                                                </label>
                                            </div>
                                            <div class="mb-3">
                                                @if (session()->has('message'))
                                                    <span class="text-danger">{{ session()->get('message') }}</span>
                                                @endif
                                            </div>
                                            <button class="w-100 btn btn-lg btn-primary" type="submit">Đăng
                                                nhập</button>
                                        </form>
                                    </div>
                                @else
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" aria-expanded="false">
                                        {{ $user->name }}
                                    </button>
                                    <ul class="dropdown-menu mt-2 rounded shadow-lg dropdown-menu-end"
                                        aria-labelledby="dropdownMenuLink">
                                        @if ($user->role == 'admin')
                                            <li><a class="dropdown-item" href="/admin/products">Quản trị website</a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="#">Cập nhật tài khoản</a></li>
                                        <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                                        <li><a class="dropdown-item" href="/signout">Đăng xuất</a></li>
                                    </ul>
                                @endif


                            </div>

                        </div>
                    </div>
                </div>
            </nav>

            <div class="main-layout">
                @yield('content')
            </div>
        </main>

        @yield('footer')
        {{-- Footer --}}
        <div class="container">
            <footer class="row row-cols-5 py-5 my-5 border-top">
                <div class="col">
                    <p class="text-muted">X-Shop © 2021</p>
                </div>

                <div class="col"></div>
                <div class="col"></div>

                <div class="col">
                    <h5>Website</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="/" class="nav-link p-0 text-muted">Trang chủ</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Giới thiệu</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Liên hệ</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Góp ý</a></li>
                    </ul>
                </div>

                <div class="col">
                    <h5>Danh mục sản phẩm</h5>
                    <ul class="nav flex-column">
                        @foreach ($categories as $category)
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-muted">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </footer>
        </div>
    @show

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <script>
        function toggleForm(selector) {
            Array.from($('.accordion-collapse')).forEach(element => {
                element.classList.remove('show');
            });
            $(selector).addClass('show');
        }

        $(function() {
            setTimeout(function() {
                $('.toast').toast('hide');
            }, 5000);
        });
    </script>

</body>

</html>
