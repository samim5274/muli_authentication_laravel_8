<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExCategory;
use App\Models\Expenses;

class SubExCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_Id','name'];

    public function category()
    {
        return $this->belongsTo(SubCategory::class,'category_Id','id');
    }

    public function exsubcategory()
    {
        return $this->hasMany(Expenses::class,'subCategory_id','id');
    }
}
