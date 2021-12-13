@extends('layouts/master')

@section('title', 'Penjualan')

@section('content')
<div class="row mb-3">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Nilai Asset</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($total_harga_beli, 2, ',', '.') }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Keuntungan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($total_keuntungan, 2, ',', '.') }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Stok Tersedia</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_stok }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_user }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-12 mb-3">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title">Grafik Penjualan Perbulan Tahun {{ date('Y') }}</h5>
            </div>
            <div class="card-body">
                <canvas height="400px" id="chart-penjualan"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-12 mb-3">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title">Grafik Penjualan Kategori</h5>
            </div>
            <div class="card-body">
                <canvas height="400px" id="chart-penjualan-kategori"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
