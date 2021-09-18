<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Categories';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    const CREATED_AT = 'createdAt';

    // $categories = Category::where('active', 1)
    //            ->orderBy('name')
    //            ->take(10)
    //            ->get();
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
