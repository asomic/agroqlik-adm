<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Payment;
use App\Models\Account\Account;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index() 
    {
        $payments = Payment::all();

        return view('payment.index',['payments' => $payments]);
    }

    public function show(Payment $payment) 
    {
        return view('payment.show',['payment' => $payment]);
    }

    public function create(Account $account) 
    {
        return view('payment.create', ['account' => $account]);
    }

    public function store(Request $request, Account $account) 
    {
        $payment = new Payment; 
        $payment->account_id = $account->id;
        $payment->plan_id = $request->plan;
        $payment->amount= $request->amount;
        $payment->expiration_at= $request->expiration;
        $payment->save();

        return redirect()->route('account.show',['account'=>$account->id]);
    }
}
