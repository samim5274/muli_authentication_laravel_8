<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

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

    public function adminSignupForm()
    {
        return view('backend.admin.signup');
    }

    public function adminsignup(request $request)
    {
        // dd($request->all());

        $admins = new Admin();

        $request->validate([
            'txtUsername' => 'required',
            'txtEmail' => 'required|email',
            'txtPassword' => 'required'
        ]);

        $admins->name = $request->has('txtUsername')? $request->get('txtUsername'):'';
        $admins->email = $request->has('txtEmail')? $request->get('txtEmail'):'';
        $admins->password = Hash::make($request->has('txtPassword')? $request->get('txtPassword'):'');
        
        $admins->save();
        return redirect()->route('admin.signup.form')->with('success','New admin account created successfully.');
    }

}
