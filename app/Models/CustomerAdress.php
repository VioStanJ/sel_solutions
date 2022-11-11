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

    /**
     * Get the Departement associated with the CustomerAdress
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function oDepartement()
    {
        return $this->hasOne(Departement::class, 'id', 'departement');
    }

    public function oCommune()
    {
        return $this->hasOne(Commune::class, 'id', 'commune');
    }

    public function oArrondissement()
    {
        return $this->hasOne(Arrondissement::class, 'id', 'arrondissement');
    }
}
