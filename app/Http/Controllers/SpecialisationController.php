<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialisation;

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
}
