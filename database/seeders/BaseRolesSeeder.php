<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class BaseRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'competitor']);
    }
}
