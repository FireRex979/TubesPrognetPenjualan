<?php

use App\Models\Satuan;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Satuan::create([
            'satuan' => 'Kilogram',
            'singkatan' => 'kg'
        ]);

        Satuan::create([
            'satuan' => 'Meter',
            'singkatan' => 'm'
        ]);

        Satuan::create([
            'satuan' => 'Pcs',
            'singkatan' => 'pcs'
        ]);
    }
}
