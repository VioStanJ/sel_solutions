<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientForm;
use App\Models\PatientHistory;

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
        dd($id);
        # code...
    }

    public function update()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }
}
