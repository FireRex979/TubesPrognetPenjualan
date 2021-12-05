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
                            <div class="d-flex justify-content-between align-items-center container-product-{{ $item->id }}">
                                <div class="right-content">
                                    <p class="m-0 product-name">{{ $item->nama_barang }}</p>
                                    <p class="m-0 product-price-p">Rp. <span class="product-price">{{ $item->harga_jual }}</span></p>
                                </div>
                                <div class="left-content">
                                    <button class="btn btn-success btn-sm text-white" type="button" data-id="{{ $item->id }}" onclick="addCart(this)">
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
                <div class="form-group">
                    <label for="">Nama Pembeli</label>
                    <input type="text" class="form-control" id="nama-pembeli" value="" name="nama_pembeli">
                </div>
                <div class="form-group">
                    <label for="">Alamat Pembeli</label>
                    <textarea name="" id="alamat-pembeli" cols="30" class="form-control" rows="3"></textarea>
                </div>
                <div id="cart-container" class="w-100">

                </div>
                <div class="mt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <table>
                            <tr>
                                Total
                            </tr>
                            <tr class="px-3">:</tr>
                            <tr>Rp. <span id="total">0</span></tr>
                        </table>
                        <button class="btn btn-primary" type="button" onclick="payment(this)">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-none" id="product-cart">
    <div class="d-flex justify-content-between pt-2 pb-2" style="border-bottom: 1px solid #CACACA;">
        <input type="hidden" name="id_product" class="id-product" id="">
        <div class="product-details">
            <p class="m-0 product-name-container"></p>
            <p class="m-0 product-price-container-p">Rp. <span class="product-price-container"></span></p>
        </div>
        <div class="d-inline product-qty">
            <button class="btn btn-success btn-sm text-white" type="button" onclick="plus(this)">
                <i class="fas fa-plus"></i>
            </button>
            <input type="number" value="1" name="qty" class="input-qty" readonly style="width: 50px;">
            <button class="btn btn-success btn-sm text-white" type="button" onclick="minus(this)">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        addCart = (button) => {
            let product_name = $(button).parents().find('.container-product-' + $(button).data('id')).children('.right-content').children('.product-name').text();
            let product_price = $(button).parents().find('.container-product-' + $(button).data('id')).children('.right-content').children('.product-price-p').children('.product-price').text();
            $('#product-cart').children().children('.product-details').children('.product-name-container').text(product_name);
            $('#product-cart').children().children('.product-details').children('.product-price-container-p').text(product_price);
            $('#product-cart').children().children('.id-product').val($(button).data('id'));
            let cart = $('#product-cart').html();
            let total = parseInt($('#total').text()) + parseInt(product_price);
            $('#total').text(total);
            $('#cart-container').append(cart);
        }

        plus = (button) => {
            let value = parseInt($(button).parent().children('.input-qty').val());
            let price = parseInt($(button).parent().parent().children('.product-details').children('.product-price-container-p').text());
            value = value + 1;
            let total = parseInt($('#total').text()) + price;
            $(button).parent().children('.input-qty').val(value);
            $('#total').text(total);
        }

        minus = (button) => {
            let value = parseInt($(button).parent().children('.input-qty').val());
            let price = parseInt($(button).parent().parent().children('.product-details').children('.product-price-container-p').text());
            if (value > 1) {
                value = value - 1;
            } else {
                price = 0;
            }
            let total = parseInt($('#total').text()) - price;
            $(button).parent().children('.input-qty').val(value);
            $('#total').text(total);
        }

        payment = (button) => {
            if ($('#cart-container').children().length > 0) {
                let arr_id = [];
                let arr_qty = [];

                $('#cart-container').children().children('input[name="id_product"]').each(function(i, e) {
                    arr_id.push($(e).val());
                });
                $('#cart-container').children().children('.product-qty').children('input[name="qty"]').each(function(i, e) {
                    arr_qty.push($(e).val());
                });

                $.ajax({
                    url: '{{ route("penjualan.store") }}',
                    method: 'POST',
                    data: {
                        id_product: arr_id,
                        qty_product: arr_qty,
                        total: $('#total').text(),
                        nama_pembeli: $('#nama-pembeli').val(),
                        alamat: $('#alamat-pembeli').val()
                    },
                    success: function(response) {
                        if(response) {
                            alert("Transaksi Sukses!");
                            $('#alamat-pembeli').val('');
                            $('#nama-pembeli').val('');
                            $('#total').text('0');
                            $('#cart-container').empty();
                        }
                    }
                })
            } else {
                alert('Pilih Salah Satu Produk!');
            }
        }
    </script>
@endsection
