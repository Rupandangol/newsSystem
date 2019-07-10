<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class frontendLoginController extends Controller
{
    public function signin()
    {
        return view('Frontend.login.userLogin');
    }


    public function signUp()
    {
        return view('Frontend.login.register');
    }

    public function signInAction(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        $username = $request->username;
        $password = $request->password;
        if (Auth::guard('subscriber')->attempt(['username' => $username, 'password' => $password])) {
            return redirect()->intended(route('userDash'));
        }
        return redirect()->back()->with('fail', 'failed');

    }

    public function userLogout()
    {
        Auth::guard('subscriber')->logout();
        return redirect()->to(route('user-signIn'));
    }
}
