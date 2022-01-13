<?php

use App\Models\CategoryProduct;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryProduct::create([
            'category_name' => 'Baju',
            'description' => 'Pakaian penutup badan bagian atas.',
        ]);

        CategoryProduct::create([
            'category_name' => 'Celana',
            'description' => 'Pakaian penutup badan bagian bawah.',
        ]);

        CategoryProduct::create([
            'category_name' => 'Topi',
            'description' => 'Pakaian penutup kepala.',
        ]);

        CategoryProduct::create([
            'category_name' => 'Sepatu',
            'description' => 'Pakaian penutup kaki.',
        ]);
    }
}
