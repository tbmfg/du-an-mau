<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Categories';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function productCount($id)
    {
        $products = Product::where('category_id', '=', $id)->get();
        return count($products);
    }

    public function highestPrice($id)
    {
        $products = Product::where('category_id', '=', $id)->orderBy('price', 'desc')->get();
        return $products[0]->price;
    }

    public function lowestPrice($id)
    {
        $products = Product::where('category_id', '=', $id)->orderBy('price', 'asc')->get();
        return $products[0]->price;
    }

    public function averagePrice($id)
    {
        return Product::where('category_id', '=', $id)->avg('price');
        // return $products[0]->price;
    }
}
