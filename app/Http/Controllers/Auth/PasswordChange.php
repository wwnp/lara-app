<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;

class PasswordChange extends Controller
{
    public function update(ChangePasswordRequest  $request)
    {
        $validated = $request->validated();

        $request->user()->update([
            'password' => Hash::make($validated["password"])
        ]);

        return redirect()->route('profile.index')->with('notification', 'profile.updated');
    }
}
