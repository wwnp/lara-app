<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordChange extends Controller
{
    public function update(ChangePasswordRequest  $request)
    {
        $validated = $request->validated();

        $request->user()->forceFill([
            'password' => Hash::make($validated["password"]),
            'remember_token' => Str::random(60),
        ])->save();
        // dd($request->user());

        // $request->user()->update([
        //     'password' => Hash::make($validated["password"])
        // ]);

        return redirect()->route('profile.index')->with('notification', 'profile.updated');
    }
}
