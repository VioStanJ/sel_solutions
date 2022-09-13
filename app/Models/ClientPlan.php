<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPlan extends Model
{
    use HasFactory;

    protected $fillable = ['plan_id','client_id','expiration_date','status'];

    /**
     * Get the plan associated with the ClientPlan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function plan()
    {
        return $this->hasOne(Plan::class, 'id', 'plan_id');
    }
}
