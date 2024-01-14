<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registration()
    {
        return view('auth.register_form');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'email', 'string', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6']
        ]);


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


        return back()->with('success', 'User registered successfully.');


    }
}
