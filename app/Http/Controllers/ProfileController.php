<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('frontend.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Cập nhật tên
        $user->name = $request->input('name');

        // Nếu có đổi mật khẩu
        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng']);
            }

            $request->validate([
                'new_password' => 'required|min:6|confirmed',
            ]);

            $user->password = Hash::make($request->input('new_password'));
        }

        $user->save();

        return back()->with('success', 'Cập nhật hồ sơ thành công');
    }
}
