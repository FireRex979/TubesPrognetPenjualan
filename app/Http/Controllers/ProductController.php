<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function dashboard(){
        return view('penjualan.dashboard');
    }

    public function produk_list(Request $request){

        $produk = Product::all();
        // $produk = Product::all()->toJson();
        // return response()->json($produk);
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

        if($request->beli > $request->jual){
            $request->validate([
                'beli' => 'lt:jual',
            ]);
        }
        else{
            $request->validate([
            'satuan' => 'required',
            'supplier' => 'required',
            'kategori' => 'required',
            'kode' => 'required',
            'nama' => 'required',
            'stok' => 'required',
            'beli' => 'required',
            'jual' => 'required',
            'foto' => 'required',
            ]);
        }
    
        if($request->file('foto')){
            $gambar = $request->file('foto');
            $destinationPath = 'foto';
            $filename = $destinationPath."/".$gambar->getClientOriginalName();
            $gambar->move($destinationPath, $filename);
            $urlgambar = $filename;
        }

        Product::create([
            'satuan_id' => $request->satuan,
            'supplier_id' => $request->supplier,
            'category_id' => $request->kategori,
            'foto' => $urlgambar,
            'kode' => $request->kode,
            'nama_barang' => $request->nama,
            'stok' => $request->stok,
            'harga_beli' => $request->beli,
            'harga_jual' => $request->jual,
        ]);

        return redirect()->route('produk-list');
    }

    public function produk_edit_contoh($id){
        $produk = Product::find($id);
        $supplier = Supplier::where('id', '=', $produk->supplier_id)->first();
        $kategori = CategoryProduct::where('id', '=', $produk->category_id)->first();
        $satuan = Satuan::where('id', '=', $produk->satuan_id)->first();

        return view('produk.edit', compact('produk', 'supplier', 'kategori', 'satuan'));
    }

    public function produk_edit($id){
        $produk = Product::find($id);

        $supplier_selected = Supplier::where('id', '=', $produk->supplier_id)->first();
        $supplier = Supplier::all();

        $kategori = CategoryProduct::all();
        $kategori_selected = CategoryProduct::where('id', '=', $produk->category_id)->first();

        $satuan = Satuan::all();
        $satuan_selected = Satuan::where('id', '=', $produk->satuan_id)->first();

        return view('produk.edit', compact('produk', 'supplier', 'supplier_selected', 'kategori', 'kategori_selected', 'satuan', 'satuan_selected'));
    }

    public function produk_saveedit(Request $request, $id){

        $request->validate([
            'beli' => 'lt:jual',
        ]);

        $produk = Product::find($id);

        $produk->satuan_id = $request->satuan;
        $produk->supplier_id = $request->supplier;
        $produk->category_id = $request->kategori;

        $path = $produk->foto;
        if ($request->hasFile('foto')) {
            $gambar = $request->file('foto');
            $destinationPath = 'foto';
            $filename = $destinationPath."/".$gambar->getClientOriginalName();
            $gambar->move($destinationPath, $filename);
            $path = $filename;
        }

        $produk->foto = $path;
        $produk->kode = $request->kode;
        $produk->nama_barang = $request->nama;
        $produk->stok = $request->stok;
        $produk->harga_beli = $request->beli;
        $produk->harga_jual = $request->jual;
        $produk->save();

        return Redirect::back();
    }

    public function produk_delete($id){

        Product::find($id)->delete();
        return redirect()->route('produk-list');
    }

    public function produk_sampah(){

        $produk = Product::onlyTrashed()->get();
        return view('produk.sampah', compact('produk'));
    }

    public function produk_restore($id){

        Product::withTrashed()->find($id)->restore();
        return Redirect::back();
    }

    public function produk_forcedelete($id){

        Product::withTrashed()->find($id)->forceDelete();
        return Redirect::back();
    }

    public function produk_restoreall(){

        Product::withTrashed()->restore();
        return Redirect::back();
    }

    public function produk_forcedeleteall(){

        Product::withTrashed()->forceDelete();
        return Redirect::back();
    }

<<<<<<< HEAD
    public function deleteChecked(Request $request)
    {
        Product::whereIn('id', [$request->ids])->delete();
        return response()->json(true);
=======
    public function getAllData(Request $request)
    {
        $produk = Product::query();
        if (isset($request->keyword)) {
            $produk->where('nama_barang', 'LIKE', '%'.$request->keyword.'%');
        }
        if (isset($request->last_id)) {
            $produk->where('id', '>', $request->last_id);
        }
        $produk = $produk->where('stok', '>', 0)
            ->orderby('id', 'asc')
            ->limit(6)
            ->get();
        return response()->json([
            'code' => 200,
            'message' => 'success',
            'data' => $produk
        ]);
>>>>>>> 03f980cb42847e8ce14bb1ad5866b8b7c1ef38d2
    }
}
