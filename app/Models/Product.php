<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $guards = [];
    protected $fillable = ['id', 'satuan_id', 'supplier_id', 'category_id', 'kode', 'nama_barang', 'stok', 'harga_jual', 'harga_beli', 'foto'];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id', 'id');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
