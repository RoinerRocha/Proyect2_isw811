<?php

namespace App\Http\Controllers;

use Abraham\TwitterOAuth\TwitterOAuth;

use Illuminate\Support\Facades\Redirect;    

use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function index()
    {
        return view('Twitter.Login');
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
        $oauth_secret= $access_token['oauth_token_secret'];
        var_dump('Este es el id de usuario',$access_token['user_id']);
        var_dump('Variable token secret:', $oauth_secret);
        echo('Estoy aquí:' . $oauth_token);
        //** post to twitter */
        return $this->postMessageToTwitter($oauth_token, $oauth_secret);
    }

    public function postMessageToTwitter($oauth_token, $oauth_secret){

        $CONSUMER_KEY = env("Twitter_API_KEY");
        $REDIRECT_URL = env("Twitter_REDIRECT_URL");
        $CONSUMER_SECRET = env("Twitter_API_SECRET");

        $_twitter_connect = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $oauth_token, $oauth_secret);


        $_twitter_connect->setApiVersion('2');
        $push = $_twitter_connect->post("tweets", ["text" => 'Post de prueba4'], true);

        return redirect()->route('home');
    }

}
