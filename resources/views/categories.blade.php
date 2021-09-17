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
    <h3>Danh sách danh mục</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col-2">#</th>
                <th scope="col-6">Tên</th>
                <th scope="col-4"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cate)
                <tr>
                    <th scope="row">{{ $cate->id }}</th>
                    <td>{{ $cate->name }}</td>
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
