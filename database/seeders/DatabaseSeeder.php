<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RoleS::class);
        // $this->call(PlanS::class);
        // $this->call(UserS::class);
        // $this->call(DepartementSeed::class);
        // $this->call(ArrondissementSeed::class);
        // $this->call(CommuneSeed::class);
        $this->call(PatientHistoryS::class);
    }
}
