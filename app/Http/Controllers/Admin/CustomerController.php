<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = [];

        return view('customers.index',compact(['customers']));
    }

    public function create()
    {
        return view('customers.create');
    }
}
