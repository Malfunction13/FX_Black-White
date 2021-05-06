<?php

namespace App\Http\Controllers;

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
            'password' => 'required' //laravel will look for any other fields that have CONFIRMATION keyword and make sure they match
        ]);

        if(!auth()->attempt($request->only('username', 'password'), $request->remember)) { // built in way to REMEMBER USER

            return back()->with('status', 'Invalid login details!');
        }

        return redirect()->route('profile');
    }
}
