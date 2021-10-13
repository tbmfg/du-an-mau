<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $fillable = [
        'name',
        'price',
        'sale_off',
        'category_id',
        'is_special',
        'created_date',
        'views',
        'description',
    ];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function countComments($id)
    {
        $comments = Comment::where('product_id', '=', $id)->get();
        return count($comments);
    }

    public function lastestComment($id)
    {
        $comments = Comment::where('product_id', '=', $id)->orderBy('created_at', 'desc')->get();
        return count($comments) ? $comments[0]->created_at : null;
        return $comments[0]->created_at;
    }

    public function oldestComment($id)
    {
        $comments = Comment::where('product_id', '=', $id)->orderBy('created_at', 'asc')->get();
        return count($comments) ? $comments[0]->created_at : null;
    }
}
