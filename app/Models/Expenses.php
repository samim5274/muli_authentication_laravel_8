<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\ExCategory;
use App\Models\SubExCategory;

class Expenses extends Model
{
    use HasFactory;

    protected $fillabled = [
        'date',
        'invoice',
        'sender_id',
        'receiver_id',
        'category_id',
        'subCategory_id',
        'amount',
        'remark',
        'status',
    ];

    public function exsend()
    {
        return $this->belongsTo(Admin::class,'sender_id','id');
    }

    public function exreceived()
    {
        return $this->belongsTo(Admin::class,'receiver_id','id');
    }

    public function excategory()
    {
        return $this->belongsTo(ExCategory::class,'category_id','id');
    }

    public function exsubcategory()
    {
        return $this->belongsTo(SubExCategory::class,'subCategory_id','id');
    }
}
