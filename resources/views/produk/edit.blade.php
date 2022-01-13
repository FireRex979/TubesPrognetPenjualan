@extends('layouts/master')

@section('title', 'Tambah Produk')

@section('heading')

@endsection

@section('content')

<!-- Page Heading -->
<form action="{{ route('produk-saveedit', $produk->id) }}" method="POST" enctype="multipart/form-data">
@csrf
<h1 class="h3 mb-2 text-gray-800">Edit Produk</h1>
<div class="row">
    <div class="col-lg-4 col-3">
        <div class="card">
            <div class="card-body profile-card">
                <center class="mt-2"> <img src="/{{ $produk->foto }}" class="square" width="300">
                    <div class="btn btn-light btn-icon-split mt-3">
                        <span class="icon text-gray-600">
                            <i class="">
                                <input id="foto" name="foto" type="file" class="form-control">
                            </i>
                        </span>
                        <span class="text">Update Foto</span>
                    </div>
                    @error('foto')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </center>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
            </div>
            <div class="card-body">
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Supplier</label>
                            <div class="col-md-12">
                                <select name="supplier" class="form-select shadow-none border-0 ps-0">
                                    @foreach($supplier as $item)
                                    <option value="{{ $item->id }}" class="form-check-input" id=""
                                        @if($item->id == $supplier_selected->id)
                                            {{'selected="selected"'}}
                                        @endif>
                                        {{ $item->nama_supplier }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('supplier')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Kode Barang</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="" value="{{ $produk->kode }}"
                                    class="form-control ps-0 form-control-line" name="kode"
                                    id="kode">
                            </div>
                            @error('kode')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Kategori</label>
                            <div class="col-md-12">
                                <select name="kategori" class="form-select shadow-none border-0 ps-0">
                                    @foreach($kategori as $item)
                                    <option value="{{ $item->id }}" class="form-check-input" id=""
                                    @if($item->id == $kategori_selected->id)
                                        {{'selected="selected"'}}
                                    @endif>
                                        {{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Nama Barang</label>
                            <div class="col-md-12">
                                <input type="text" value="{{ $produk->nama_barang }}" placeholder="Minyak eceran"
                                    class="form-control ps-0 form-control-line" name="nama"
                                    id="nama">
                            </div>
                            @error('nama')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Stok</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="" value="{{ $produk->stok }}"
                                    class="form-control ps-0 form-control-line" name="stok"
                                    id="stok">
                            </div>
                            @error('stok')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Satuan</label>
                            <div class="col-md-12">
                                <select name="satuan" class="form-select shadow-none border-0 ps-0">
                                    @foreach($satuan as $item)
                                    <option value="{{ $item->id }}" class="form-check-input" id=""
                                        name="satuan"
                                        @if($item->id == $satuan_selected->id)
                                            {{ 'selected="selected"'}}
                                        @endif>
                                            {{ $item->satuan }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('satuan')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-md-12 mb-0">Harga Beli</label>
                            <div class="col-md-12 input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                                    <input type="text" value="{{ $produk->harga_beli }}" placeholder=""
                                        class="form-control" name="beli"
                                        id="beli">
                                <span class="input-group-text">,00</span>
                            </div>
                            @error('beli')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-md-12 mb-0">Harga Jual</label>
                            <div class="col-md-12 input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                                    <input type="text" value="{{ $produk->harga_jual }}" placeholder=""
                                        class="form-control" name="jual"
                                        id="jual">
                                <span class="input-group-text">,00</span>
                            </div>
                            @error('jual')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Simpan
                                    Perubahan</button>
                                <a href="{{ route('produk-list') }}" class="btn btn-info mx-auto mx-md-0 text-white">Kembali</a>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
