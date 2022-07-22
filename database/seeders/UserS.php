<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;

class UserS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new User();
        $client->firstname = 'Vio-Stanoj';
        $client->lastname = 'Guerrier';
        $client->phone = '+50937093675';
        $client->email = 'viostanojguerrier@gmail.com';
        $client->password = bcrypt('pass0011');

        $client->save();

        UserRole::create([
            'user_id'=>$client->id,
            'role_id'=>3
        ]);

    }
}
