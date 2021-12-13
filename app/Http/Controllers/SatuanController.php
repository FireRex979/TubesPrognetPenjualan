<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index(){
        $contents = Satuan::all();

        return view('satuan.index', compact('contents'));
    }

    public function add(){
        return view('satuan.add');
    }
    
    public function addSave(Request $request){
        Satuan::create([
            'satuan'=>$request->satuan,
            'singkatan'=>$request->singkatan
        ]);
        return redirect()->route('satuan.index')->with('success', 'Berhasil Menambahkan Master Data Satuan');
    }

    public function edit($id){
        $content = Satuan::where('id','=',$id)->get()->first();

        return view('satuan.edit', compact('content'));
    }

    public function editSave(Request $request, $id){
        $temp= Satuan::where('id','=',$id)->get()->first();

        $temp->update([
            'satuan'=>$request->satuan,
            'singkatan'=>$request->singkatan
        ]);
        return redirect()->route('satuan.index')->with('success', 'Berhasil Mengubah Master Data Satuan');
        
    }

    public function delete($id){
        $data = Satuan::find($id);
        

        // // dd($data);
        $data->delete();
        return redirect()->route('satuan.index')->with('success', 'Berhasil Menghapus Master Data Satuan');
    }
}
