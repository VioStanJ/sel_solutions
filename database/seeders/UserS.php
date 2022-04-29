<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname'=>'Vio-Stanoj',
            'lastname'=>'Guerrier',
            'email'=>'viostanojguerrier@gmail.com',
            'password'=>bcrypt('pass0011'),
            'role'=>'admin',
        ]);
    }
}
