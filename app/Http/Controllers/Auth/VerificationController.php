<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function notice()
    {
        return redirect()->route('profile.index')->with('notification', 'profile.need_verified');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('profile.index')->with('notification', 'profile.verify_success');
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('profile.index');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('notification', 'profile.sent_verification_email');
    }
}
// class VerificationController extends Controller
// {
//     public function verify(EmailVerificationRequest $request): RedirectResponse
//     {
//         if ($request->user()->hasVerifiedEmail()) {
//             return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
//         }

//         if ($request->user()->markEmailAsVerified()) {
//             event(new Verified($request->user()));
//         }

//         return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
//     }
// }
