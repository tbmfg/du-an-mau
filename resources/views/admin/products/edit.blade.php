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
        <form class="py-3 row needs-validation" novalidate action="/admin/products/{{ $product->id }}/update"
            method="POST">
            @csrf
            <div class="col-md-6 mb-3">
                <label for="idInput" class="form-label">Mã sản phẩm</label>
                <input type="text" class="form-control" id="idInput" disabled value="{{ $product->id }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="nameInput" class="form-label">Tên sản phẩm</label>
                <input name="name" type="text" class="form-control" id="nameInput"
                    placeholder="vd: Apple iPhone, Samsung Galaxy,..." value="{{ $product->name }}" required>
                <div class="invalid-feedback">
                    Bắt buộc nhập
                </div>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputPrice" class="form-label">Giá (vnđ)</label>
                <input type="number" name="price" class="form-control" id="inputPrice" placeholder="vd: 1.990.000"
                    value="{{ $product->price }}" required>
                <div class="invalid-feedback">
                    Bắt buộc nhập
                </div>
                @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputSale" class="form-label">Giảm giá (%)</label>
                <input type="number" name="saleOff" class="form-control" id="inputSale" placeholder="vd: 0"
                    value="{{ $product->saleOff }}">
            </div>
            @if ($errors->has('saleOff'))
                <span class="text-danger">{{ $errors->first('saleOff') }}</span>
            @endif
            <div class="col-md-6 mb-3">
                <label for="inputCategory" class="form-label">Danh mục</label>
                <select class="form-select" id="inputCategory" name="category" required>
                    <option selected value="">Chọn...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Bắt buộc nhập
                </div>
                @if ($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <label for="typeInput" class="form-label">Loại sản phẩm</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" name="isSpecial" type="checkbox" id="specialSwitch"
                        {{ $product->isSpecial ? 'checked' : '' }}>
                    <label class="form-check-label" for="specialSwitch">Đặc biệt</label>
                </div>
                <div class="invalid-feedback">
                    Bắt buộc nhập
                </div>
                @if ($errors->has('isSpecial'))
                    <span class="text-danger">{{ $errors->first('isSpecial') }}</span>
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputImage" class="form-label">Hình ảnh</label>
                {{-- <input type="file" name="image" class="form-control" id="inputImage"> --}}
                <input name="image" type="text" class="form-control" id="inputImage"
                    placeholder="vd: Apple iPhone, Samsung Galaxy,..." value="{{$product->image}}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputView" class="form-label">Lượt xem</label>
                <input type="number" name="view" class="form-control" id="inputView" value="{{ $product->views }}"
                    disabled>
            </div>
            <div class="col-md-6 mb-3">
                <label for="inputDate" class="form-label">Ngày nhập</label>
                <input type="text" name="createdDate" class="form-control" id="inputDate"
                    value="{{ $product->createdDate }}" disabled>
            </div>
            <div class="col-12 mb-3">
                <label for="inputDescription" class="form-label">Mô tả</label>
                <textarea class="form-control" name="description" id="inputDescription" rows="3"
                    placeholder="vd: Sản phẩm rất tốt..." value="Sản phẩm rất OK"
                    required>{{ $product->description }}</textarea>
                <div class="invalid-feedback">
                    Bắt buộc nhập
                </div>
                @if (session()->has('description'))
                    <span class="text-danger">{{ session()->get('description') }}</span>
                @endif
            </div>
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-primary mb-3">Sửa sản phẩm</button>
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
