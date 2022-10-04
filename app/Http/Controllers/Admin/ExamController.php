<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::where('status','=',true)->get();

        return view('exams.index',compact(['exams']));
    }

    public function create()
    {
        return view('exams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'non'=>'required',
            'active'=>'required',
            'from'=>'required',
            'val'=>'required'
        ]);

        $exam = new Exam();

        $exam->name = $request->name ;
        $exam->non = $request->non ;
        $exam->normal_from = $request->from ;
        $exam->normal_to = $request->to ;
        $exam->active = $request->active ;
        $exam->created_by = $request->user()->id ;
        $exam->val = $request->val;

        if(!$exam->save()){
            return redirect()->back()->withErrors(['Enregistrement echoué !']);
        }

        return redirect(route('admin.exams.index'));
    }

    public function edit(Request $request,$id)
    {
        $exam = Exam::find($id);

        return view('exams.edit',compact('exam'));
    }

    public function update(Request $request,$exam)
    {
        $exam = Exam::find($exam);

        if(empty($exam)){
            return redirect()->back()->withErrors(['Examen non trouvé !']);
        }

        $exam->name = $request->name ;
        $exam->non = $request->non ;
        $exam->normal_from = $request->from ;
        $exam->normal_to = $request->to ;
        $exam->active = $request->active ;
        $exam->created_by = $request->user()->id ;
        $exam->val = $request->val;

        if(!$exam->save()){
            return redirect()->back()->withErrors(['Enregistrement echoué !']);
        }

        return redirect(route('admin.exams.index'));
    }

    public function show($id)
    {
        # code...
    }
}
