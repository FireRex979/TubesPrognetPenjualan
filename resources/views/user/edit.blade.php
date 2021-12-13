@extends('layouts/master')

@section('title', 'Edit User')

@section('heading')
    
@endsection

@section('content')

<!-- Page Heading -->
<form action="{{ route('user.edit.save', $content->id) }}" method="POST">
@csrf
<h1 class="h3 mb-2 text-gray-800">Edit User</h1>
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
                        <input type="text" placeholder="Eg. Kilogram, Hektogram" value="{{ $content->name }}" class="form-control ps-0 form-control-line" name="name"
                            id="name">
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
                        <input type="text" placeholder="Eg. kg, hg"
                            class="form-control ps-0 form-control-line" value="{{ $content->email }}" name="email"
                            id="email">
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
                        <input type="text" placeholder="Eg. kg, hg"
                            class="form-control ps-0 form-control-line" value="" name="password"
                            id="password">
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
