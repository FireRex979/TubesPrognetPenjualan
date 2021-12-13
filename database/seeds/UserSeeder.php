<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$lf7q89IFmMqr1n2NgyEWmeYa.nEwGEPgOcf4q2LKTmAuonaCjAKPm'
        ]);
    }
}
