<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(4);
        return view('sites.index', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function categories($id)
    {
        $category = Category::find($id);
        $categories = Category::all();

        return view('sites.categories', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    public function products()
    {
        $products = Product::orderBy('views', 'desc')->paginate(4);

        $categories = Category::all();

        return view('sites.products', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function detailProduct($id)
    {
        $categories = Category::all();
        DB::update('UPDATE Products SET views = views + 1 WHERE id = ?', [$id]);

        $product = Product::find($id);

        return view('sites.detailProduct', [
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    public function create()
    {
        //
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
    {
        //
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
        //
    }
}
