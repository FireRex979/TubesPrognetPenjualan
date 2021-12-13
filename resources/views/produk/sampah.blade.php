@extends('layouts/master')

@section('title', 'Sampah')

@section('heading')
    
@endsection

@section('content')

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
                <div class="card-header py-3 d-sm-flex justify-content-end mb-2">
                    <form action="{{ route('produk-forcedeleteall') }}" method="POST">
                        <div class="" role="group" aria-label="Basic example">
                        @csrf
                            <a href="{{ route('produk-restoreall') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2"><i
                            class="fa-sm text-white-50"></i>  Restore All</a>
                            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                                onclick="return confirm('apakah kamu yakin menghapus data ini ?')">
                                <i class="fa-sm text-white-50"></i>
                                    Force Delete All</button>
                        </div>
                    </form>
                </div>
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
                                <th scope="row">{{ $loop->index + 1}}</th>
                                <td>{{ $item->supplier->nama_supplier }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->category->category_name }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>{{ $item->satuan->satuan }}</td>
                                <td>{{ $item->harga_beli }}</td>
                                <td>{{ $item->harga_jual }}</td>
                                <td width="250px">
                                    <form action="{{ route('produk-forcedelete', $item->id) }}" method="POST">
                                        <div class="" role="group" aria-label="Basic example">
                                        @csrf
                                        <a type="button" class="btn btn-success" href="{{ route('produk-restore', $item->id) }}">Restore</a>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('apakah kamu yakin menghapus data ini ?')">Force Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
@endsection
