@extends('layouts/master')

@section('title', 'User Management')

@section('heading')
    
@endsection

@section('content')
<a href="{{ route('user.add') }}" class="d-none d-sm-inline-block btn btn-m btn-info shadow-sm mb-3" style="float: right;"><i
        class="fa-sm"></i>+ Tambah User Management</a>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">Berikut adalah User Management. Anda diberikan fitur untuk dapat menambahkan, mengurangi, serta menghapus User Management.</p>
        @if(session()->has('success'))
        <div class="alert alert-success mt-2">
            {{ session()->get('success') }}
        </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                <h6 class="m-0 font-weight-bold text-primary d-flex">List User Management</h6>
                    {{-- <div class="btn-group">
                        <a href="{{ route('produk-block') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2"><i
                            class="fas fa-square fa-sm text-white-50"></i>  Block Items</a>
                        <a href="{{ route('produk-list') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-list fa-sm text-white-50"></i>  List Items</a>
                    </div> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Email</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Email</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($contents as $item)                    
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <form action="{{ route('user.delete', $item->id) }}" method="POST">
                                        <div class="" role="group" aria-label="Basic example">
                                        @csrf
                                        <a type="button" class="btn btn-success" href="{{ route('user.edit', $item->id) }}">Edit</a>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('apakah kamu yakin menghapus data ini ?')">Delete</button>
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
