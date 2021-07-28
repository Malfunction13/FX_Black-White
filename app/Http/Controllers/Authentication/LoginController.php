<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm() {

        return view('users.login');
    }

    public function username() { // override this method to make users login with their username instead of default email

        return $this->username;
    }

    public function login(Request $request) {

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if(!auth()->attempt($request->only('username', 'password'), $request->remember)) { // 2nd arg rememberme

            return back()->with('errors', 'Invalid login details!')->setStatusCode(401);
        }

        return redirect()->route('profile');
    }
}
