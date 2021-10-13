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
    protected $fillable = ['content', 'user_id', 'product_id', 'created_at'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
