<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Throwable;

class RegisterController extends Controller
{
    public function registration() {

        return view('users\register');
    }

    public function registerUser(StoreUserRequest $request) {
        try {
            User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]
            );
            //sign the user in
            auth()->attempt($request->only('username', 'password'));

            return redirect()->route('profile');
        }  catch (Throwable $e) {

            return redirect()->route('register')->with([
                'status' => 'error',
                'message' => 'Unexpected error, try again later or contact administration.',
            ], 500);
        }

    }
}
