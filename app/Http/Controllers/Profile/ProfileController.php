<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ExtendUserSubscriptionRequest;
use App\Http\Requests\Profile\ResetEmailRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\Profile\PasswordResetLinkRequest;
use App\Http\Requests\SubscribeContactRequest;
use App\Mail\ExtendSubscriptionMail;
use App\Mail\SubscribeInfoMail;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Throwable;

class ProfileController extends Controller
{
    public function profile() {

        return view('users\profile', ['user' => auth()->user()]);
    }

    public function passwordResetLink(PasswordResetLinkRequest $request, User $user) {
        if (auth()->check()) {
            $status = Password::sendResetLink(['email' => $request->user()->email]);
        } else {
            $status = Password::sendResetLink(['email' => $request->only('email')]);
        }


        return $status === Password::RESET_LINK_SENT
            ? response()->json(['status' => 'success',
                                'message' => __($status)])
            : response()->json(['status' => 'error',
                'message' => __($status)], 500);
    }

    public function passwordResetForm(Request $request, $token) {

        return response()->view('users.password_reset', ['token' => $token]);
    }

    public function passwordReset (ResetPasswordRequest $request, $token) {
        try {
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $user->save();
                    event(new PasswordReset($user));
                }
            );

            return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
        } catch (Throwable $e) {
            //oops
        }
    }

    public function emailReset(ResetEmailRequest $request, User $user) {
        $user->email = $request->email;
        $user->save();

        return response()->json([
            'data' => $user->refresh(),
            'status' => 'success',
            'message' => 'Email updated successfully!',
        ]);
    }

    public function subscribeContact(SubscribeContactRequest $request) {
        $data = [
            'message' => $request->message,
            'timestamp' => now(),
        ];
        if (!auth()->check()) {
            $data += ['email' => $request->email];
        }
        try {
            Mail::to(env('MAIL_FROM_ADDRESS')) //recipient self, change for prod
                ->send(new SubscribeInfoMail($request->user(), $data));

            return response()->json(['status' => 'success',
                'message' => 'Success! We will contact you shortly!']);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }

    }

    public function subscriptionExtend(ExtendUserSubscriptionRequest $request, User $user) {
        $data = [
            'months' => $request->months,
            'timestamp' => now(),
        ];
        try {
            Mail::to(env('MAIL_FROM_ADDRESS')) //recipient self, change for prod
            ->send(new ExtendSubscriptionMail($request->user(), $data));

            return response()->json(['status' => 'success',
                'message' => 'Success! We will contact you shortly!']);
        } catch (Throwable $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }

    }
}
