<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SortData
{
    public $sortBy;
    public $sortDirection;
}

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $sortData = $this->getSortData($request);
        try {
            $products = Product::orderBy(
                $sortData->sortBy,
                $sortData->sortDirection
            )->paginate(10);
        } catch (\Throwable $err) {
            $products = Product::orderBy(
                'views',
                $sortData->sortDirection
            )->paginate(10);
        }

        return view('admin.products.index', [
            'products' => $products,
            'user' => $user,
            'title' => "Quản lý sản phẩm"
        ]);
    }

    public function list()
    {
        $products = Product::all();

        return $products;
    }

    public function detail($id)
    {
        $product = Product::find($id);

        return $product;
    }

    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('admin.products.create', [
            'user' => $user,
            'categories' => $categories,
            'title' => 'Tạo sản phẩm',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'sale_off' => 'required',
            'image' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);
        $data = $request->all();

        Product::create([
            'name' => $data['name'],
            'price' => floatval($data['price']),
            'sale_off' => $data['sale_off'],
            'image' => $data['image'],
            'category_id' => $data['category'],
            'is_special' => $request['is_special'] == 'on' ? 1 : 0,
            'created_date' => date('Y-m-d H:i:s'),
            'views' => 0,
            'description' => $data['description'],
        ]);
        return redirect('/admin/products')->withSuccess('Đã tạo sản phẩm!');
    }

    public function show($id)
    { {
            $product = Product::findOrFail($id);
            return 'show';
            return $product;
        }
    }

    public function edit($id)
    {
        $user = Auth::user();
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.products.edit', [
            'user' => $user,
            'product' => $product,
            'categories' => $categories,
            'title' => 'Sửa sản phẩm',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'sale_off' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);
        $data = $request->all();
        Product::where('id', $id)->update([
            'name' => $data['name'],
            'price' => floatval($data['price']),
            'sale_off' => $data['sale_off'],
            'image' => $data['image'],
            'category_id' => $data['category'],
            'is_special' => $request['is_special'] == 'on' ? 1 : 0,
            'created_date' => date('Y-m-d H:i:s'),
            'views' => 0,
            'description' => $data['description'],
        ]);
        return redirect('/admin/products')->withSuccess('Đã sửa sản phẩm!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/products')->withSuccess('Đã xóa sản phẩm!');
    }

    public function getSortData(Request $request)
    {
        $sortData = new SortData();
        $sortBy = $request->sortBy;
        $sortDirection = $request->sortDirection;
        if ($sortDirection !== 'desc' && $sortDirection !== 'asc') {
            $sortDirection = 'desc';
        }

        $sortData->sortBy = $sortBy ? $sortBy : 'views';
        $sortData->sortDirection = $sortDirection;
        return $sortData;
    }
}
