<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.setting');
    }

    // ======================
    // UPDATE PROFILE
    // ======================
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'photo' => 'nullable|image|max:2048'
        ]);

        $user = Auth::user();

        // upload photo
        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete($user->photo);
            }

            $path = $request->file('photo')->store('avatars');
            $user->photo = $path;
        }

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Profile updated successfully');
    }

    // ======================
    // UPDATE PASSWORD
    // ======================
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is wrong']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password updated successfully');
    }
}
