<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();

        foreach ($categories as $category) {
            $category->countProducts = $category->countProducts($category->id);
        }

        return view('admin.categories.index', [
            'categories' => $categories,
            'user' => $user,
            'title' => 'Quản lý danh mục',
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.categories.create', [
            'user' => $user,
            'title' => 'Tạo danh mục',
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
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();

        Category::create([
            'name' => $data['name'],
        ]);
        return redirect('/admin/categories')->withSuccess('Đã tạo danh mục!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return 'das';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $category = Category::find($id);
        return view('admin.categories.edit', [
            'user' => $user,
            'category' => $category,
            'title' => 'Sửa danh mục',
        ]);
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
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        Category::where('id', $id)->update([
            'name' => $data['name'],
        ]);
        return redirect('/admin/categories')->withSuccess('Đã sửa danh mục!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category->countProducts($id)) {
            return redirect('/admin/categories')->withSuccess('Không thể xóa danh mục có chứa sản phẩm!');
        }
        $category->delete();
        return redirect('/admin/categories')->withSuccess('Đã xóa danh mục!');
    }
}
