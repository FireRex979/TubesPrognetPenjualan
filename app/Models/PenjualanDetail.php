<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'transaksi_id', 'id');
    }
}
