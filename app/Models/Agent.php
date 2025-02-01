<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'agencyName',
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'rln',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class, 'referid','id');
    }

}
