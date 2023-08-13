<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Transaction::create([
            'manajer_name' => 3,
            'car_name'=>1,
            'driver_name'=>2,
            'status'=>'menunggu driver'
        ]);
        Transaction::create([
            'manajer_name' => 3,
            'car_name'=>1,
            'driver_name'=>2,
            'status'=>'menunggu manajer'
        ]);
    }
}
