@extends('layouts/master')

@section('title', 'Block Produk')

@section('heading')
    
@endsection

@section('content')
@foreach($produk as $item)
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="m-0 font-weight-bold text-primary d-flex">List Produk</h6>
            @include('layouts/navbar_atas')
    </div>
<section id="slider">
<div class="row">
    <div class="col-lg-4 col-3">
        <div class="card">
            <div class="card-body profile-card">
                <center class="mt-2"> <img src="/{{ $item->foto }}" class="square" width="300">
                </center>
            </div>
            <div class="pagination d-flex justify-content-center">
                {{ $produk->onEachSide(1)->links() }}
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
                <a href="{{ route('produk-edit', $item->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                    class=" fas fa-edit fa-sm text-white-50"></i>  Edit Items</a>
            </div>
            <div class="card-body">
                
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Supplier</label>
                            <div class="col-md-12">
                                <select name="supplier" class="form-select shadow-none border-0 ps-0">
                                   <option selected value="{{ $item->id }}" class="form-check-input" id=""
                                        name="supplier">{{ $item->supplier->nama_supplier }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Kode Barang</label>
                            <div class="col-md-12">
                                {{ $item->kode }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Kategori</label>
                            <div class="col-md-12">
                                <select name="kategori" class="form-select shadow-none border-0 ps-0">
                                    <option selected value="{{ $item->id }}" class="form-check-input" id=""
                                        name="supplier">{{ $item->category->category_name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Nama Barang</label>
                            <div class="col-md-12">
                                {{ $item->nama_barang }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Stok</label>
                            <div class="col-md-12">
                                {{ $item->stok }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Satuan</label>
                            <div class="col-md-12">
                                <select name="satuan" class="form-select shadow-none border-0 ps-0">
                                    <option selected value="{{ $item->id }}" class="form-check-input" id=""
                                        name="supplier">{{ $item->satuan->satuan }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-md-12 mb-0">Harga Beli</label>
                            <div class="col-md-12 input-group-prepend">
                                {{ $item->harga_beli }}
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-md-12 mb-0">Harga Jual</label>
                            <div class="col-md-12 input-group-prepend">
                                {{ $item->harga_jual }}
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
</section>
@endforeach
@endsection
