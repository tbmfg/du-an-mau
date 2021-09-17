@extends('layouts.index')

@section('title', 'Trang chủ')
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/sidebar.css') }}" rel="stylesheet">
<link href="css/app.css" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@section('css')

@section('content')
    <br />
    <h3>Danh sách sản phẩm</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Mô tả</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $cate)
                <tr>
                    <th scope="row">{{ $cate->id }}</th>
                    <td>{{ $cate->category_id }}</td>
                    <td>{{ $cate->name }}</td>
                    <td>{{ $cate->price }}</td>
                    <td><img src="{{ $cate->image }}" width="50" /></td>
                    <td>{{ $cate->createdDate }}</td>
                    <td>{{ $cate->description }}</td>
                    <td>
                        <div>
                            <a href="{{ $cate->id }}" class="btn btn-outline-warning">Edit</a>
                            <a href="{{ $cate->id }}" class="btn btn-outline-danger">Delete</a>
                        </div>
                    </td>

                    </td>
            @endforeach
        </tbody>
    </table>
@stop
