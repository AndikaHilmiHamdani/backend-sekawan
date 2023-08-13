<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin= User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('12345678'),
        ]);
        $admin ->assignRole('admin'); 
        
        $driver= User::create([
            'name'=>'driver',
            'email'=>'driver@driver.com',
            'password'=>Hash::make('12345678'),
        ]);
        $driver ->assignRole('driver'); 
        
        $manajer= User::create([
            'name'=>'manajer',
            'email'=>'manajer@manajer.com',
            'password'=>Hash::make('12345678'),
        ]);
        $manajer ->assignRole('manajer');
    }
}
