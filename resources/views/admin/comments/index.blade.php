@extends('admin.layouts.index')

@section('title', 'Trang chủ')
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/sidebar.css') }}" rel="stylesheet">
<link href="css/app.css" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

@section('css')
    <style>
        .table-content {
            max-height: calc(100vh - 117px);
            overflow: auto;
        }

    </style>

@section('content')
    <div class="container-fluid">
        <div class="table-content">
            <table class="table table-bordered table-sm table-hover align-middle header-fixed">
                <thead>
                    <tr>
                        <th scope="col">ID</i></th>
                        <th scope="col">Tên sản phẩm</i></th>
                        <th scope="col">Số bình luận</i></th>
                        <th scope="col">Mới nhất</i></th>
                        <th scope="col">Cũ nhất</i></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td scope="row">{{ $product->name }}</td>
                            <td scope="row">{{ $product->countComments }}</td>
                            <td scope="row">{{ $product->lastestComment }}</td>
                            <td scope="row">{{ $product->oldestComment }}</td>
                            <td scope="row">
                                <a href="/admin/comments/{{ $product->id }}/list" class="btn btn-primary">
                                    Chi tiết
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>

        <div class="modal fade" id="deletePopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="deletePopupLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePopupLabel">Xóa sản phẩm?</h5>
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
    </div>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        function openDelete(id, name) {
            var myModal = new bootstrap.Modal(document.getElementById('deletePopup'), {
                keyboard: false
            });

            var confirmForm = document.getElementById('confirmForm');
            var popupProductName = document.getElementById('popupProductName');
            // confirmForm.setAttribute("onClick", `confirmDelete(${id})`)
            confirmForm.action = `/admin/products/${id}`
            popupProductName.innerHTML = `Bạn có muốn xóa <strong>${name}</strong> không?`
            myModal.show();

            console.log(id, myModal)
        }
    </script>
@stop
