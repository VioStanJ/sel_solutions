<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\User;
use App\Models\CustomerAdress;

class CustomerController extends Controller
{
    public function search(Request $request,$name)
    {
        $role = Role::where('name','=','customer')->get()->first();

        $users = UserRole::where('role_id','=',$role->id)->get(['user_id']);

        $customers = User::whereIn('id',$users)->where('firstname','like','%'.$name.'%')->orWhere('lastname','like','%'.$name.'%')->get();

        foreach ($customers as $key => $value) {
            $adresse = CustomerAdress::where('customer_id','=',$value->id)->where('status','=',1)->get()->last();
            if(!empty($adresse)){
                $value->adress = $adresse->adresse.','.$adresse->oCommune->nom.' '.$adresse->oDepartement->nom;
            }
        }
        return response()->json(['success'=>true,'customers'=>$customers], 200);
    }
}
