<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function admindashboard()
    {
        $userId = Auth::guard('admin')->id();
        $username = Auth::guard('admin')->user()->name;
        return view('backend.dashboard.admin_dashboard',compact('userId','username'));
    }
}
