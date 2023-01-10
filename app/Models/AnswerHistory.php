<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        "question_id","response","status"
    ];
}
