@extends('sites.layouts.index')

@section('title', 'Trang chủ')

@section('content')
    <div class="py-2"></div>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a class="text-decoration-none" href="/products">Tất cả sản phẩm</a>
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    <a class="text-decoration-none text-muted">
                        {{ $category->name }}
                    </a>
                </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-9">
                @if (count($products) > 0)
                    <div class="d-flex justify-content-between">
                        <form>
                            <select class="form-select" name="orderBy" id="orderBySelect">
                                <option selected value="">Nổi bật trước</option>
                                <option value="price-asc">Giá rẻ trước</option>
                                <option value="price-desc">Giá cao trước</option>
                            </select>
                        </form>
                    </div>
                @endif
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 mb-4">
                    @foreach ($products as $product)
                        <div class="col">
                            <a href="/products/{{ $product->id }}" class="text-decoration-none">
                                <div class="card text-dark bg-light shadow-sm product-card">
                                    <div class="card-img-top pt-2">
                                        <img src="{{ $product->image }}" width="100%" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                        <p class="card-text">{{ number_format($product->price) }} đ</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                {{ $products->links() }}
            </div>
            <div class="col">
                <div class="list-group">
                    @foreach ($categories as $category)
                        <a href="/categories/{{ $category->id }}" class="list-group-item list-group-item-action"
                            aria-current="true">
                            {{ $category->name }}
                        </a>
                    @endforeach
                    <a href="/products" class="list-group-item list-group-item-action" aria-current="true">
                        Tất cả sản phẩm
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $(function() {

        var url = new URL(window.location.href);
        var sortBy = url.searchParams.get("sortBy");
        var sortDirection = url.searchParams.get("sortDirection");

        var sortStr = sortBy + '-' + sortDirection;

        $('#orderBySelect').val(sortStr);

        $('#orderBySelect').on('change', function(e) {
            var value = $(this).val();
            var sortBy = value.split('-')[0];
            var sortDirection = value.split('-')[1];
            var url = new URL(window.location.href);
            var params = new URLSearchParams(url.search);
            params.set('sortBy', sortBy || '');
            params.set('sortDirection', sortDirection || '');
            if (url) {
                window.location = window.location.origin + window.location.pathname + '?' + params
                    .toString();
                return;
            }
        });
    });
</script>

@section('footer')
