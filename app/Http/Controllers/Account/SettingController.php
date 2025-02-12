<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExCategory;
use App\Models\SubExCategory;

class SettingController extends Controller
{
    public function settingView()
    {
        $categories = ExCategory::all();
        return view('account.Setting',compact('categories'));
    }

    public function categoryInsert(Request $request)
    {
        $category = new ExCategory();
        $category->CatName = $request->has('txtCategory')? $request->get('txtCategory'):'';
        $category->save();
        return redirect()->back()->with('success', 'Category added successfully.');
    }

    public function subCategoryInsert(Request $request)
    {
        $Subcategory = new SubExCategory();
        $Subcategory->category_Id = $request->has('category')? $request->get('category'):'';
        $Subcategory->name = $request->has('txtSubCategory')? $request->get('txtSubCategory'):'';
        $Subcategory->save();
        return redirect()->back()->with('success', 'Sub-Category added successfully.');
    }
}
