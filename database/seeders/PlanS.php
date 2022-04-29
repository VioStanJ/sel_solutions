<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name'=>'Starter',
            'price'=>34
        ]);

        Plan::create([
            'name'=>'Premium',
            'price'=>63
        ]);

        Plan::create([
            'name'=>'Gold',
            'price'=>122
        ]);
    }
}
