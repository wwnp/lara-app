<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        return view('auth.profile.index', compact('user'));
    }
    public function edit(): View
    {
        $user = Auth::user();
        return view('auth.profile.edit', compact('user'));
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('posts.index');
    } // logout

    public function update(ProfileUpdateRequest  $request): RedirectResponse
    {

        $request->user()->fill($request->validated());


        // $request->user()->avatar_url = $request->validated()['avatar_url'] ?? null;
        // dd($request->user());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }


        $request->user()->save();
        return redirect()->route('profile.index')->with('notification', 'profile.updated');
    }
}
