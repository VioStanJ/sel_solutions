<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id','exam_id','result'
    ];

    public function exam()
    {
        return $this->hasOne(Exam::class, 'id', 'exam_id');
    }
}
