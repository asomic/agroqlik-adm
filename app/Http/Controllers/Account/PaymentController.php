<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Payment;
use App\Models\Account\Account;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function create(Account $account) 
    {
        return view('payment.create');
    }

}
