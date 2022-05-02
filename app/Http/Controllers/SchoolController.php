<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\WorkerSchool;
use Carbon\Carbon;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::where('status','=',1)->get();

        return response()->json(['success'=>true,'schools'=>$schools], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $school = School::create($request->only(['name','description']));

        return response()->json(['success'=>true,'school'=>$school], 200);
    }

    public function show($id)
    {
        return response()->json(['success'=>true,'school'=>School::find($id)], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $school = School::find($id);

        if(empty($school)){
            return response()->json(['success'=>false,'message'=>'School not found !'], 200);
        }

        $school->update($request->only(['name','description']));

        return response()->json(['success'=>true,'school'=>$school], 200);
    }

    public function destroy($id)
    {
        $school = School::find($id);

        if(empty($school)){
            return response()->json(['success'=>false,'message'=>'School not found !'], 200);
        }

        $school->status = 0;
        $school->save();

        return response()->json(['success'=>true,'message'=>'Deleted !'], 200);
    }

    public function add(Request $request)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'school_id'=>'required|exists:schools,id',
            'from'=>'required|date',
            'to'=>'required|date'
        ]);

        $work = WorkerSchool::create([
            'user_id'=>$request->user_id,
            'school_id'=>$request->school_id,
            'from'=>Carbon::createFromFormat('d-m-Y',  $request->from),
            'to'=>Carbon::createFromFormat('d-m-Y',  $request->to) ,
            'comments'=>$request->comments
        ]);

        return response()->json(['success'=>true,'message'=>'Added !'], 200);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'id'=>'required|exists:worker_schools,id'
        ]);

        $spec = WorkerSchool::find($request->id);
        $spec->status = 0;
        $spec->save();

        return response()->json(['success'=>true,'message'=>"Removed !"], 200);
    }
}
