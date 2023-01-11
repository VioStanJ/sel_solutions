<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionHistory extends Model
{
    use HasFactory;

    public const TEXT = 0;
    public const DATE = 1;
    public const NUMBER = 2;
    public const YES_NO = 3;
    public const EMAIL = 4;
    public const CASE_TO_CASE = 5;
    public const CUSTOM = 6;

    protected $fillable = [
        "form_id","title","type",
        "option","status"
    ];
}
