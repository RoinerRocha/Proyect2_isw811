<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Abraham\TwitterOAuth\TwitterOAuth;

use Illuminate\Support\Facades\Redirect;   

use App\Models\TwitterPosts;

use App\Models\Twitter;

class ScheduledTweet extends Controller
{
    public function Login()
    {
        return view('Twitter.Login2');
    }
    public function ScheduledPost()
    {
        return view('Twitter.SchedulePost');
    }

    public function connect_Twitter(Request $request)
    {
        $CONSUMER_KEY = env("Twitter_API_KEY");
        $REDIRECT_URL = env("Twitter_REDIRECT_URL");
        $CONSUMER_SECRET = env("Twitter_API_SECRET");

        $_twitter_connect = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET);
        $_twitter_connect->setApiVersion('2');
        $_access_token = $_twitter_connect->oauth('oauth/request_token', array('oauth_callback' => $REDIRECT_URL));
        $_route = $_twitter_connect->url('oauth/authorize',array('oauth_token' => $_access_token['oauth_token']));

        return redirect($_route);
    }

    public function twitter_cbk(Request $request){

        $CONSUMER_KEY = env("Twitter_API_KEY");
        $REDIRECT_URL = env("Twitter_REDIRECT_URL");
        $CONSUMER_SECRET = env("Twitter_API_SECRET");

        var_dump('Datos del request: ', $request->all());
        $response= $request->all();
        $oauth_token = $response['oauth_token'];
        $oauth_verifier= $response['oauth_verifier'];

        /** Establishing twitter connection */
        $_twitter_connect = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $oauth_token, $oauth_verifier);
        $_twitter_connect->setApiVersion('2');

        /** verify user token */
        $access_token = $_twitter_connect->oauth("oauth/access_token", ["oauth_verifier" => $request['oauth_verifier']]);
        
        $oauth_token= $access_token['oauth_token'];
        $social_network_name = $access_token['screen_name'];
        $oauth_secret= $access_token['oauth_token_secret'];
        var_dump('Este es el id de usuario',$access_token['user_id']);
        var_dump('Variable token secret:', $oauth_secret);
        echo('Estoy aquí:' . $oauth_token);

        $save = TwitterPosts::query()->updateOrCreate([
            'user_id' => request()->user()->id,
            'social_network_name' => $social_network_name,
            'user_access_token' => $oauth_token,
            'twitter_secret' => $oauth_secret
        ]);
        return redirect()->route('ScheduledPost');
        // return $this->postMessageToTwitter($oauth_token, $oauth_secret);
    }

    public function scheduleTweet(Request $request)
    {
        $twitter = TwitterPosts::query()->first();
        $oauth_token = $twitter->user_access_token;
        $oauth_secret = $twitter->twitter_secret;
        $tweetContent = $request->input('message');
        $tweetDate = $request->input('schedule-time');
        

        // Aquí debes realizar la lógica para programar el tweet con la fecha especificada.
        // Puedes utilizar Laravel Scheduler para programar la tarea con cron.

        // Ejemplo: programar la tarea para que se ejecute en la fecha y hora especificadas.
        // Ajusta esto según tus necesidades y configuración.
        \Illuminate\Support\Facades\Artisan::call('tweet:send', [
            'content' => $tweetContent,
            'date' => $tweetDate,
            'oauth_token' => $oauth_token,
            'oauth_secret' => $oauth_secret,
        ]);

        return redirect()->route('home');
    }
}
