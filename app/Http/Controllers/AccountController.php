<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Carbon;

class AccountController extends Controller
{
    //
    public function index() {
        return Account::orderBy('created_at', 'DESC')->get();
    }

    public function store(Request $request) {
        // $request = json_decode($request);
        $newAccount = new Account;
        $newAccount->username = $request->account['username'];
        $newAccount->password = $request->account['password'];
        $newAccount->email = $request->account['email'];
        $newAccount->nationality = $request->account['nationality'];
        $newAccount->phone = $request->account['phone'];
        $newAccount->selectedAccountType = $request->account['selectedAccountType'];
        $newAccount->tacAgree = $request->account['tacAgree'];
        $newAccount->jobRole = $request->account['jobRole'];
        $newAccount->firstname = $request->account['firstname'];
        $newAccount->surname = $request->account['surname'];
        $newAccount->save();

        return $newAccount;
    }
    public function update(Request $request, $username ) {

        $existingAccount = Account::find( $username );
        $account = Account::where('username', '=', $username)->first();
        if( $existingAccount) {
            $existingAccount->password = $request->account['password'];
            $existingAccount->updated_at = Carbon::now();
            $existingAccount->save();
            return $existingAccount;
        }
        return $username;
    }
    public function signin(Request $request, $username, $password) {
        $account = Account::where('username','=',$username)->get();
        if ($account === null) {
            return 'not a username';
        } else {
            if ($account[0]['password'] === $password) {
            return $account;
            }
        return 'incorrect username/password';
        }
    }   
}
