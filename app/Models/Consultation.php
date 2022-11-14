<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id','worker_id','note','status'
    ];

    public function results()
    {
        return $this->hasMany(ConsultationResult::class, 'consultation_id', 'id');
    }
}
