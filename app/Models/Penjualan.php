<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    public function penjualan_detail()
    {
        return $this->hasMany(PenjualanDetail::class, 'transaksi_id');
    }
}
