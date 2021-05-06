<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registration() {

        return view('users\register');
    }

    public function registerUser(Request $request) {
        //validate input
        $this->validate($request, [
            'username' => ['required', 'max:50','unique:users'],  //make sure theres no other user with the same name
            'email' => ['required', 'email', 'max:50','unique:users'],
            'password' => ['required','max:255', 'confirmed'] //laravel will look for any other fields that have CONFIRMATION keyword and make sure they match
        ]);

        //save user
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
                ]
        );
        //sign the user in
        auth()->attempt($request->only('email', 'password')); // grab only the email and pwd fields from the request data


        //we can do redirect('aboslute/path/profile') but if we change the route this redirect wont work
        return redirect()->route('profile'); //therefore we use route('profile') and utilize ->name()
    }
}
