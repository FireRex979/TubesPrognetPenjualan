<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'satuan_id' => 1,
            'supplier_id' => 1,
            'category_id' => 1,
            'kode' => 'BJU-001',
            'nama_barang' => 'Baju Kemeja A',
            'stok' => 100,
            'harga_beli' => 80000,
            'harga_jual' => 100000,
            'foto' => 'default.png'
        ]);

        Product::create([
            'satuan_id' => 2,
            'supplier_id' => 2,
            'category_id' => 2,
            'kode' => 'BJU-002',
            'nama_barang' => 'Baju Kemeja B',
            'stok' => 100,
            'harga_beli' => 90000,
            'harga_jual' => 120000,
            'foto' => 'default.png'
        ]);

        Product::create([
            'satuan_id' => 1,
            'supplier_id' => 2,
            'category_id' => 1,
            'kode' => 'BJU-002',
            'nama_barang' => 'Baju Kemeja C',
            'stok' => 100,
            'harga_beli' => 50000,
            'harga_jual' => 70000,
            'foto' => 'default.png'
        ]);
    }
}
