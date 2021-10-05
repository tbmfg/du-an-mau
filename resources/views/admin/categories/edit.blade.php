@extends('admin.layouts.index')

@section('title', 'Trang chủ')
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/sidebar.css') }}" rel="stylesheet">
<link href="css/app.css" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@section('css')

@section('content')
    <div class="container pt-3">
        <form class="py-3 col-md-6 col-lg-5 col-sm-12 m-auto needs-validation" novalidate
            action="/admin/categories/{{ $category->id }}/update" method="post">
            @csrf
            <div class="mb-3">
                <label for="idInput" class="form-label">Mã danh mục</label>
                <input type="text" class="form-control" id="idInput" placeholder="auto_number" disabled
                    value="{{ $category->id }}">
            </div>
            <div class="mb-3">
                <label for="nameInput" class="form-label">Tên danh mục</label>
                <input name="name" type="text" class="form-control" id="nameInput" placeholder="Apple, Samsung,..."
                    required value="{{ $category->name }}">
                <div class="invalid-feedback">
                    Vui lòng nhập tên danh mục
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mb-3">Sửa danh mục</button>
                <a href="/admin/categories" class="btn btn-secondary mb-3">Hủy</a>
            </div>
        </form>
    </div>

    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@stop
