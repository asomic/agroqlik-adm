<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Payment;
use App\Models\Account\Account;
use App\Models\Flow\Flow;



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

        $this->flow = Flow::make('sandbox', [
            'apiKey' => '4901F750-B96D-48A9-A2F7-665890L3D714',
            'secret' => '6ab4910b8b8ca948942d3ace580f98ab1abc49c9',
        ]);

        $randIn = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);



        $payment = new Payment; 
        $payment->service = $request->service;
        $payment->account_id = $account->id;
        $payment->plan_id = $request->plan;
        $payment->amount = $request->amount;
        $payment->expiration_at= $request->expiration;
        $payment->commerce_code = $randIn;

        try {
            $paymentResponse = $this->flow->payment()->commit([
                'commerceOrder'     => $randIn,
                'subject'           => "Plan Agroqlik",
                'amount'            => $request->amount,
                'email'             => $account->payment_email,
                'urlConfirmation'   => url('/').'/flow/confirm',
                'urlReturn'         => url('/').'/flow/return',
                'optional'          => [
                    'Message' => 'Tu pago esta en proceso!'
                ]
            ]);
        } catch ( Exception $e) {

            return back()->with(
                'warning',
                'Ups, algo ha salido mal, no se ha realizado la transacción, verifica que tu correo sea válido, o puedes comunicarte con el administrador'
            );
        }


        $payment->flow = $paymentResponse->getUrl();
        $payment->save();

        return redirect()->route('payment.show',['account'=>$account->id, 'payment' => $payment->id]);
    }
}
