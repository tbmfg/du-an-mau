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
        <form class="py-3 row needs-validation" novalidate action="/admin/users/{{ $editUser->id }}/update" method="POST">
            @csrf
            <div class="mb-3">
                <label for="idInput" class="form-label">Mã tài khoản</label>
                <input type="text" class="form-control" id="idInput" value="{{ $editUser->id }}" disabled>
            </div>
            <div class="mb-3">
                <label for="nameInput" class="form-label">Họ tên</label>
                <input name="name" type="text" class="form-control" id="nameInput" placeholder="Bùi Văn A"
                    value="{{ $editUser->name }}" required>
                <div class="invalid-feedback">
                    Bắt buộc nhập
                </div>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="emailInput" placeholder="buivana@gmail.com"
                    value="{{ $editUser->email }}" required disabled>
                <div class="invalid-feedback">
                    Bắt buộc nhập
                </div>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="imageInput" class="form-label">Hình ảnh</label>
                {{-- <input name="image" type="file" class="form-control" id="imageInput" placeholder="image"> --}}
                <input name="image" type="text" class="form-control" id="inputImage" placeholder="vd"
                    value="{{ $editUser->image }}" required>
                <div class="invalid-feedback">
                    Bắt buộc nhập
                </div>
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Mật khẩu</label>
                <input name="password" type="password" class="form-control" id="passwordInput" placeholder="*******">
                <div class="invalid-feedback">
                    Bắt buộc nhập
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="confirmPasswordInput" class="form-label">Xác nhận mật khẩu</label>
                <input name="confirmPassword" type="password" class="form-control" id="confirmPasswordInput"
                    placeholder="*******">
                <div class="invalid-feedback">
                    Bắt buộc nhập
                </div>
                @if ($errors->has('confirmPassword'))
                    <span class="text-danger">{{ $errors->first('confirmPassword') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="activeInput" class="form-label">Trạng thái</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="isActiveInput" name="isActive"
                        {{ $editUser->isActive == 'guest' ? 'checked' : '' }}>
                    <label class="form-check-label" for="isActiveInput">Kích hoạt</label>
                </div>
                <div class="invalid-feedback">
                    Bắt buộc nhập
                </div>
                @if ($errors->has('isActive'))
                    <span class="text-danger">{{ $errors->first('isActive') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="roleInput" class="form-label">Role</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" value="admin" id="adminRole" required
                        {{ $editUser->role == 'admin' ? 'checked' : '' }}>
                    <label class="form-check-label" for="adminRole">
                        Admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" value="guest" id="guest" required
                        {{ $editUser->role == 'guest' ? 'checked' : '' }}>
                    <label class="form-check-label" for="guest">
                        Khách hàng
                    </label>
                    <div class="invalid-feedback">
                        Bắt buộc nhập
                    </div>
                    @if ($errors->has('role'))
                        <span class="text-danger">{{ $errors->first('role') }}</span>
                    @endif
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mb-3">Tạo tài khoản</button>
                <a href="/admin/users" class="btn btn-secondary mb-3">Hủy</a>
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
