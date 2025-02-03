<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubExCategory;

class ExCategory extends Model
{
    use HasFactory;

    protected $fillabled = ['name'];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class,'category_Id','id');
    }
}
