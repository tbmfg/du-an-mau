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
}
