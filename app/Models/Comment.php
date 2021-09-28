<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'productId');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'customerId');
    }
}
