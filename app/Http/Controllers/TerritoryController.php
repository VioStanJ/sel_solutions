<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Arrondissement;
use App\Models\Commune;

class TerritoryController extends Controller
{
    public function getDepartement()
    {
        $deps = Departement::all();

        return response()->json(['success'=>true,'departements'=>$deps], 200);
    }

    public function getArrondissementByDepartement($departement)
    {
        $arrs = Arrondissement::where('departement','=',$departement)->get();

        return response()->json(['success'=>true,'arrondissements'=>$arrs], 200);
    }

    public function getCommuneByArrondissement($arrondissement)
    {
        $comms = Commune::where('arrondissement','=',$arrondissement)->get();

        return response()->json(['success'=>true,'communes'=>$comms], 200);
    }
}
