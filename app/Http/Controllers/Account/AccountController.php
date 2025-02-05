<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use App\Models\Admin;
use App\Models\ExCategory;
use App\Models\SubExCategory;
use Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function accountView()
    {
        $senderId = Auth::guard('admin')->user()->id;

        // $accounts = Account::where('date', date('Y-m-d'))->where('receiver_id',$senderId )->get();
        $accounts = Account::with('receiver','sender')->where('receiver_id', $senderId)->get();

        $admins = Admin::all();        

        $totalReceiverdAmount = Account::where('receiver_id',$senderId)->where('receiverType',2)->sum('amount');
        $totalDipositdAmount = Account::where('receiver_id',$senderId)->where('receiverType',3)->sum('amount');
        $totalSendedAmount = Account::where('sender_id',$senderId)->where('senderType',1)->sum('amount');

        $balance = ($totalReceiverdAmount+$totalDipositdAmount) - $totalSendedAmount;

        return view('account.account', compact('admins','balance','accounts','senderId'));
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
                $totalReceiverdAmount = Account::where('receiver_id',$senderId)->where('receiverType',2)->sum('amount');
                $totalDipositdAmount = Account::where('receiver_id',$senderId)->where('receiverType',3)->sum('amount');
                $totalSendedAmount = Account::where('sender_id',$senderId)->where('senderType',1)->sum('amount');
                $balance = ($totalReceiverdAmount+$totalDipositdAmount) - $totalSendedAmount;
                // dd('Total Diposit Amount: '.$totalDipositdAmount.'/- Total Received AMount: '.$totalReceiverdAmount.'/- And Total Sended Amount: '.$totalSendedAmount.'/- Balence: '.$balance.'/-');

                $account = $request->has('cbxAccount') ? $request->get('cbxAccount') : '';
                $amount = $request->has('txtAmount') ? $request->get('txtAmount') : '';
                $remark = $request->has('txtRemark') ? $request->get('txtRemark') : '';

                if($amount <= $balance)
                {
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
                elseif($balance < 0)
                {
                    return redirect()->back()->with('error', 'You don\'t have enough money on your account. Thanks!');
                }
                else
                {
                    return redirect()->back()->with('error', 'You don\'t have enough money on your account. Thanks!');
                }
            } 
        }               
    }

    public function dipositView()
    {
        $senderId = Auth::guard('admin')->user()->id;

        $totalReceiverdAmount = Account::where('receiver_id',$senderId)->where('receiverType',2)->sum('amount');
        $totalDipositdAmount = Account::where('receiver_id',$senderId)->where('receiverType',3)->sum('amount');
        $totalSendedAmount = Account::where('sender_id',$senderId)->where('senderType',1)->sum('amount');

        $balance = ($totalReceiverdAmount+$totalDipositdAmount) - $totalSendedAmount;
        $admins = Admin::all(); 

        return view('account.diposit', compact('admins','balance'));
    }

    public function dipositMoney()
    {
        return redirect()->back()->with('error', 'Diposit section working in progress. It will be work very soon. Please wait & Thank you!');
    }

    public function expensesView()
    {
        $categories = ExCategory::all();
        // dd($categories);
        return view('account.dailyExpenses', compact('categories'));
    }

    public function getSubCategory(Request $request, $id)
    {
        $subCategory = SubExCategory::where('category_Id', $id)->get();
        return response()->json(['subCategory'=>$subCategory]);
    }
}
