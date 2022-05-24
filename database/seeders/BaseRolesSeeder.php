<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class BaseRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'competitor']);
    }
}
