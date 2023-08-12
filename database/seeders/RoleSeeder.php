<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            // 'team_id'=>1,
            'name'=>'admin',
            'guard_name'=>'web'
        ]);
        Role::create([
            // 'team_id'=>2,
            'name'=>'manajer',
            'guard_name'=>'web'
        ]);
    }
}
