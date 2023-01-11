<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PatientForm;

class PatientHistoryS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PatientForm::create([
            'title'=>'Questionnaire Patient I',
            'description'=>'Questionnaire pour connaitre l\'historique d\'un Patient !',
        ]);
    }
}
