<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function accountView()
    {
        $account = Admin::all();
        return view('account.account', compact('account'));
    }

    public function moneySend(Request $request)
    {
        $accounts = new Account();

        $senderId = Auth::guard('admin')->user()->id;
        
        $senderType = 1;
        $receriverType = 2;
        
        $request->validate([
            'cbxAccount' => 'required',
            'txtAmount' => 'required',
            'txtRemark' => 'required',
            'txtPassword' => 'required',
        ]);

        $receiverid = $request->has('cbxAccount') ? $request->get('cbxAccount') : '';
        
        $user = Auth::guard('admin')->attempt(['password'=>$request->txtPassword]);
        if(!$user){
            return redirect()->back()->with('error', 'Invalid password');
        }
        else
        {
            return 'password is correct';
        }

        // $admin = Admin::where('id', $senderId)->where('password', $pass)->first();

        // if(!$admin){
        //     return redirect()->back()->with('error', 'Password is incorrect. Please enter correct password.');
        // }
        // else
        // {
        //     if($senderId == $receiverid){
        //         return redirect()->back()->with('error', 'You can select your own account for money transer. Please select another account.');
        //     }
        //     else
        //     {
        //         $date = date('Y-m-d');
        //         $account = $request->has('cbxAccount') ? $request->get('cbxAccount') : '';
        //         $amount = $request->has('txtAmount') ? $request->get('txtAmount') : '';
        //         $remark = $request->has('txtRemark') ? $request->get('txtRemark') : '';
                
        
        //         // return view('account.money-send');
        //          return 'money send successfully';
        //     } 
        // }               
    }
}
