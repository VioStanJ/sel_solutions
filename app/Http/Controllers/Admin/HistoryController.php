<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientForm;
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

    public function destroy($id)
    {

    }

    public function delete($id)
    {
        QuestionHistory::where('id','=',$id)->update(['status'=>0]);
        return redirect()->back();
    }

    public function createQuestion(Request $request)
    {
        $request->validate([
            'form_id'=>'required|exists:patient_forms,id',
            "title"=>'required',
            "type"=>"required",
            "option"=>""
        ]);

        if($request->type == QuestionHistory::CUSTOM){
            $request->validate([
                'option'=>'required'
            ]);
        }

        QuestionHistory::create([
            'form_id'=>$request->form_id,
            'title'=>$request->title,
            'type'=>$request->type,
            'option'=>$request->option
        ]);

        return redirect()->back();
    }
}
