<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $theme = $request->session()->get('theme', Auth::user()->theme ?? 'hospital');
        return view('dashboard.' . $theme, ['theme' => $theme]);
    }

    public function changeTheme(Request $request)
    {
        $request->validate([
            'theme' => ['required', 'in:hospital,restaurant,store'],
        ]);

        $theme = $request->input('theme');
        $request->session()->put('theme', $theme);

        $user = Auth::user();
        $user->theme = $theme;
        $user->save();

        return redirect()->route('dashboard');
    }

    public function showRoleSection(Request $request, string $role)
    {
        return view('dashboard.' . $role, ['theme' => $role]);
    }
}
