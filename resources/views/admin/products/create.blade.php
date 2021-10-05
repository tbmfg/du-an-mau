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
        <form class="py-3 row needs-validation" novalidate action="/admin/categories" method="POST">
            @csrf
            <div class="col-md-6 mb-3">
                <label for="idInput" class="form-label">Mã sản phẩm</label>
                <input type="text" class="form-control" id="idInput" placeholder="auto_number" disabled>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nameInput" class="form-label">Tên sản phẩm</label>
                <input name="name" type="text" class="form-control" id="nameInput"
                    placeholder="Apple iPhone, Samsung Galaxy,..." required>
                <div class="invalid-feedback">
                    Bắt buộc
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputPrice" class="form-label">Giá (vnđ)</label>
                <input type="number" name="price" class="form-control" id="inputPrice" placeholder="1.990.000">
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputSale" class="form-label">Giảm giá (%)</label>
                <input type="number" name="saleOff" class="form-control" id="inputSale" placeholder="10">
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputCategory" class="form-label">Danh mục</label>
                <select class="form-select" id="inputCategory">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputImage" class="form-label">Hình ảnh</label>
                <input type="file" name="image" class="form-control" id="inputImage">
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputView" class="form-label">Lượt xem</label>
                <input type="number" name="view" class="form-control" id="inputView" value="0" disabled>
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputDate" class="form-label">Ngày nhập</label>
                <input type="text" name="createdDate" class="form-control" id="inputDate"
                    value="{{ date('Y-m-d H:i:s') }}" disabled>
            </div>
            <div class="col-12 mb-3">
                <label for="inputDescription" class="form-label">Mô tả</label>
                <textarea class="form-control" name="description" id="inputDescription" rows="3" placeholder="Sản phẩm rất tốt..."></textarea>
            </div>
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-primary mb-3">Tạo sản phẩm</button>
                <a href="/admin/products" class="btn btn-secondary mb-3">Hủy</a>
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
