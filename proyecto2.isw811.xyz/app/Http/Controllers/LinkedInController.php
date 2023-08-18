<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Http;

use Illuminate\Validation\Rule;

use App\Models\User;


use Illuminate\Http\Request;

class LinkedInController extends Controller
{
    public function LoginLI()
    {
        return view('LinkendIn.login');
    }
    public function postview()
    {
        return view('LinkendIn.post');
    }

    

    public function provider()
    {
        return Socialite::driver('linkedin')->redirect();
    }


    public function ProviderCallback()
    {
        $user = Socialite::driver('linkedin')->user();
    }


    public function PostLinkedin(Request $request)
    {
        $token = env('TOKEN');
        $Textpost = $request->input('text');
        $json = '{
            "author": "urn:li:person:c_jsiCFcaj",
            "lifecycleState": "PUBLISHED",
            "specificContent": {
                "com.linkedin.ugc.ShareContent": {
                    "shareCommentary": {
                        "text": "' . $Textpost . '"
                    },
                    "shareMediaCategory": "NONE"
                }
            },
            "visibility": {
                "com.linkedin.ugc.MemberNetworkVisibility": "PUBLIC"
            }
        }';


        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->post('https://api.linkedin.com/v2/ugcPosts', json_decode($json, true));



        return redirect()->route('home');
    }

}


