<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExCategory;

class SubExCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_Id','name'];

    public function category()
    {
        return $this->belongsTo(SubCategory::class,'category_Id','id');
    }
}
