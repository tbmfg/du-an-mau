<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;

class SortData
{
    public $sortBy;
    public $sortDirection;
}

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $categories = Category::all();
        $mostViewProducts = Product::orderBy(
            'views',
            'asc'
        )->paginate(8);
        $specialProducts = Product::where(
            'isSpecial',
            1
        )->paginate(4);

        return view('sites.index', [
            'categories' => $categories,
            'specialProducts' => $specialProducts,
            'mostViewProducts' => $mostViewProducts,
            'user' => $user,
        ]);
    }

    public function productsCategory($id, Request $request)
    {
        $category = Category::find($id);
        $categories = Category::all();
        $user = Auth::user();
        $sortData = $this->getSortData($request);
        try {
            $products = Product::where('category_id', $id)->orderBy(
                $sortData->sortBy,
                $sortData->sortDirection
            )->paginate(8);
        } catch (\Throwable $err) {
            $products = Product::where('category_id', $id)
                ->orderBy(
                    'views',
                    $sortData->sortDirection
                )->paginate(8);
        }

        return view('sites.productsCategory', [
            'category' => $category,
            'categories' => $categories,
            'products' => $products,
            'user' => $user,
        ]);
    }

    public function products(Request $request)
    {
        $sortData = $this->getSortData($request);
        $user = Auth::user();
        try {
            $products = Product::orderBy(
                $sortData->sortBy,
                $sortData->sortDirection
            )->paginate(8);
        } catch (\Throwable $err) {
            $products = Product::orderBy(
                'views',
                $sortData->sortDirection
            )->paginate(8);
        }

        $categories = Category::all();

        return view('sites.products', [
            'products' => $products,
            'categories' => $categories,
            'user' => $user,
        ]);
    }

    public function detailProduct($id)
    {
        $categories = Category::all();
        $user = Auth::user();
        DB::update('UPDATE Products SET views = views + 1 WHERE id = ?', [$id]);
        $comments = Comment::where('productId', $id)->orderBy(
            'createdAt',
            'desc'
        )->paginate(2);

        $product = Product::find($id);

        $productsCategory = Product::where('category_id', $product->category_id)->paginate(8);

        return view('sites.detailProduct', [
            'categories' => $categories,
            'product' => $product,
            'productsCategory' => $productsCategory,
            'comments' => $comments,
            'user' => $user,
        ]);
    }

    public function about()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('sites.about', [
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function contact()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('sites.contact', [
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function feedback()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('sites.feedback', [
            'user' => $user,
            'categories' => $categories,
        ]);
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
