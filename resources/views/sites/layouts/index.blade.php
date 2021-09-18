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

    <style>

    </style>
    @yield('customCss')

</head>

<body>
    <main style="">
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
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
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

</body>

</html>
