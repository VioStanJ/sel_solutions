<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientForm;
use App\Models\PatientHistory;
use App\Models\QuestionHistory;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $forms = PatientForm::where('status','=',1)->get();

        return view('forms.index',compact('forms'));
    }

    public function create()
    {
        # code...
    }

    public function show($id)
    {
        $form = PatientForm::find($id)->where('status','=',1)->first();

        $questions = QuestionHistory::where("form_id",'=',$id)->where('status','=',1)->get();

        return view('forms.show',compact('form','questions'));
    }

    public function update()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }

    public function createQuestion(Request $request)
    {
        # code...
    }
}
