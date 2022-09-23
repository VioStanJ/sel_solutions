<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Role;

class UserS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->firstname = 'Vio-Stanoj';
        $admin->lastname = 'Guerrier';
        $admin->phone = '+50937093675';
        $admin->email = 'viostanojguerrier@gmail.com';
        $admin->password = bcrypt('pass0011');

        $admin->save();

        UserRole::create([
            'user_id'=>$admin->id,
            'role_id'=>Role::where('name','=','admin')->get()->first()->id
        ]);

    }
}
