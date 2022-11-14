<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Consultation;
use App\Models\ConsultationResult;
use DB;

class ExamController extends Controller
{
    public function get(Request $request)
    {
        $exams = Exam::where('status','=',1)->get();

        return response()->json(['success'=>true,'exams'=>$exams], 200);
    }

    public function save(Request $request)
    {
        $request->validate([
            'customer_id'=>'required|exists:users,id',
            'exams'=>'required',
            'note'=>''
        ]);

        DB::beginTransaction();

        $cons = new Consultation();

        $cons->customer_id = $request->customer_id;
        $cons->worker_id = $request->user()->id;
        $cons->note = $request->note;

        if(!$cons->save()){
            DB::rollBack();
            return response()->json(['success'=>false,'message'=>'Echec d\'enregistrement !'], 200);
        }

        $exams = json_decode($request->exams,true);

        if(count($exams) == 0){
            DB::rollBack();
            return response()->json(['success'=>false,'message'=>'Aucun examens !'], 200);
        }

        info($exams);

        foreach ($exams as $key => $value) {
            ConsultationResult::create([
                'consultation_id'=>$cons->id,
                'exam_id'=>$value['exam_id'],
                'result'=>$value['result'],
            ]);
        }

        DB::commit();
        return response()->json(['success'=>true,'message'=>'Merci !'], 200);
    }
}
