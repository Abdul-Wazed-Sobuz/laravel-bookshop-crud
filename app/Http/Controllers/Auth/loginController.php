<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    //

    function loginPage(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.loginPage');
    }

    function login(Request $req): \Illuminate\Http\RedirectResponse
    {
        $validated = $req->validate(
            [
                'email'=> 'required|email|exists:accounts,email',
                'password'=>'required'
            ],
            [
                "email.exists" => "Email are not valid",
            ]
        );

        $admin = Account::where('email', $req->email)->first();

        if(!empty($admin) && Hash::check($req->password, $admin->password)){
//            $admin = Account::where('email', $req->email)->first();
            $req->session()->put('username', $admin->username);
            $req->session()->put('email', $admin->email);
            return redirect()->route('dashboard');
        }

        else{
//            return redirect()->back()->with('error','Email or password is invalid');
            return redirect()->back()->withInput($req->only('email', 'remember'))->withErrors([
                'password' => 'Wrong password.',
            ]);
        }
    }

    function logout(): \Illuminate\Http\RedirectResponse
    {
        session()->forget('username');
        session()->forget('email');
        return redirect()->route('login');
    }
}
