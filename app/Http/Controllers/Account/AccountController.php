<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use App\Models\Admin;
use App\Models\ExCategory;
use App\Models\SubExCategory;
use App\Models\Expenses;
use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AccountController extends Controller
{
    public function accountView()
    {
        $senderId = Auth::guard('admin')->user()->id;

        // $accounts = Account::where('date', date('Y-m-d'))->where('receiver_id',$senderId )->get();
        $accounts = Account::with('receiver','sender')->where('receiver_id', $senderId)->paginate(8);

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


    ////////////////////////////////////////////////////////////// expenses backend section //////////////////////////////////////////////////////////////////

    ////////////////////////////////////////////////////////////// expenses backend section //////////////////////////////////////////////////////////////////

    ////////////////////////////////////////////////////////////// expenses backend section //////////////////////////////////////////////////////////////////


    public function expensesView()
    {
        $expenses = Expenses::with('exsend','exreceived','excategory','exsubcategory')->whereDate('date', date('Y-m-d'))->paginate(8);

        $expensesstatusSubmited = Expenses::with('exsend','exreceived','excategory','exsubcategory')->where('status',1)->whereDate('date', date('Y-m-d'))->paginate(8);
        $expensesstatusPaid = Expenses::with('exsend','exreceived','excategory','exsubcategory')->where('status',3)->whereDate('date', date('Y-m-d'))->paginate(8);
        $expensesstatusProcessing = Expenses::with('exsend','exreceived','excategory','exsubcategory')->where('status',2)->whereDate('date', date('Y-m-d'))->paginate(8);
        $expensesstatusReject = Expenses::with('exsend','exreceived','excategory','exsubcategory')->where('status',4)->whereDate('date', date('Y-m-d'))->paginate(8);

        $categories = ExCategory::all();
        $admins = Admin::all(); 

        $totalSubmit = Expenses::where('date', date('Y-m-d'))->where('status', 1)->sum('amount');
        $totalPending = Expenses::where('date', date('Y-m-d'))->where('status', 2)->sum('amount');
        $totalPaid = Expenses::where('date', date('Y-m-d'))->where('status', 3)->sum('amount');
        $totalCancel = Expenses::where('date', date('Y-m-d'))->where('status', 4)->sum('amount');
        $total = $totalSubmit + $totalPending + $totalPaid + $totalCancel;

        return view('account.dailyExpenses', compact('expenses','categories','admins','totalSubmit','totalPending','totalCancel','total','totalPaid','expensesstatusPaid','expensesstatusProcessing','expensesstatusReject','expensesstatusSubmited'));
    }

    public function getSubCategory(Request $request, $id)
    {
        $subCategory = SubExCategory::where('category_Id', $id)->get();
        return response()->json(['subCategory'=>$subCategory]);
    }

    public function addDailyExpenses(Request $request)
    {
        $expenses = new Expenses();
        
        $request->validate([
            'cbxAccount' => 'required',
            'txtAmount' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'txtRemark' => 'required',
        ]);

        $sl = Expenses::where('date', date('Y-m-d'))->count();
        $senderId = Auth::guard('admin')->user()->id;
        
        $expenses->date = date('Y-m-d');
        $expenses->invoice = date('Ymd').$sl+1;
        $expenses->sender_id = $senderId;
        $expenses->receiver_id = $request->has('cbxAccount')? $request->get('cbxAccount'):'';
        $expenses->category_id = $request->has('category')? $request->get('category'):'';
        $expenses->subCategory_id = $request->has('subcategory')? $request->get('subcategory'):'';
        $expenses->amount = $request->has('txtAmount')? $request->get('txtAmount'):'';
        $expenses->remark = $request->has('txtRemark')? $request->get('txtRemark'):'';
        $expenses->status = 1;

        $expenses->save();
        return redirect()->back()->with('success','Daily expeses submited successfully.');
    }

    public function expensesStatus(Request $request, $id)
    {
        $status = Expenses::with('exsend','exreceived','excategory','exsubcategory')->where('id', $id)->first();
        // dd($status);
        return view('account.expensesStatus', compact('status'));
    }

    public function UpdateexpensesStatus(Request $request, $id)
    {
        $exstatus = Expenses::find($id);
        $exstatus->status = $request->has('cbxExpensesStatus')? $request->get('cbxExpensesStatus'):'';
        $exstatus->update();
        return redirect('/daily-expenses-view')->with('success','Daily expeses status updated successfully.');
    }

    public function expensesSearch(Request $request)
    {
        $date = $request->has('cbxDate') ? $request->get('cbxDate'):'';
        $invoice = $request->has('txtSearchorders')? $request->get('txtSearchorders'):'';

        if($date == 1)
        {
            $expenses = Expenses::where('invoice', $invoice)->whereDate('date', date('Y-m-d'))->get();
        }
        elseif($date == 2)
        {
            $expenses = Expenses::whereBetween('date', [Carbon::now()->subDays(7), Carbon::now()])->get();
        }
        elseif($date == 3)
        {
            $expenses = Expenses::where('invoice', $invoice)->whereDate('date', date('Y-m-d'))->get();
        }
        elseif($date == 4)
        {
            $expenses = Expenses::where('invoice', $invoice)->whereDate('date', date('Y-m-d'))->get();
        }
        else
        {
            //
        }
        dd($expenses);
        return $request->all();
    }
}
