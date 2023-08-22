<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Abraham\TwitterOAuth\TwitterOAuth;

use App\Models\TwitterPosts;

use App\Models\Twitter;

class SendScheduledTweet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tweet:send {content} {date} {oauth_token} {oauth_secret}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar un tweet programado';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tweetContent = $this->argument('content');
        $tweetDate = $this->argument('date');
        $tweetOuath = $this->argument('oauth_token');
        $tweetOuathSecret = $this->argument('oauth_secret');

        $CONSUMER_KEY = env("Twitter_API_KEY");
        $REDIRECT_URL = env("Twitter_REDIRECT_URL");
        $CONSUMER_SECRET = env("Twitter_API_SECRET");

        // Verifica si la fecha actual coincide con la fecha de programación.
        $now = now();
        $scheduledDate = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $tweetDate);

        if ($now->gte($scheduledDate)) {
            $_twitter_connect = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $tweetOuath, $tweetOuathSecret);
            $_twitter_connect->setApiVersion('2');
            $push = $_twitter_connect->post("tweets", ["text" => $tweetContent], true);
            $this->info('Tweet enviado con éxito.');
        } else {
            $this->info('Tweet programado para envío en el futuro.');
        }
    }
}
