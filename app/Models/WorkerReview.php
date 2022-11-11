<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','worker_id','point','note','review_date'
    ];
}
