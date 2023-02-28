@extends('layouts/master')

@section('title', 'Penjualan')

@section('content')
<div class="row">
    <div class="col-12 mb-5">
        <div class="input-group w-50">
            <input type="text" id="search-produk" class="form-control bg-white border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" onclick="searchProduk()" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-12 mb-3">
        <div class="row" id="produk-container">

        </div>
        <div class="w-100 text-center">
            <input type="hidden" id="last-id-produk" value="0">
            <button class="btn btn-primary" onclick="getDataProduk()" type="button">Load More</button>
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
        <input type="hidden" name="stok" class="stok-product" id="">
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
            <button class="btn btn-sm btn-danger ml-3" onclick="deletecCart(this)" type="button"><i class="fa fa-trash"></i></button>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            getDataProduk();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        generateProdukTemplate = (data) => {
            let string = '<div class="col-md-4 col-12 mb-3">'+
                '<div class="card">'+
                    '<div class="card-body">'+
                        '<img src="/'+data.foto+'" style="border-radius: 10px;" width="100%" alt="">'+
                        '<hr>'+
                        '<div id="product-'+data.id+'" class="d-flex justify-content-between align-items-center container-product-'+data.id+'">'+
                            '<div class="right-content">'+
                                '<p class="m-0 product-name">'+data.nama_barang+'</p>'+
                                '<p class="m-0 product-price-p">Rp. <span class="product-price">'+data.harga_jual+'</span></p>'+
                                '<p class="m-0 product-stok"">Stok: <span class="product-stok">'+data.stok+'</span></p>'+
                            '</div>'+
                            '<div class="left-content">'+
                                '<button class="btn btn-success btn-sm text-white" type="button" data-id="'+data.id+'" data-stok="'+data.stok+'" onclick="addCart(this)">'+
                                    '<i class="fas fa-cart-plus"></i>'+
                                '</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';
            return string;
        }

        searchProduk = () => {
            $.ajax({
                url: '{{ route("product.get-all-data") }}',
                method: 'GET',
                data: {
                    keyword: $('#search-produk').val(),
                },
                success: function (response) {
                    $('#produk-container').empty();
                    $(response.data).each(function (i, item) {
                        let template = generateProdukTemplate(item);
                        $('#produk-container').append(template);
                        $('#last-id-produk').val(item.id);
                    });
                }
            })
        }

        getDataProduk = () => {
            $.ajax({
                url: '{{ route("product.get-all-data") }}',
                method: 'GET',
                data: {
                    keyword: $('#search-produk').val(),
                    last_id: $('#last-id-produk').val(),
                },
                success: function (response) {
                    $(response.data).each(function (i, item) {
                        let template = generateProdukTemplate(item);
                        $('#produk-container').append(template);
                        $('#last-id-produk').val(item.id);
                    });
                }
            })
        }

        addCart = (button) => {
            if(parseInt($(button).data('stok')) > 0) {
                let id_match = $('#cart-container').children().children('input[value="'+$(button).data('id')+'"]').val();
                let product_name = $(button).parents().find('.container-product-' + $(button).data('id')).children('.right-content').children('.product-name').text();
                let product_price = $(button).parents().find('.container-product-' + $(button).data('id')).children('.right-content').children('.product-price-p').children('.product-price').text();
                if (id_match != $(button).data('id')) {
                    $('#product-cart').children().children('.product-details').children('.product-name-container').text(product_name);
                    $('#product-cart').children().children('.product-details').children('.product-price-container-p').text(product_price);
                    $('#product-cart').children().children('.id-product').val($(button).data('id'));
                    $('#product-cart').children().children('.stok-product').val($(button).data('stok'));
                    let cart = $('#product-cart').html();
                    let total = parseInt($('#total').text()) + parseInt(product_price);
                    $('#total').text(total);
                    $('#cart-container').append(cart);
                } else {
                    let value_qty = parseInt($('#cart-container').children().children('input[value="'+$(button).data('id')+'"]').siblings('.product-qty').children('input').val());
                    value_qty = value_qty + 1;
                    let total = parseInt($('#total').text()) + parseInt(product_price);
                    $('#total').text(total);
                    $('#cart-container').children().children('input[value="'+$(button).data('id')+'"]').siblings('.product-qty').children('input').val(value_qty);
                }
            } else {
                alert('Stok Produk ini Habis!');
            }
        }

        deletecCart = (button) => {
            let value = parseInt($(button).parent().children('.input-qty').val());
            let price = parseInt($(button).parent().parent().children('.product-details').children('.product-price-container-p').text());
            let subtotal = value * price;
            let total = parseInt($('#total').text()) - subtotal;
            $(button).parent().parent().remove();
            $('#total').text(total);
        }

        plus = (button) => {
            let value = parseInt($(button).parent().children('.input-qty').val());
            let price = parseInt($(button).parent().parent().children('.product-details').children('.product-price-container-p').text());
            let max_stok = parseInt($(button).parent().parent().children('input[name="stok"]').val());
            if (value < max_stok) {
                value = value + 1;
                let total = parseInt($('#total').text()) + price;
                $(button).parent().children('.input-qty').val(value);
                $('#total').text(total);
            }
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
                        if(response.success) {
                            for(let i = 0; i < response.data_penjualan.length; i++) {
                                let new_class = `#product-${response.data_penjualan[i]['produk_id']}`;
                                console.log(response.data_penjualan[i]['qty'])
                                let new_stok = parseInt($(new_class).children('.left-content').children('button').data('stok')) - response.data_penjualan[i]['qty'];
                                $(new_class).children('.left-content').children('button').attr('data-stok', new_stok);
                            }
                            $('#alamat-pembeli').val('');
                            $('#nama-pembeli').val('');
                            $('#total').text('0');
                            $('#cart-container').empty();
                            alert("Transaksi Sukses!");
                        }
                    }
                })
            } else {
                alert('Pilih Salah Satu Produk!');
            }
        }
    </script>
@endsection
