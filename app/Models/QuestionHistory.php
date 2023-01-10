<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        "history_id","title","type",
        "option","status"
    ];
}
