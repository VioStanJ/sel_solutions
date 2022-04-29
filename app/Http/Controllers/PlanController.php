<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{

    public function index()
    {
        $plans = Plan::where('status','=',1)->get();

        return response()->json(['success'=>true,'plans'=>$plans], 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return response()->json(['success'=>true,'plan'=>Plan::find($id)], 200);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
