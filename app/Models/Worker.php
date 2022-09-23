<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','code','formation',
        'bio','photo','status','blocked'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function information()
    {
        return $this->hasOne(UserInformation::class, 'user_id', 'user_id');
    }
}
