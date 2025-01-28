<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

use Session;
use Auth;

class AdminController extends Controller
{
    public function adminloginform()
    {
        return view('backend.admin.admin_login');
    }

    public function adminlogin(request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $userId = Auth::guard('admin')->id();
            $username = Auth::guard('admin')->user()->name;
            
            // return redirect()->route('admin.dashboard',['id' => $userId, 'name' => $username]);
            return view('backend.dashboard.admin_dashboard', compact('userId','username'));
        }
        else
        {
            Session::flash('error','Invalid email or password');
            return redirect()->back();
        }
    }

    public function adminlogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.form');
    }

}
