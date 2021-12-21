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

    public function getDataPenjualan()
    {
        $arr_total = [];
        for($i = 1; $i < 13; $i++) {
            $total_bulan_kotor = PenjualanDetail::query()
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $i)
                ->sum(\DB::raw('qty * harga_jual'));
            $total_bulan_rugi = PenjualanDetail::query()
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $i)
                ->sum(\DB::raw('qty * harga_beli'));
            $arr_total_bersih[] = $total_bulan_kotor - $total_bulan_rugi;
            $arr_total_kotor[] = $total_bulan_kotor;
        }
        $arr_total['kotor'] = $arr_total_kotor;
        $arr_total['bersih'] = $arr_total_bersih;

        return response()->json($arr_total);
    }

    public function getDataPenjualanKategori()
    {
        $arr_total = [];
        $penjualan = PenjualanDetail::query()
            ->join('products', 'products.id', 'penjualan_details.produk_id')
            ->join('category_products', 'category_products.id', 'products.category_id')
            ->select(\DB::raw('SUM(qty) AS jumlah'), 'category_products.category_name')
            ->groupby(['qty', 'category_name'])
            ->orderby('jumlah', 'desc')
            ->limit(3)
            ->get();
        foreach($penjualan as $item) {
            $labels[] = $item->category_name;
            $total[] = $item->jumlah;
        }
        $arr_total['labels'] = $labels;
        $arr_total['data'] = $total;

        return response()->json($arr_total);
    }
}
