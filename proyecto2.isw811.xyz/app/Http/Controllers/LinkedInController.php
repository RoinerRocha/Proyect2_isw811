<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;

use App\Models\User;


use Illuminate\Http\Request;

class LinkedInController extends Controller
{
    public function LoginLI()
    {
        return view('LinkendIn.login');
    }
    public function provider()
    {
        return Socialite::driver('linkedin')->redirect();
    }
    public function ProviderCallback()
    {
        $user = Socialite::driver('linkedin')->user();
    }
}


