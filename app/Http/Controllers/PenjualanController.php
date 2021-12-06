<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Satuan;
use App\Models\Supplier;
use Illuminate\Contracts\Pagination\Paginator;
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

    public function dashboard(){
        return view('penjualan.dashboard');
    }
    
    public function produk_list(){

        $produk = Product::paginate(10);
        return view('produk.list', compact('produk'));
    }

    public function produk_block(){

        $produk = Product::paginate(1);
        return view('produk.block', compact('produk'));
    }
    
    public function produk_tambah(){
        
        $supplier = Supplier::all();
        $kategori = CategoryProduct::all();
        $satuan = Satuan::all();
        return view('produk.tambah', compact('kategori', 'satuan', 'supplier'));
    }

    public function produk_savetambah(Request $request){

        $request->validate([
            'satuan' => 'required',
            'supplier' => 'required',
            'kategori' => 'required',
            'kode' => 'required',
            'nama' => 'required',
            'stok' => 'required',
            'jual' => 'required',
            'foto' => 'required',
        ]);

        if ($request->file('foto')) {
            $gambar = $request->file('foto');
            $destinationPath = 'img/';
            $filename = $destinationPath."/".$gambar->getClientOriginalName();
            $gambar->move($destinationPath, $filename);
            $urlgambar = $filename;
        }
        else{
            $urlgambar = $request->foto;
        }

        Product::create([
            'satuan_id' => $request->satuan,
            'supplier_id' => $request->supplier,
            'category_id' => $request->kode,
            'foto' => $urlgambar,
            'kode' => $request->kode,
            'nama_barang' => $request->nama,
            'stok' => $request->stok,
            'harga_jual' => $request->jual,
        ]);
        

        return redirect()->route('produk-list');
    }

    public function produk_edit(){
        return view('produk.edit');
    }

    public function produk_saveedit(){
        return view('penjualan.saveedit');
    }

    public function produk_delete(){
        return view('penjualan.delete');
    }


}
