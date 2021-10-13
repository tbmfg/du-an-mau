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
        <div class="py-3 d-flex">
            {{-- Sản phẩm: <strong>{{ $product->name }}</strong> --}}
        </div>
        <div class="table-content">
            <table class="table table-bordered table-sm table-hover align-middle header-fixed">
                <thead>
                    <tr>
                        <th scope="col"></i></th>
                        <th scope="col">Nội dung</i></th>
                        <th scope="col">Ngày bình luận</i></th>
                        <th scope="col">Người bình luận</i></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td scope="row">{{ $comment->content }}</td>
                            <td scope="row">{{ $comment->created_at }}</td>
                            <td scope="row">{{ $comment->owner->name }}</td>
                            <td scope="row">
                                <button
                                    onclick="openDelete({{ $comment->id }}, '{{ $comment->owner->name }}', '{{ $comment->content }}')"
                                    class="btn btn-danger">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
                        <div id="popupItemName"></div>
                        <br />
                        <div id="">Nội dung: </div>
                        <div id="popupCommentContent" style=""></div>
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

        function openDelete(id, name, content) {
            var myModal = new bootstrap.Modal(document.getElementById('deletePopup'), {
                keyboard: false
            });

            var confirmForm = document.getElementById('confirmForm');
            var popupItemName = document.getElementById('popupItemName');

            confirmForm.action = `/admin/comments/${id}`
            popupItemName.innerHTML = `Bạn có muốn xóa comment của <strong>${name}</strong> không?`
            popupCommentContent.innerHTML = `<strong>${content}</strong>`;
            myModal.show();

            console.log(id, myModal)
        }
    </script>
@stop
