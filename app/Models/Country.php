<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'countryName',
        'clientCost',
        'clientAdvance',
        'agentCost',
        'agentAdvance',
        'remark',
    ];

    public function client()
    {
        return $this->hasMany(Client::class, 'countryId');
    }
}
