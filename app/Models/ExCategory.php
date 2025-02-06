<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubExCategory;
use App\Models\Expenses;

class ExCategory extends Model
{
    use HasFactory;

    protected $fillabled = ['name'];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class,'category_Id','id');
    }

    public function excategory()
    {
        return $this->hasMany(Expenses::class,'category_id','id');
    }
}
