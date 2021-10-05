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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $sortData = $this->getSortData($request);
        try {
            $products = Product::orderBy(
                $sortData->sortBy,
                $sortData->sortDirection
            )->paginate(4);
        } catch (\Throwable $err) {
            $products = Product::orderBy(
                'views',
                $sortData->sortDirection
            )->paginate(4);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.products.create', [
            'user' => $user,
            'title' => 'Tạo sản phẩm',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { {
            $product = Product::findOrFail($id);
            // $category = Category::all();
            return 'show';
            return $product;

            // return view('products', ['products' => $products]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
