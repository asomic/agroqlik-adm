<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// Models 
use App\Models\Account\Account;
use App\Models\User\User;



class UserController extends Controller
{


    public function create( Account $account) 
    {
        return view('user.create', ['account' => $account]);
    }

    public function store(Request $request, Account $account) 
    {
        $user = new User;
        $user->account_id = $account->id;
        $user->email = $request->email;
        $user->password = Hash::make('agroqlik');
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role = $request->role;
        $user->status = 1; 
        $user->save();
        return redirect()->route('account.show',['account'=>$account->id]);
    }


    public function edit(Request $request, Account $account, User $user) 
    {
        return view('user.edit', ['account' => $account, 'user' => $user]);
    }


    public function update(Request $request , Account $account, User $user )
    {
        $user->account_id = $account->id;
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('account.show',['account'=>$account->id]);
    }


}
