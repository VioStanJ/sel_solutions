<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAdress extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id','departement','arrondissement','commune','adresse','status'
    ];
}