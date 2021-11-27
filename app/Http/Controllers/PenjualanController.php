<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $category = CategoryProduct::query()
            ->orderby('category_name', 'asc')
            ->get();
        $product = Product::query()
            ->orderby('kode', 'asc')
            ->get();
        return view('pages.penjualan.index', compact('category', 'product'));
    }
}
