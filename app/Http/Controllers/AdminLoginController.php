<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.adminLogin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user has the 'admin' role
            if ($user->role === 'admin') {
                // Authentication passed and user has admin role
                return redirect()->intended('/admin-dashboard');
            }
        }

        // Authentication failed or user doesn't have admin role
        return redirect()->route('admin.login')->withErrors(['email' => 'Invalid credentials']);
    }
}
