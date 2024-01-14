<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login_form');
    }

    public function authenticator(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'min:6']
        ]);

        if (Auth::guard('web')->attempt($data)) {
            return back()->with('success', 'User autenticated successfully.');
        }
        return back()->withErrors(['email' => 'Email is not correct',
            'password' => 'Password is not correct']);
    }
}
