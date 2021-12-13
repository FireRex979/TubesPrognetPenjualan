@extends('layouts/master')

@section('title', 'Tambah User')

@section('heading')
    
@endsection

@section('content')

<!-- Page Heading -->
<form action="{{ route('user.add.save') }}" method="POST" enctype="multipart/form-data">
@csrf
<h1 class="h3 mb-2 text-gray-800">Tambah User</h1>

<div class="row">
    <!-- DataTales Example -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail User</h6>
            </div>
            <div class="card-body">
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Masukkan Nama" value=""
                                    class="form-control ps-0 form-control-line" name="name"
                                    id="name" required>
                            </div>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Masukkan Email" value=""
                                    class="form-control ps-0 form-control-line" name="email"
                                    id="email" required>
                            </div>
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" placeholder="Masukkan Password" value=""
                                    class="form-control ps-0 form-control-line" name="password"
                                    id="password" required>
                            </div>
                            @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Simpan
                                    Penambahan</button>
                                <a href="{{ route('user.index') }}" class="btn btn-info mx-auto mx-md-0 text-white">Kembali</a>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
