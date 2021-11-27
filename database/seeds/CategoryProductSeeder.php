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
        ]);

        CategoryProduct::create([
            'category_name' => 'Celana',
        ]);

        CategoryProduct::create([
            'category_name' => 'Topi',
        ]);

        CategoryProduct::create([
            'category_name' => 'Sepatu',
        ]);
    }
}
