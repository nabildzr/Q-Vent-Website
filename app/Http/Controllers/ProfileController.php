<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        $previousUrl = url()->previous();
        $currentUrl = url()->current();

        if ($previousUrl !== $currentUrl && !str_contains($previousUrl, route('admin.profile.edit'))) {
            session(['profile_back_url' => $previousUrl]);
        }

        $backUrl = session('profile_back_url', route('admin.dashboard.index'));

        return view('admin.profile.show', compact('user', 'backUrl'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.show', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:20',
        ]);

        $user->update($request->only('name', 'email', 'phone_number'));

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        // cek password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Password updated successfully.');
    }

}
