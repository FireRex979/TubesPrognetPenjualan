<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_harga_beli = Product::query()->sum(\DB::raw('stok * harga_beli'));
        $total_penjualan_jual = PenjualanDetail::query()->sum(\DB::raw('qty * harga_jual'));
        $total_penjualan_beli = PenjualanDetail::query()->sum(\DB::raw('qty * harga_beli'));
        $total_keuntungan = $total_penjualan_jual - $total_penjualan_beli;
        $total_stok = Product::query()->sum('stok');
        $total_user = User::query()->count();
        return view('home', compact('total_harga_beli', 'total_keuntungan', 'total_stok', 'total_user'));
    }
}
