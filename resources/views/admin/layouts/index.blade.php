<!-- Stored in resources/views/layouts/master.blade.php -->

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>X-Shop - @yield('title')</title>
    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/"> --}}
    <meta name="theme-color" content="#7952b3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <style>
        main {
            padding-top: 54px;
            display: flex;
        }

        .main-layout {
            max-height: calc(100vh - 54px);
            overflow: auto;
            padding-left: 220px;
            width: 100%;
        }

        .sidebar {
            position: absolute;
            top: 0;
            width: 220px;
            height: 100vh;
            z-index: 1031
        }

        .navbar {
            padding-left: 220px;
        }

    </style>
    @yield('customCss')

</head>

<body>
    <main>
        @if (Session::has('success'))
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div class="toast show align-items-center text-white bg-primary border-0" role="alert"
                    aria-live="assertive" aria-atomic="true">
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
        <nav class="navbar fixed-top navbar-expand navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <h5> {{ $title }}</h5>
                    </div>
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
        @section('sidebar')
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidebar">
                <a href="/admin" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-4">X-Shop Admin</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="/admin" class="nav-link px-0 text-white {{ request()->is('admin') ? 'active' : '' }}">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            tổng quan
                        </a>
                    </li>
                    <li>
                        <a href="/admin/categories"
                            class="nav-link px-0 text-white {{ request()->is('admin/categories', 'admin/categories/create', 'admin/categories/edit') ? 'active' : '' }}">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            danh mục
                        </a>
                    </li>
                    <li>
                        <a href="/admin/products"
                            class="nav-link px-0 text-white {{ request()->is('admin/products', 'admin/products/create', 'admin/products/edit') ? 'active' : '' }}">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="/admin/comments"
                            class="nav-link px-0 text-white {{ request()->is('admin/comments') ? 'active' : '' }}">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            bình luận
                        </a>
                    </li>
                    <li>
                        <a href="/admin/users"
                            class="nav-link px-0 text-white {{ request()->is('admin/users') ? 'active' : '' }}">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle"></use>
                            </svg>
                            tài khoản
                        </a>
                    </li>
                </ul>
            </div>

            <div class="main-layout">
                @yield('content')
            </div>
        </main>
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
            }, 3000);
        });
    </script>


</body>

</html>
