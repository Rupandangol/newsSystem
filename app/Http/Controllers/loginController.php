<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function loginAction(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        $username = $request->username;
        $password = $request->password;
        $rememberMe = $request->rememberMe??false;
        if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password], $rememberMe)) {
            return redirect()->intended(route('dashboard'));
        }
        return redirect()->back()->with('fail', 'Failed');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login-admin');
    }


}
