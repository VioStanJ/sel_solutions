<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();

        return view('workers.index',compact('workers'));
    }

    public function create()
    {
        return view('workers.create');
    }
}
