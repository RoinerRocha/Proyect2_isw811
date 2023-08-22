<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

// use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Http;

use Illuminate\Validation\Rule;

use App\Models\LinkedInData;

use App\Models\LinkedInPosts;

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
        $clientId = env('LinkedIn_CLIENT_ID');
        $callbackUrl = env('LinkedIn_REDIRECT_URL');

        $scope = urlencode('openid profile email w_member_social');
        $state = 'foobar';

        $url = sprintf(
            'https://www.linkedin.com/oauth/v2/authorization?' .
            'response_type=code&' .
            'client_id=%s&' .
            'redirect_uri=%s&' .
            'scope=%s&' .
            'state=%s',
            urlencode($clientId),
            urlencode($callbackUrl),
            $scope,
            $state
        );

        return redirect()->to($url);
    }


    public function ProviderCallback(Request $request)
    {
        // Obtener las credenciales de LinkedIn de las variables de entorno
        $clientId = env('LinkedIn_CLIENT_ID');
        $clientSecret = env('LinkedIn_CLIENT_SECRET');
        $callbackUrl = env('LinkedIn_REDIRECT_URL');

        // Obtener el código de autorización de la solicitud
        $code = $request->input('code');

        // Intercambio de código por token de acceso
        $response = Http::asForm()->post('https://www.linkedin.com/oauth/v2/accessToken', [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'redirect_uri' => $callbackUrl,
        ]);

        // Verificar el estado de la respuesta
        if ($response->successful()) {
            $tokenLinkedin = $response['access_token'];

            // Obtener información del usuario de LinkedIn
            $getUserInfo = Http::withHeaders([
                'Authorization' => 'Bearer ' . $tokenLinkedin,
                'Content-Type' => 'application/json',
            ])->get('https://api.linkedin.com/v2/userinfo');

            if ($getUserInfo->successful()) {
                $userData = $getUserInfo->json();
                $userID = $userData['sub'];

                // Actualizar o crear datos en la base de datos
                LinkedInData::query()->updateOrCreate([
                    'user_id' => $request->user()->id,
                ], [
                    'user_access_token' => $tokenLinkedin,
                    'user_code' => $userID,
                ]);

                // Redirigir a la ruta de Posteo
                return redirect()->route('LinkedIn');
            }
        }

        // Si hay un error en la respuesta, mostrar mensaje y redirigir a la página de inicio
        return redirect()->route('home')->with('error', 'An error has occurred, please try again.');
    }


    public function PostLinkedin(Request $request)
    {
        $user_id = request()->user()->id;
        $data = LinkedInData::query()->where('user_id', $user_id)->first();
        $token = $data->user_access_token;
        // $token = env('TOKEN');
        $code = $data->user_code;
        $Textpost = $request->input('text');
        $save = LinkedInPosts::query()->updateOrCreate([
            'user_id' => request()->user()->id,
            'message' => $Textpost,
            'user_access_token' => $data->user_access_token,
            'user_code' =>  $data->user_code
        ]);
        $json = '{
            "author": "urn:li:person:' . $code . '",
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


