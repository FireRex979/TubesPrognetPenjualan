<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satuan extends Model
{
    use SoftDeletes;

    protected $guards = [];
    protected $fillable = ['id','satuan', 'singkatan'];

    public function product()
    {
        return $this->hasMany(Product::class, 'satuan_id');
    }
}
