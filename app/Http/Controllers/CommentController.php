<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SortData
{
    public $sortBy;
    public $sortDirection;
}

class CommentController extends Controller
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

        foreach ($products as $product) {
            $product->countComments = $product->countComments($product->id);
            $product->lastestComment = $product->lastestComment($product->id);
            $product->oldestComment = $product->oldestComment($product->id);
        }

        return view('admin.comments.index', [
            'products' => $products,
            'user' => $user,
            'title' => "Tổng hợp bình luận"
        ]);
    }

    public function list($id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        $comments = Comment::where("product_id", '=', $id)->get();
        foreach ($comments as $comment) {
            $comment->owner = User::find($comment->user_id);
        }

        return view('admin.comments.list', [
            'product' => $product,
            'comments' => $comments,
            'user' => $user,
            'title' => "Danh sách bình luận: " . $product->name
        ]);
    }

    public function destroy($id)
    {
        $comments = Comment::find($id);
        $comments->delete();
        return Redirect::back()->withSuccess('Đã xóa bình luận!');
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
