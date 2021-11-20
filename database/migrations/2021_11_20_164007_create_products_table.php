<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satuan_id');
            $table->foreignId('supplier_id');
            $table->foreignId('category_id');
            $table->foreign('satuan_id')->references('id')->on('satuans');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('category_id')->references('id')->on('category_products');
            $table->string('kode');
            $table->string('nama_barang');
            $table->integer('stok')->default(0);
            $table->double('harga_beli')->default(0);
            $table->double('harga_jual');
            $table->string('foto');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
