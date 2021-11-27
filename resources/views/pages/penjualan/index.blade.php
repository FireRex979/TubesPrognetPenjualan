@extends('layouts/master')

@section('title', 'Penjualan')

@section('content')
<div class="row">
    <div class="col-md-8 col-12 mb-3">
        <div class="row">
            @foreach ($product as $item)
                <div class="col-md-4 col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="https://via.placeholder.com/400x250.png" style="border-radius: 10px;" width="100%" alt="">
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="m-0 product-name">{{ $item->nama_barang }}</p>
                                    <p class="m-0">Rp. <span class="product-price">{{ $item->harga_jual }}</span></p>
                                </div>
                                <div>
                                    <button class="btn btn-success btn-sm text-white" type="button" onclick="addCart(this)">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-4 col-12 mb-3">
        <div class="card">
            <div class="card-body" style="height: 70vh; overflow-y: scroll;">
                <div class="d-flex justify-content-between pb-2" style="border-bottom: 1px solid #CACACA;">
                    <div>
                        <p class="m-0 product-name">{{ $item->nama_barang }}</p>
                        <p class="m-0">Rp. <span class="product-price">{{ $item->harga_jual }}</span></p>
                    </div>
                    <div class="d-inline">
                        <button class="btn btn-success btn-sm text-white" type="button" onclick="plus(this)">
                            <i class="fas fa-plus"></i>
                        </button>
                        <input type="number" value="1" readonly style="width: 50px;">
                        <button class="btn btn-success btn-sm text-white" type="button" onclick="minus(this)">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="mt-4">
                    <table>
                        <tr>
                            Total
                        </tr>
                        <tr class="px-3">:</tr>
                        <tr>Rp. <span id="total">-</span></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
