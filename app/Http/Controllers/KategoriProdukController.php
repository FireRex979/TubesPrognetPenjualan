<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class KategoriProdukController extends Controller
{
    public function index(){
        $contents = CategoryProduct::paginate(5);

        return view('kategori.index', compact('contents'));
    }

    public function add(){
        return view('kategori.add');
    }

    public function addSave(Request $request){
        CategoryProduct::create([
            'category_name'=>$request->category_name,
            'description'=>$request->description,
        ]);
        return redirect()->route('kategori.index')->with('success', 'Berhasil Menambahkan Data Kategori Produk');
    }

    public function edit($id){
        $content = CategoryProduct::where('id','=',$id)->get()->first();

        return view('kategori.edit', compact('content'));
    }

    public function editSave(Request $request, $id){
        $temp= CategoryProduct::where('id','=',$id)->get()->first();

        $temp->update([
            'category_name'=>$request->category_name,
            'description'=>$request->description,
        ]);
        return redirect()->route('kategori.index')->with('success', 'Berhasil Mengubah Data Kategori Produk');
    }

    public function delete($id){
        $data = CategoryProduct::find($id);

        // // dd($data);
        $data->delete();
        return redirect()->route('kategori.index')->with('success', 'Berhasil Menghapus Data Kategori Produk');
    }

    public function search(Request $request){
        $keyword = $_GET['search'];
        $contents = CategoryProduct::where('category_name', 'like', '%' . request('search') . '%')->get();
        return view('kategori.search', compact('contents'));
    }
}
