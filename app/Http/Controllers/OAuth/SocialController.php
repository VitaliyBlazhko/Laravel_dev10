<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialController extends Controller
{
    public function facebook(Request $request)
    {
        $code = $request->input('code');

        $fbClientId = env('APP_ID');
        $fbClientSecret = env('APP_SECRET');
        $fbRedirectUri = env('REDIR_URI_FACEBOOK');

        $client = new Client();


        $response = $client->post('https://graph.facebook.com/v18.0/oauth/access_token', [
            'form_params' => [
                'client_id' => $fbClientId,
                'client_secret' => $fbClientSecret,
                'redirect_uri' => $fbRedirectUri,
                'code' => $code
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $accessToken = $data['access_token'];
        $fbAppId = env('APP_ID');
        $fbAppSecret = env('APP_SECRET');
        $appToken = $fbAppId . '|' . $fbAppSecret;

        $response = $client->get('https://graph.facebook.com/v18.0/debug_token', [
            'query' => [
                'input_token' => $accessToken,
                'access_token' => $appToken,
            ],
        ]);
        $tokenInfo = json_decode($response->getBody(), true);

        if ($tokenInfo['data']['is_valid']) {
            $userResponse = $client->get('https://graph.facebook.com/v18.0/me', [
                'query' => [
                    'access_token' => $accessToken,
                    'fields' => 'id,name,email'
                ],
            ]);

            $userData = json_decode($userResponse->getBody(), true);
//            dd($userData);
            $user = User::where('email', $userData['email'])->first();

            if (!$user) {
                $user = User::create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => Hash::make(rand(000000, 9999999))
                ]);
            }

            Auth::login($user);

            return redirect()->route('home');
        } else {
            return redirect()->route('login')->withErrors(['facebook' => 'Facebook authentication failed.']);
        }
    }
}
