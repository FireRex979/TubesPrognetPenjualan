@extends('layouts/master')

@section('title', 'Produk List')

@section('heading')
    
@endsection

@section('content')
<a href="{{ route('produk-tambah') }}" class="d-none d-sm-inline-block btn btn-m btn-info shadow-sm mb-3" style="float: right;"><i
        class="fa-sm"></i>+ Tambah Produk</a>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">Berikut adalah daftar produk dari perusahaan. Anda diberikan fitur untuk dapat menambahkan, mengurangi, serta menghapus produk.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Suplier</th>
                                <th class="border-top-0">Kode Barang</th>
                                <th class="border-top-0">Kategori</th>
                                <th class="border-top-0">Nama Barang</th>
                                <th class="border-top-0">Stok</th>
                                <th class="border-top-0">Satuan</th>
                                <th class="border-top-0">Harga Beli</th>
                                <th class="border-top-0">Harga Jual</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Suplier</th>
                                <th class="border-top-0">Kode Barang</th>
                                <th class="border-top-0">Kategori</th>
                                <th class="border-top-0">Nama Barang</th>
                                <th class="border-top-0">Stok</th>
                                <th class="border-top-0">Satuan</th>
                                <th class="border-top-0">Harga Beli</th>
                                <th class="border-top-0">Harga Jual</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($produk as $item)                    
                            <tr>
                                <th scope="row">{{ $loop->index + 1}}</th>
                                <td>{{ $item->supplier_id }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->category_id }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>{{ $item->satuan_id }}</td>
                                <td>{{ $item->harga_beli }}</td>
                                <td>{{ $item->harga_jual }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
@endsection
