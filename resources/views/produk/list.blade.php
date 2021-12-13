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
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                <h6 class="m-0 font-weight-bold text-primary d-flex">List Produk</h6>
                    @include('layouts/navbar_atas')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="border-top-0" style="text-align: center">No</th>
                                <th class="border-top-0" style="text-align: center">Supplier</th>
                                <th class="border-top-0" style="text-align: center">Kode Barang</th>
                                <th class="border-top-0" style="text-align: center">Kategori</th>
                                <th class="border-top-0" style="text-align: center">Nama Barang</th>
                                <th class="border-top-0" style="text-align: center">Stok</th>
                                <th class="border-top-0" style="text-align: center">Satuan</th>
                                <th class="border-top-0" style="text-align: center">Harga Beli</th>
                                <th class="border-top-0" style="text-align: center">Harga Jual</th>
                                <th class="border-top-0" style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="border-top-0" style="text-align: center">No</th>
                                <th class="border-top-0" style="text-align: center">Supplier</th>
                                <th class="border-top-0" style="text-align: center">Kode Barang</th>
                                <th class="border-top-0" style="text-align: center">Kategori</th>
                                <th class="border-top-0" style="text-align: center">Nama Barang</th>
                                <th class="border-top-0" style="text-align: center">Stok</th>
                                <th class="border-top-0" style="text-align: center">Satuan</th>
                                <th class="border-top-0" style="text-align: center">Harga Beli</th>
                                <th class="border-top-0" style="text-align: center">Harga Jual</th>
                                <th class="border-top-0" style="text-align: center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($produk as $item)                    
                            <tr>
                                <th scope="row">{{ $loop->index + 1 + ($produk->currentPage() - 1) * 10}}</th>
                                <td>{{ $item->supplier->nama_supplier }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->category->category_name }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>{{ $item->satuan->satuan }}</td>
                                <td>{{ $item->harga_beli }}</td>
                                <td>{{ $item->harga_jual }}</td>
                                <td width="160px">
                                    <form action="{{ route('produk-delete', $item->id) }}" method="POST">
                                        <div class="" role="group" aria-label="Basic example">
                                        @csrf
                                        <a type="button" class="btn btn-success" href="{{ route('produk-edit', $item->id) }}">Edit</a>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('apakah kamu yakin menghapus data ini ?')">Hapus</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                <div class="d-flex justify-content-center">
                {!! $produk->links() !!}
            </div>
            </div>
        </div>
@endsection
