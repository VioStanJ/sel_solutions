<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkerReview;
use Carbon\Carbon;

class WorkerController extends Controller
{
    public function addReview(Request $request)
    {
        $request->validate([
            'worker_id'=>'required|exists:users,id',
            'point'=>'required',
            'note'=>'required'
        ]);

        WorkerReview::create([
            'user_id'=>$request->user()->id,
            'worker_id'=>$request->worker_id,
            'point'=>$request->point,
            'note'=>$request->note,
            'review_date'=>Carbon::now()
        ]);
        return response()->json(['success'=>true,'message'=>'Mèsi paske ou chwazi nou !'], 200);

    }
}
