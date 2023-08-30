<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class signupController extends Controller
{
    //
    function signupPage(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.signUp');
    }

    function adminDashboard(){
        return view('admin.adminDashboard');
    }

    function adminRegistration(Request $req): \Illuminate\Http\RedirectResponse
    {
//        dd($req->all());
        $validated=$req->validate(
            [
                'username' => "required|max:20|regex:/^[a-z ,.'-]+$/i",
                'email' => 'required|email|unique:accounts',
                "password" => 'required|string|min:4',
                "confirmPassword" => 'required|same:password'
            ],
        );
        $acc = new Account();
        $acc->username = $req->username;
        $acc->email = $req->email;
        $acc->password = Hash::make($req->password);
        $acc->save();

        $admin = Account::where('email', $req->email)->first();
        $req->session()->put('username', $admin->username);
        $req->session()->put('email', $admin->email);

        return redirect()->route('dashboard');
    }

}
