<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

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

    public function receiver()
    {
        return $this->belongsTo(Admin::class, 'receiver_id','id');
    }

    public function sender()
    {
        return $this->belongsTo(Admin::class, 'sender_id','id');
    }
}
