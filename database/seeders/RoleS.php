<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id'=>1,
            'name'=>'admin'
        ]);

        Role::create([
            'id'=>2,
            'name'=>'worker'
        ]);

        Role::create([
            'id'=>3,
            'name'=>'customer'
        ]);
    }
}
