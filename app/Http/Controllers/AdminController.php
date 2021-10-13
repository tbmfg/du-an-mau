<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Category;


class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();

        foreach ($categories as $category) {
            $category->countProducts = $category->countProducts($category->id);
            $category->highestPrice = $category->highestPrice($category->id);
            $category->lowestPrice = $category->lowestPrice($category->id);
            $category->averagePrice = $category->averagePrice($category->id);
        }

        return view('admin.index', [
            'categories' => $categories,
            'user' => $user,
            'title' => "Thống kê",
        ]);
    }
}
