<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('admin.login'); // Make sure you have this Blade view
    }

    // Handle login
   public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('quiz.index'); // or user dashboard
        }
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ]);
}

}
