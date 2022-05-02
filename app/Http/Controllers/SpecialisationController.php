<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialisation;
use App\Models\WorkerSpecialisation;

class SpecialisationController extends Controller
{
    public function index()
    {
        $specs = Specialisation::where('status','=',1)->get();

        return response()->json(['success'=>true,'specialisations'=>$specs], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $spec = Specialisation::create($request->only(['name','description']));

        return response()->json(['success'=>true,'specialisation'=>$spec], 200);
    }

    public function show($id)
    {
        return response()->json(['success'=>true,'specialisation'=>Specialisation::find($id)], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $spec = Specialisation::find($id);

        if(empty($spec)){
            return response()->json(['success'=>false,'message'=>'Specialisation not found !'], 200);
        }

        $spec->update($request->only(['name','description']));

        return response()->json(['success'=>true,'specialisation'=>$spec], 200);
    }

    public function destroy($id)
    {
        $spec = Specialisation::find($id);

        if(empty($spec)){
            return response()->json(['success'=>false,'message'=>'Specialisation not found !'], 200);
        }

        $spec->status = 0;
        $spec->save();

        return response()->json(['success'=>true,'message'=>'Deleted !'], 200);
    }

    public function add(Request $request)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'specialisation_id'=>'required|exists:specialisations,id',
        ]);

        $spec = WorkerSpecialisation::create($request->only(['user_id','specialisation_id']));

        return response()->json(['success'=>true,'message'=>'Added !'], 200);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'id'=>'required|exists:worker_specialisations,id'
        ]);

        $spec = WorkerSpecialisation::find($request->id);
        $spec->status = 0;
        $spec->save();

        return response()->json(['success'=>true,'message'=>"Removed !"], 200);
    }
}
