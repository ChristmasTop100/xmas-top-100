<?php

namespace App\Console\Commands;

use App\Song;
use DB;
use Illuminate\Console\Command;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

/**
 * @package App\Console\Commands
 */
class SpotifyExport extends Command
{

	/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spotify:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the songs back to spotify';

    /**
     * Implements the handle method.
     */
    public function handle()
    {
        $session    = new Session(config('spotify.client_id'), config('spotify.client_secret'), null);
        $api        = new SpotifyWebAPI();

        $session->requestCredentialsToken([]);
        $accessToken = $session->getAccessToken(); // We're good to go!

        // Set the code on the API wrapper
        $api->setAccessToken($accessToken);

        $songs = Song::leftJoin('votes as v', 'v.song_id', '=', 'songs.id')
            ->orderBy(DB::raw('SUM(v.score)'), 'desc')
            ->groupBy('songs.id')
            ->get();
        foreach($songs as $song) {
            echo $song->url . ' ';
        }
    }  
}