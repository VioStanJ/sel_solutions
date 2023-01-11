<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientForm;
use App\Models\PatientHistory;
use App\Models\QuestionHistory;

class FormController extends Controller
{
    public function index(Request $request)
    {
        $forms = PatientForm::where('status','=',1)->get();

        foreach ($forms as $key => $value) {
            $value->questions = QuestionHistory::where("form_id",'=',$value->id)->where('status','=',1)->get();
        }

        return response()->json(['success'=>true,'forms'=>$forms], 200);
    }
}
