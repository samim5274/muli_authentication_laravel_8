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
        $pass = $request->has('txtPassword') ? $request->get('txtPassword') : '';
        
        $userAdmin = Admin::where('id', $senderId)->first();
        $data = Hash::check($pass, $userAdmin->password);
        
        if(!$data){
            return redirect()->back()->with('error', 'Password is incorrect. Please enter correct password.');
        }
        else
        {
            if($senderId == $receiverid){
                return redirect()->back()->with('error', 'You can select your own account for money transer. Please select another account.');
            }
            else
            {
                $account = $request->has('cbxAccount') ? $request->get('cbxAccount') : '';
                $amount = $request->has('txtAmount') ? $request->get('txtAmount') : '';
                $remark = $request->has('txtRemark') ? $request->get('txtRemark') : '';

                $accounts->date = date('Y-m-d');
                $accounts->amount = $amount;
                $accounts->sender_id = $senderId;
                $accounts->senderType = $senderType;
                $accounts->receiver_id = $account;
                $accounts->receiverType = $receriverType;
                $accounts->remark = $remark;
                
                $accounts->save();
                return redirect()->route('account.view')->with('success', 'Money transfer successfully.');
            } 
        }               
    }
}
