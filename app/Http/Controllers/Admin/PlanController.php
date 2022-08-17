<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::where('status','=',1)->get();

        return view('plans.index',compact(['plans']));
    }

    public function saveCustomerPlan(Request $request)
    {
        # code...
    }

    public static function getUserPlan($id)
    {

    }
}
