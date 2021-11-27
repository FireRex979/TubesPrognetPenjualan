<?php

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'nama_supplier' => 'PT Jaya Abadi',
            'alamat' => 'Singaraja',
            'no_telepon' => '0872390200'
        ]);

        Supplier::create([
            'nama_supplier' => 'PT Cahya',
            'alamat' => 'Singaraja',
            'no_telepon' => '0872390200'
        ]);
    }
}
