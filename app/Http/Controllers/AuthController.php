<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OAuth\SocialController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $facebookLink = 'https://www.facebook.com/v18.0/dialog/oauth?';
        $parameters = [
            'client_id' => env('APP_ID'),
            'redirect_uri' => env('REDIR_URI_FACEBOOK')
        ];
        $facebookLink .= http_build_query($parameters);

        return view('auth.login_form', ['facebookLink' => $facebookLink]);
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

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->regenerate();
        return redirect()->route('home');
    }

}
