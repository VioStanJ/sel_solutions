<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInformation;
use App\Models\UserRole;
use App\Models\Role;
use App\Models\Plan;
use App\Models\ClientPlan;
use Carbon\Carbon;
use DB;
use App\Models\Departement;
use App\Models\CustomerAdress;

class CustomerController extends Controller
{
    public function index()
    {
        $role = Role::where('name','=','customer')->get()->first();

        $roles = UserRole::where('role_id','=',$role->id)->get(['user_id']);

        $customers = User::whereIn('id',$roles)->get();

        foreach ($customers as $key => $value) {
            $value->client = ClientPlan::where('client_id','=',$value->id)->where('status','=',1)->get()->first();
        }

        return view('customers.index',compact(['customers']));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lastname'=>'required',
            'firstname'=>'required',
            'phone'=>'required|unique:users,id',
            'number'=>'required'
        ]);

        DB::beginTransaction();

        $user = new User();
        $user->firstname = $request->firstname ;
        $user->lastname = $request->lastname ;
        $user->phone = $request->phone ;
        $user->password = bcrypt(time());

        if(!$user->save()){
            return redirect()->back()->withErrors(['Fail on save Customer !']);
        }

        UserInformation::create([
            'user_id'=>$user->id,
            'card_name'=>$request->type,
            'card_id'=>$request->number
        ]);

        UserRole::create([
            'user_id'=>$user->id,
            'role_id'=>Role::where('name','=','customer')->get()->first()->id
        ]);

        DB::commit();

        return redirect(route('admin.customers.index'));
    }

    public function show($id)
    {
        dd($id);
    }

    public function edit($id)
    {
        dd($id);
    }

    public function manage($id)
    {
        $customer = User::find($id);

        if(empty($customer)){
            return redirect()->back()->withErrors(['Client ontrouvable !']);
        }

        $plans = Plan::where('status','=',1)->get();

        $plan = ClientPlan::where('client_id','=',$customer->id)->where('status','=',1)->get()->last();

        $deps = Departement::all();

        $adresse = CustomerAdress::where('customer_id','=',$customer->id)->where('status','=',1)->get()->last();

        return view("customers.manage",compact('customer','plans','plan','deps','adresse'));
    }

    public function addAdress(Request $request)
    {
        $request->validate([
            'customer'=>'required',
            'departement'=>'required',
            'arrondissement'=>'required',
            'commune'=>'required',
            'adress'=>'required',
        ]);

        CustomerAdress::where('customer_id','=',$request->customer)->update(['status'=>false]);

        CustomerAdress::create([
            'customer_id'=>$request->customer,
            'departement'=>$request->departement,
            'arrondissement'=>$request->arrondissement,
            'commune'=>$request->commune,
            'adresse'=>$request->adress,
        ]);

        return redirect()->back();
    }
}
