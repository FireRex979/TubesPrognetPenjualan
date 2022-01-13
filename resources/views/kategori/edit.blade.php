@extends('layouts/master')

@section('title', 'Edit Kategori Produk')

@section('heading')

@endsection

@section('content')

<!-- Page Heading -->
<form action="{{ route('kategori.edit.save', $content->id) }}" method="POST">
@csrf
<h1 class="h3 mb-2 text-gray-800">Edit Master Data Kategori Produk</h1>
<div class="row">

    <!-- DataTales Example -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Master Data Kategori Produk</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Kategori Produk</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Eg. Baju, Celana" value="{{ $content->category_name }}" class="form-control ps-0 form-control-line" name="category_name"
                            id="category_name" required>
                    </div>
                    @error('category_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="example-email" class="col-md-12">Deskripsi</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Eg. Pakaian adalah..." value="{{ $content->description }}" class="form-control ps-0 form-control-line" name="description"
                            id="description" required>
                    </div>
                    @error('description')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Simpan Perubahan</button>
                        <a href="{{ route('kategori.index') }}" class="btn btn-info mx-auto mx-md-0 text-white">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
