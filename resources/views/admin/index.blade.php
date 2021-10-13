@extends('admin.layouts.index')

@section('title', 'Trang chủ')
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/app.css') }}" rel="stylesheet">
<link href="{{ asset('public/sidebar.css') }}" rel="stylesheet">
<link href="css/app.css" rel="stylesheet">
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

@section('css')

@section('content')
    <div class="container-fluid">
        <div class="py-3 d-flex">
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#chartModal">
                Xem biểu đồ
            </button>
            <!-- Chart Modal -->
            <div class="modal fade" id="chartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Biểu đồ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-content">
            <table class="table table-bordered table-sm table-hover align-middle header-fixed">
                <thead>
                    <tr>
                        <th scope="col-1"></th>
                        <th scope="col-2">#</th>
                        <th scope="col-3">Tên</th>
                        <th scope="col-2">Số lượng sản phẩm</th>
                        <th scope="col-2">Giá cao nhất</th>
                        <th scope="col-2">Giá thấp nhất</th>
                        <th scope="col-2">Giá trung bình</th>
                        <th scope="col-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">
                                <input class="form-check-input" type="checkbox" value="">
                            </th>
                            <td>{{ $category->id }}</td>
                            <td class="category-name">{{ $category->name }}</td>
                            <td class="category-product-count">{{ $category->countProducts }}</td>
                            <td>{{ number_format($category->highestPrice) }}</td>
                            <td>{{ number_format($category->lowestPrice) }}</td>
                            <td>{{ number_format($category->averagePrice) }}</td>
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
                    <h5 class="modal-title" id="deletePopupLabel">Xóa danh mục?</h5>
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
        var xValues = [...document.getElementsByClassName('category-name')].map(e => e.innerHTML);
        var yValues = [...document.getElementsByClassName('category-product-count')].map(e => e.innerHTML);
        // var yValues = [55, 49, 44, 24, 15];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Biểu đồ số lượng sản phẩm"
                }

            }
        });
    </script>
@stop
