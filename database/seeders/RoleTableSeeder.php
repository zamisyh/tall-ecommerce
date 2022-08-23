<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [ 'name' => 'admin', 'guard_name' => 'web'],
            [ 'name' => 'customer', 'guard_name' => 'web'],
            [ 'name' => 'seller', 'guard_name' => 'web']
        ];

        Role::insert($role);

    }
}
