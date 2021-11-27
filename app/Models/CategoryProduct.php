<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProduct extends Model
{
    use SoftDeletes;

    protected $guards = [];

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
