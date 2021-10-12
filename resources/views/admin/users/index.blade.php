@extends('admin.layouts.index')

@section('title', 'Trang chủ')
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/sidebar.css') }}" rel="stylesheet">
<link href="css/app.css" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@section('css')

@section('content')
    <div class="container-fluid">
        <div class="py-3 d-flex">
            <button class="btn btn-primary btn-sm me-2">
                Chọn tất cả
            </button>
            <button class="btn btn-primary btn-sm me-2">
                Bỏ chọn tất cả
            </button>
            <button class="btn btn-danger btn-sm me-2 position-relative">Xóa mục đã chọn<nav></nav>
                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary border border-dark">
                    13
                </span>
            </button>
            <a class="btn btn-success btn-sm me-2" href="/admin/users/create">
                Tạo tài khoản
            </a>
        </div>
        <div class="table-content">
            <table class="table table-bordered table-sm table-hover align-middle header-fixed">
                <thead>
                    <tr>
                        <th scope="col-1"></th>
                        <th scope="col-2">#</th>
                        <th scope="col-6">Tên</th>
                        <th scope="col-6">Email</th>
                        <th scope="col-6">Hình ảnh</th>
                        <th scope="col-6">Role</th>
                        <th scope="col-4"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $usr)
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" value="">
                            </th>
                            <td>{{ $usr->id }}</td>
                            <td>{{ $usr->name }}</td>
                            <td>{{ $usr->email }}</td>
                            <td><img src="{{$usr->image}}" style="border-radius: 50%; width:60px;" /></td>
                            <td>{{ $usr->role }}</td>
                            <td>
                                <div>
                                    <a href="/admin/users/{{ $usr->id }}/edit" class="btn btn-warning">
                                        Sửa
                                    </a>
                                    <button onclick="openDelete({{ $usr->id }}, '{{ $usr->name }}')"
                                        class="btn btn-danger">
                                        Xóa
                                    </button>
                                </div>
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="deletePopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="deletePopupLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePopupLabel">Xóa tài khoản?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="popupProductName"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <form action="" method="POST" id="confirmForm">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openDelete(id, name) {
            var myModal = new bootstrap.Modal(document.getElementById('deletePopup'), {
                keyboard: false
            });

            var confirmForm = document.getElementById('confirmForm');
            var popupProductName = document.getElementById('popupProductName');

            confirmForm.action = `/admin/users/${id}`
            popupProductName.innerHTML = `Bạn có muốn xóa <strong>${name}</strong> không?`
            myModal.show();

            console.log(id, myModal)
        }
    </script>
@stop
