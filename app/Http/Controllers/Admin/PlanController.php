<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Customer;
use App\Models\User;
use App\Models\ClientPlan;
use Carbon\Carbon;

class PlanController extends Controller
{
    public function index()
{
        $plans = Plan::where('status','=',1)->get();

        return view('plans.index',compact(['plans']));
    }

    public function addCustomerPlan(Request $request)
    {
        $customer = User::find($request->user_id);

        if(empty($customer)){
            return redirect()->back()->withErrors(['Customer not found !']);
        }

        $plan = Plan::find($request->plan_id);

        if(empty($plan)){
            return redirect()->back()->withErrors(['Plan not found !']);
        }

        ClientPlan::where('client_id','=',$customer->id)->update(['status'=>false]);

        ClientPlan::create([
            'plan_id'=>$plan->id,
            'client_id'=>$customer->id,
            'expiration_date'=>Carbon::now()->addDays(30)
        ]);

        return redirect(route('admin.customers.manage',$customer->id));
    }

    public static function getUserPlan($id)
    {

    }
}
