<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignupRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.signup.create');
    }
    public function store(SignupRequest $request): RedirectResponse
    {
        $request->validated();
        $user = User::create([
            'name' => $request->validated()["name"],
            'email' => $request->validated()["email"],
            'password' => Hash::make($request->validated()["password"]),
        ]);
        event(new Registered($user));

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
