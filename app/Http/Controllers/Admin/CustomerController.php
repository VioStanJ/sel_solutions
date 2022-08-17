<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInformation;
use App\Models\UserRole;
use App\Models\Role;

class CustomerController extends Controller
{
    public function index()
    {
        $role = Role::where('name','=','customer')->get()->first();

        $roles = UserRole::where('role_id','=',$role->id)->get(['user_id']);

        $customers = User::whereIn('id',$roles)->get();

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

        $user = new User();
        $user->firstname = $request->firstname ;
        $user->lastname = $request->lastname ;
        $user->phone = $request->phone ;
        $user->password = bcrypt(time());

        if(!$user->save()){
            return redirect()->back()->withErrors(['Fail on save Customer !']);
        }

        UserInformation::create([
            'card_name'=>$request->type,
            'card_id'=>$request->number
        ]);

        UserRole::create([
            'user_id'=>$user->id,
            'role_id'=>Role::where('name','=','customer')->get()->first()->id
        ]);

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

        return view("customers.manage",compact('customer'));
    }
}
