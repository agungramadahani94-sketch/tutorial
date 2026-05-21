<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class LoginController extends Controller
{
    public function showHospital()
    {
        return view('auth.login-hospital');
    }

    public function showRestaurant()
    {
        return view('auth.login-restaurant');
    }

    public function showStore()
    {
        return view('auth.login-store');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'theme' => ['required', 'in:hospital,restaurant,store'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $theme = $request->input('theme');
            $request->session()->put('theme', $theme);

            $user = Auth::user();
            $user->theme = $theme;
            if (!$user->role) {
                $user->role = $theme;
            }
            $user->save();

            return Redirect::intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.hospital');
    }
}
