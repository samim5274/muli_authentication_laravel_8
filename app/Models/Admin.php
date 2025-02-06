<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Expenses;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function exsend()
    {
        return $this->hasMany(Expenses::class,'sender_id','id');
    }

    public function exreceived()
    {
        return $this->hasMany(Expenses::class,'receiver_id','id');
    }
}
