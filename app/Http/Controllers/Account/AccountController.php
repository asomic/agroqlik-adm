<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// Models 
use App\Models\Account\Account;
use App\Models\User\User;



class AccountController extends Controller
{

    public function index()
    {
        $accounts = Account::all();
        return view('account.index', ['accounts' => $accounts]);
    }

    public function create() 
    {
        return view('account.create');
    }
    public function edit(Account $account) 
    {
        return view('account.edit', ['account'=> $account]);
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'rut' => [ 'unique:accounts', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        //dd($validatedData);
        
        $account = new Account;
        $account->rut = $request->rut;
        $account->razon_social = $request->razon;
        $account->plan_id = $request->plan;
        $account->status = 1; 
        $account->payment_email = $request->payment_email; 
        $account->payment_day = $request->payment_day; 
        if($account->save()) {

            $user = new User; 
            $user->account_id = $account->id;
            $user->email = $request->email;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->password = Hash::make('agroqlik');
            $user->role = 2;
            $user->save();

            return redirect()->route('account.show',['account'=>$account->id]);
        } else {
            return 'error';
        }

    }

    public function update(Request $request, Account $account) 
    {

        $account->rut = $request->rut;
        $account->razon_social = $request->razon;
        $account->plan_id = $request->plan;
        $account->payment_email = $request->payment_email; 
        $account->payment_day = $request->payment_day; 
        $account->save();
        return redirect()->route('account.show',['account'=>$account->id]);

    }

    public function show(Account $account) 
    {
        return view('account.show', ['account' => $account]);
    }


    public function planChange(Request $request, Account $account) 
    {
        $account->plan_id = $request->plan;
        $account->save();
        return redirect()->route('account.show',['account'=>$account->id]);
    }


}
