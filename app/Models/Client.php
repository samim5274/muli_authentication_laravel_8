<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
            'firstName',
            'lastname',
            'dob',
            'phone',
            'genderId',
            'address',
            'email',
            'passportNum',
            'countryCode',
            'passportAuthority',
            'nidNumm',
            'plaseOfBirth',
            'passportIssueDateStart',
            'passportIssueDateEnd',
            'fatherName',
            'motherName',
            'spouseName',
            's_dob',
            's_address',
            'emgName',
            'emgRelation',
            'emgAddress',
            'emgPhone',
            'referid',
            'countructAmount',
            'advance',
            'countryId',
            'payMathod',
            'payBankName',
            'payAccountNum',
            'remark',
            'pImg',
            'passImg',
            'nidImg',
            'sNidImg',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class,'countryId','id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class,'referid','id');
    }

}
