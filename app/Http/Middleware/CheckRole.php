<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        $role = $request->route('role');

        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect()->route('dashboard')->with('error', 'Akses untuk role ini tidak diizinkan.');
        }

        return $next($request);
    }
}
