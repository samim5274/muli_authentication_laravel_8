<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'amount',
        'sender_id',
        'senderType',
        'receiver_id',
        'receiverType',
        'remark'
    ];
}
