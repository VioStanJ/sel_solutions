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

    /**
     * Get the worker associated with the Consultation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function worker()
    {
        return $this->hasOne(User::class, 'id', 'worker_id');
    }
}
